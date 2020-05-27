<?php
    require_once "connection.php";
    
    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case "inputScripture":
            echo "input Scripture";
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
            echo "content set";
            try{
                insertScripture($book, $chapter, $verse, $text, $checkArray);
                echo "ran insert function";
            }catch(Exception $e){
                echo $e;
            }
        break;
        default:
            exit;

    }

    

    function insertScripture($book, $chapter, $verse, $text, $checkArray){
        
        $db = dbConnect();
        echo "connection made";
        $insert_QUERY = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)");
        echo "prepared";
        $insert_QUERY->bindParam(':book', $book, PDO::PARAM_STR);
        echo "bind 1";
        $insert_QUERY->bindParam(':chapter', $chapter, PDO::PARAM_INT);
        echo "bind 2";
        $insert_QUERY->bindParam(':verse', $verse, PDO::PARAM_INT);
        echo "bind 3";
        $insert_QUERY->bindParam(':content', $text, PDO::PARAM_STR);
        echo "bind 4";
        //echo $insert_QUERY;
        $insert_QUERY->execute();

    }
?>