<?php
    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case "inputScripture":
            $book= filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
            $chapter= filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_NUMBER_FLOAT);
            $verse= filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_NUMBER_FLOAT);
            $text= filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
            $checkArray = array();
            foreach( $_POST as $key => $val ) {
                $postId = filter_input(INPUT_POST, $key);
                if( strpos($key, 'topic') !== false) {
                    if(isset($_POST[$key])){
                        $checkArray[] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_NUMBER_FLOAT);
                    }
                } 
            }
            insertScripture($book, $chapter, $verse, $text, $checkArray);
        break;
        default:
            exit;

    }

    require_once "connection.php";
    function getScriptureTopics(){
        $db = dbConnect();
        $returnList = "";
        foreach ($db->query('SELECT name, id FROM topic') as $row)
        {
            $returnList .= "<label>".$row["name"]."<input type='checkbox' name='topic".$row["id"]."' value='".$row["id"]."'></label>";
    
        }
        return $returnList;

    }

    function insertScripture($book, $chapter, $verse, $text, $checkArray){
        $db = dbConnect();

        $insert_QUERY = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)");
        $insert_QUERY->bindParam(':book', $book);
        $insert_QUERY->bindParam(':chapter', $chapter);
        $insert_QUERY->bindParam(':verse', $verse);
        $insert_QUERY->bindParam(':content', $text);
        $insert_QUERY->execute();

    }
?>