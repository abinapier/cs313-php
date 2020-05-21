<?php
    function getRecipes(){
        $db = dbConnect();
        $statement = $db->query('SELECT id FROM recipebox WHERE user_id='.$_SESSION["user_id"]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $boxid = $results[0]['id'];

        $domList = "<ul>";
        foreach ($db->query('SELECT name, id FROM recipe WHERE recipebox_id='.$boxid) as $row)
        {
            $domList.="<li><a href='/MealPlan/recipe/index.php?action=view&id=".$row['id']."'>".$row['name']."</a></li>";    
        }
        $domList.="</ul>";

        return $domList;
        
    }

    function getRecipeName($id){
        $db = dbConnect();
        $statement = $db->query('SELECT name FROM recipe WHERE id='.$id);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $name = $results[0]['name'];

        return $name;
    }
    function getIngredients($id){
        $db = dbConnect();
        $ingredientList = "<ul>";
        foreach ($db->query('SELECT name, amount FROM ingredient WHERE recipe_id='.$id) as $row)
        {
            $ingredientList.="<li>".$row['amount']." ".$row['name']."</li>";
        }
        $ingredientList.="</ul>";
        return $ingredientList;
        
    }
    function getInstructions($id){
        $db = dbConnect();
        $statement = $db->query('SELECT instructions FROM recipe WHERE id='.$id);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $instruction = "<p>".$results[0]['instructions']."</p>";

        return $instruction;
    }
?>