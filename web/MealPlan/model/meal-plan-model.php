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

?>