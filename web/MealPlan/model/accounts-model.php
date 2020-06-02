<?php
function login($email, $password){
    //login function

    //establish connection to database
    $db = dbConnect();

    //loop through each user
    foreach ($db->query('SELECT * FROM users') as $row)
    {
        //check if there is a user with email
        if($row['email']==$email){
            //check if password matches
            if(password_verify($password, $row['password'])){
                $_SESSION["user_id"] = $row['id'];
                //if matches return 1
                return 1;
            }
        }
    
    }
    //either no email or password doesn't match
    return 0;
}


function getName(){
    //get user name
    $db = dbConnect();

    $userName ="";
    $statement = $db->query('SELECT name FROM users WHERE id='.$_SESSION["user_id"]);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results[0]['name'];

}

function register($clientName, $clientEmail, $clientPassword){
    //register a new user
    //establish connection
    $db = dbConnect();

    //assume the email is not being used
    $emailValid = true;

    //check if email is being used
    foreach ($db->query('SELECT email FROM users') as $row)
    {
        if($row['email']==$clientEmail){
            $_SESSION["user_id"] = $row['id'];
            $emailValid = false;
        }
    
    }
    
    //if email is valid
    if ($emailValid){
        //add new user
        $insert_QUERY = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $insert_QUERY->bindParam(':name', $clientName, PDO::PARAM_STR);
        $insert_QUERY->bindParam(':email', $clientEmail, PDO::PARAM_STR);
        $insert_QUERY->bindParam(':password', $clientPassword, PDO::PARAM_STR);
        $insert_QUERY->execute();
        $userId = $db->lastInsertId();

        //add new recipe box
        $box_insert = $db->prepare("INSERT INTO recipebox (user_id) VALUES (:user_id)");
        $box_insert->bindParam(':user_id', $userId, PDO::PARAM_INT);
        try{
            $box_insert->execute();
        }catch(Exception $e){
            echo $e;
        }
        
        //add new shopping list
        $list_insert = $db->prepare("INSERT INTO shoppinglist (user_id) VALUES (:user_id)");
        $list_insert->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $list_insert->execute();
        
        return 1;
    }
    return 0;
}
