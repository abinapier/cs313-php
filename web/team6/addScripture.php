<?php
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
?>