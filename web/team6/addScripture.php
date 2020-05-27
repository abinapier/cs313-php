<?php
    require_once "connection.php";
    
    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case "inputScripture":
            
            $book= filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
            $chapter= filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_NUMBER_INT);
            $verse= filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_NUMBER_INT);
            $text= filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
            $checkArray = array();
            
            foreach( $_POST as $key => $val ) {
                $postId = filter_input(INPUT_POST, $key);
                if( strpos($key, 'topic') !== false) {
                    if(isset($_POST[$key])){
                        $checkArray[] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_NUMBER_INT);
                    }
                } 
            }
            
            try{
                insertScripture($book, $chapter, $verse, $text, $checkArray);
            }catch(Exception $e){
                echo $e;
            }
            header("Location: addScripture.php?action=generateScripturePage");
            
        break;
        case "generateScripturePage":
            echo "here!";
            try{
            $content = createScripturePage();
            }catch(Exception $e){
                echo $e;
            }
            include "showScriptures.php";
            exit;
        default:
            exit;

    }

    

    function insertScripture($book, $chapter, $verse, $text, $checkArray){
        
        $db = dbConnect();
        
        $insert_QUERY = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)");
        
        $insert_QUERY->bindParam(':book', $book, PDO::PARAM_STR);
        
        $insert_QUERY->bindParam(':chapter', $chapter, PDO::PARAM_INT);
        
        $insert_QUERY->bindParam(':verse', $verse, PDO::PARAM_INT);
        
        $insert_QUERY->bindParam(':content', $text, PDO::PARAM_STR);
        
        //echo $insert_QUERY;
        $insert_QUERY->execute();

        $scriptureId = $db->lastInsertId();
        echo $scriptureId;
        foreach($checkArray as $topicIndex){
            echo $topicIndex;
            $addLink_QUERY = $db->prepare("INSERT INTO scripture_topic (scripture_id, topic_id) VALUES (:scrip_id, :topic_id)");
            $addLink_QUERY->bindParam(':scrip_id', $scriptureId);
            $addLink_QUERY->bindParam(':topic_id', $topicIndex);
            $addLink_QUERY->execute();
        }

    }

    function createScripturePage(){
        $db = dbConnect();
        $ingredientList = "<ul>";
        $topicArray = array();
        foreach($db->query('SELECT id, name FROM topic') as $curTopics){
            $topicArray[$curTopics['id']] = $curTopics['name'];
        }
        foreach ($db->query('SELECT id, book, chapter, verse, content FROM scriptures') as $row)
        {
            $ingredientList.="<li>".$row['book']." ".$row['chapter'].":".$row['verse']." ".$row["content"]."</li>";
            foreach($db->query('SELECT topic_id FROM scripture_topic WHERE scripture_id='.$row['id']) as $topic){
                $ingredientList.="<li>".$topicArray[$topic['topic_id']]."</li>";
            }
        }
        $ingredientList.="</ul>";
        return $ingredientList;
    }
?>