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

    function getRecipeListEdit(){
        $db = dbConnect();
        $statement = $db->query('SELECT id FROM recipebox WHERE user_id='.$_SESSION["user_id"]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $boxid = $results[0]['id'];

        $domList = "<form method='post' action='/MealPlan/recipe/index.php'>";
        foreach ($db->query('SELECT name, id FROM recipe WHERE recipebox_id='.$boxid) as $row)
        {
            $domList.="<label>".$row['name']."<input type='checkbox' name='recipe".$row['id']."' value='".$row['id']."'></label>";    
        }
        $domList.="<input type='hidden' name='action' value='delete'>";
        $domList.="<input type='submit' value='Delete Recipes'>";
        $domList.="</form>";
        return $domList;
    }

    function deleteRecipe($id){
        $db = dbConnect();
        foreach ($db->query('SELECT id FROM ingredient WHERE recipe_id='.$id) as $row)
        {
            deleteIngredients($row['id']);   
        }
        echo "ingredients gone";
        $insert_QUERY = $db->prepare("DELETE FROM recipe WHERE id=:id");
        echo "query";
        $insert_QUERY->bindParam(':id', $id);
        echo "bind";
        $insert_QUERY->execute();
        echo "recipe gone";

    }

    function deleteIngredients($id){
        $db = dbConnect();
        
        $insert_QUERY = $db->prepare("DELETE FROM ingredient WHERE id=:id");
        $insert_QUERY->bindParam(':id', $id);
        $insert_QUERY->execute();
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