<?php
    function getMealPlans(){
        $db = dbConnect();

        $domList = "<ul>";
        foreach ($db->query('SELECT date, id FROM menu WHERE user_id='.$_SESSION['user_id']) as $row)
        {
            $domList.="<li><a href='/MealPlan/mealPlan/index.php?action=view&id=".$row['id']."'>".$row['date']."</a></li>";    
        }
        $domList.="</ul>";

        return $domList;
        
    }

    function getMealPlanListEdit(){
        $db = dbConnect();

        $domList = "<form method='post' action='/MealPlan/mealPlan/index.php'>";
        foreach ($db->query('SELECT date, id FROM menu WHERE user_id='.$_SESSION['user_id']) as $row)
        {
            $domList.="<label>".$row['date']."<input type='checkbox' name='menu".$row['id']."' value='".$row['id']."'></label>"; 
        }
        $domList.="<input type='hidden' name='action' value='delete'>";
        $domList.="<input type='submit' value='Delete Meal Plans'>";
        $domList.="</form>";

        return $domList;

    }

    function deleteMenu($id){
        $db = dbConnect();
        
        
        $insert_QUERY = $db->prepare("DELETE FROM menu WHERE id=:id");
        
        $insert_QUERY->bindParam(':id', $id);
        
        $insert_QUERY->execute();

    }


    function getMealPlanDate($id){
        $db = dbConnect();
        $statement = $db->query('SELECT date FROM menu WHERE id='.$id);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $date = $results[0]['date'];

        return $date;
    }

    function getMenuRecipes($id){
        $db = dbConnect();
        $statement = $db->query('SELECT recipe_one_id, recipe_two_id, recipe_three_id, recipe_four_id, recipe_five_id FROM menu WHERE id='.$id);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $recipes = [$results[0]['recipe_one_id'], $results[0]['recipe_two_id'], $results[0]['recipe_three_id'], $results[0]['recipe_four_id'], $results[0]['recipe_five_id']];

        return $recipes;

    }

    function addMealPlan($date, $dayOneId, $dayTwoId, $dayThreeId, $dayFourId, $dayFiveId){
        $db = dbConnect();
        $insert_QUERY = $db->prepare("INSERT INTO menu (date, user_id, recipe_one_id, recipe_two_id, recipe_three_id, recipe_four_id, recipe_five_id) VALUES (:date, :user_id, :recipe_one_id, :recipe_two_id, :recipe_three_id, :recipe_four_id, :recipe_five_id)");
        $insert_QUERY->bindParam(':date', $date);
        $insert_QUERY->bindParam(':user_id', $_SESSION['user_id']);
        $insert_QUERY->bindParam(':recipe_one_id', $dayOneId);
        $insert_QUERY->bindParam(':recipe_two_id', $dayTwoId);
        $insert_QUERY->bindParam(':recipe_three_id', $dayThreeId);
        $insert_QUERY->bindParam(':recipe_four_id', $dayFourId);
        $insert_QUERY->bindParam(':recipe_five_id', $dayFiveId);
        $insert_QUERY->execute();
    }

?>