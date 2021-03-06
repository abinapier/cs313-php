<?php
    function getRecipes(){
        //return recipes in a list format
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

    function getRecipeSelect(){
        //return recipes in select format
        $db = dbConnect();
        $statement = $db->query('SELECT id FROM recipebox WHERE user_id='.$_SESSION["user_id"]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $boxid = $results[0]['id'];

        $domList="";
        foreach ($db->query('SELECT name, id FROM recipe WHERE recipebox_id='.$boxid) as $row)
        {
            $domList.="<option value='".$row['id']."'>".$row['name']."</option>";   
        }
        

        return $domList;
    }

    function getRecipeListEdit(){
        //return recipes in checkbox format
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
        //remove recipe with id $id
        $db = dbConnect();
        foreach ($db->query('SELECT recipe_one_id, recipe_two_id, recipe_three_id, recipe_four_id, recipe_five_id FROM menu WHERE user_id='.$_SESSION['user_id']) as $row){
            if($row['recipe_one_id']==$id ||$row['recipe_two_id']==$id ||$row['recipe_three_id']==$id ||$row['recipe_four_id']==$id ||$row['recipe_five_id']==$id){
                return 'Cannot delete recipe(s). It is part of a meal plan. Please delete any meal plans that include the recipe before you can delete the recipes.'; 
            }
        }
        foreach ($db->query('SELECT id FROM ingredient WHERE recipe_id='.$id) as $row)
        {
            deleteIngredients($row['id']);   
        }
        
        $insert_QUERY = $db->prepare("DELETE FROM recipe WHERE id=:id");
        
        $insert_QUERY->bindParam(':id', $id);
        
        $insert_QUERY->execute();
        return '';

    }

    function deleteIngredients($id){
        //delete ingredient with id $id
        $db = dbConnect();
        
        $insert_QUERY = $db->prepare("DELETE FROM ingredient WHERE id=:id");
        $insert_QUERY->bindParam(':id', $id, PDO::PARAM_INT);
        $insert_QUERY->execute();
    }


    function getRecipeName($id){
        //get name of recipe with id $id
        $db = dbConnect();
        $statement = $db->query('SELECT name FROM recipe WHERE id='.$id);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $name = $results[0]['name'];

        return $name;
    }
    function getIngredients($id){
        //get ingerdients from recipe with id $id in list format
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
        //get instructions from recipe with id $id in paragraph format. 
        $db = dbConnect();
        $statement = $db->query('SELECT instructions FROM recipe WHERE id='.$id);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $instruction = "<p>".$results[0]['instructions']."</p>";

        return $instruction;
    }

    function addRecipe($name, $instructions, $ingredientArray, $amountArray){
        //add a new recipe

        //get recipebox id for user.
        $db = dbConnect();
        $statement = $db->query('SELECT id FROM recipebox WHERE user_id='.$_SESSION["user_id"]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $boxid = $results[0]['id'];

        //insert new recipe
        $insert_QUERY = $db->prepare("INSERT INTO recipe (name, instructions, recipebox_id) VALUES (:name, :instructions, :recipebox_id)");
        $insert_QUERY->bindParam(':name', $name, PDO::PARAM_STR);
        $insert_QUERY->bindParam(':instructions', $instructions, PDO::PARAM_STR);
        $insert_QUERY->bindParam(':recipebox_id', $boxid, PDO::PARAM_INT);
        $insert_QUERY->execute();
        $newId = $db->lastInsertId();
        
        foreach($amountArray as $key=>$amount){
            $ingredientName = $ingredientArray[$key];
            $ingredient_QUERY = $db->prepare("INSERT INTO ingredient (name, amount, recipe_id) VALUES (:name, :amount, :recipe_id)");
            $ingredient_QUERY->bindParam(':name', $ingredientName, PDO::PARAM_STR);
            $ingredient_QUERY->bindParam(':amount', $amount, PDO::PARAM_STR);
            $ingredient_QUERY->bindParam(':recipe_id', $newId, PDO::PARAM_INT);
            $ingredient_QUERY->execute();
            
        }

    }