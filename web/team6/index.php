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
    $checkboxList = getScriptureTopics();
    
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<header>
</header>
<body>
    <h1>Insert Scripture</h1>
    <form method="post" action="addScripture.php">
    <label>Book: <input type="text" name="book"></label>
    <label>Chapter: <input type="text" name="chapter"></label>
    <label>Verse: <input type="text" name="verse"></label>
    <label><textarea name="content"></textarea></label>
    <?php echo $checkboxList; ?>
    <input type="submit" value="Add Scripture">
    <input type="hidden" name="action" value="inputScripture">
    </form>
</body>
</body>
</html>