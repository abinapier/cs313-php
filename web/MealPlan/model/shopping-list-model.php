<?php
    function getListItems(){
        $db = dbConnect();
        $statement = $db->query('SELECT id FROM shoppinglist WHERE id='.$_SESSION["user_id"]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $listid = $results[0]['id'];

        $domList = "<ul>";
        foreach ($db->query('SELECT name FROM ingredient WHERE shoppinglist_id='.$listid) as $row)
        {
            $domList.="<li>".$row['name']."</li>";    
        }
        $domList.="</ul>";

        echo $domList;
    }


?>