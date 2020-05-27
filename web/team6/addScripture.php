<?php
    ini_set(‘display_errors’, 1);
    ini_set(‘display_startup_errors’, 1);
    error_reporting(E_ALL);
    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case "inputScripture":
            echo "input Scripture";
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

    require_once "connection.php";

    function insertScripture($book, $chapter, $verse, $text, $checkArray){
        
        $db = dbConnect();

        $insert_QUERY = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)");
        $insert_QUERY->bindParam(':book', $book,PDO::PARAM_STR);
        $insert_QUERY->bindParam(':chapter', $chapter,PDO::PARAM_INT);
        $insert_QUERY->bindParam(':verse', $verse,PDO::PARAM_INT);
        $insert_QUERY->bindParam(':content', $text,PDO::PARAM_STR);
        echo $insert_QUERY;
        $insert_QUERY->execute();

    }
?>