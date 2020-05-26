<?php
    function getListItems(){
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
        echo "adding ingredient";
        echo $id;
        $db = dbConnect();
        $statement = $db->query('SELECT id FROM shoppinglist WHERE user_id='.$_SESSION["user_id"]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $listid = $results[0]['id'];
        echo $listid;
        $updateStatement = $db->prepare('UPDATE ingredient SET shoppinglist_id='.$listid.'WHERE id=:id');
        $updateStatement->bindParam(':id', $id);
        $updateStatement->execute();
    }

    
?>