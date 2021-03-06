<?php
    function getListItems(){
        //get shopping list items in list format
        $db = dbConnect();
        $statement = $db->query('SELECT id FROM shoppinglist WHERE user_id='.$_SESSION["user_id"]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $listid = $results[0]['id'];

        $domList = "<ul>";
        foreach ($db->query('SELECT name FROM ingredient WHERE shoppinglist_id='.$listid) as $row)
        {
            $domList.="<li>".$row['name']."</li>";    
        }
        $domList.="</ul>";

        return $domList;
        
    }

    function getIngredients($menuId){
        //get ingredients from a meal plan with id $menuId
        $db = dbConnect();
        $statement = $db->query('SELECT recipe_one_id, recipe_two_id, recipe_three_id, recipe_four_id, recipe_five_id FROM menu WHERE id='.$menuId);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $recipes = [$results[0]['recipe_one_id'], $results[0]['recipe_two_id'], $results[0]['recipe_three_id'], $results[0]['recipe_four_id'], $results[0]['recipe_five_id']];
        $domList = "<form method='post' action='/MealPlan/shoppingList/index.php'>";
        foreach($recipes as $recipe){
            foreach ($db->query('SELECT name, id FROM ingredient WHERE recipe_id='.$recipe) as $row)
            {
                //add checkbox
                $domList.="<label>".$row['name']."<input type='checkbox' name='ingredient".$row['id']."' value='".$row['id']."'></label>";    
            }
        }
        $domList.="<input type='hidden' name='action' value='update'>";
        $domList.="<input type='submit' value='Add Ingredients to List'>";
        $domList.="</form>";
        return $domList;
    }

    function addIngredientToList($id){
        //add an ingredient with id $id to list
        
        $db = dbConnect();
        $statement = $db->query('SELECT id FROM shoppinglist WHERE user_id='.$_SESSION["user_id"]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $listid = $results[0]['id'];
        
        $updateStatement = $db->prepare('UPDATE ingredient SET shoppinglist_id='.$listid.'WHERE id=:id');
        $updateStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $updateStatement->execute();
    }


    function removeIngredientFromList($id){
        //remove ingredient with id $id from list
        $db = dbConnect();
        
        $updateStatement = $db->prepare('UPDATE ingredient SET shoppinglist_id=NULL WHERE id=:id');
        $updateStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $updateStatement->execute();
    }

    function getIngredientsEdit(){
        //get ingredients in shopping list in checkbox format

        $db = dbConnect();
        $statement = $db->query('SELECT id FROM shoppinglist WHERE user_id='.$_SESSION["user_id"]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $listid = $results[0]['id'];

        $domList = "<form method='post' action='/MealPlan/shoppingList/index.php'>";
        foreach ($db->query('SELECT name, id FROM ingredient WHERE shoppinglist_id='.$listid) as $row)
        {
            $domList.="<label>".$row['name']."<input type='checkbox' name='ingredient".$row['id']."' value='".$row['id']."'></label>";    
        }
        $domList.="<input type='hidden' name='action' value='delete'>";
        $domList.="<input type='submit' value='Remove Items from List'>";
        $domList.="</form>";

        return $domList;

    }
