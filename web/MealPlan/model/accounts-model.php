<?php
function login($email, $password){
    $db = dbConnect();

    foreach ($db->query('SELECT * FROM users') as $row)
    {
        if($row['email']==$email){
            if(password_verify($password, $row['password'])){
                $_SESSION["user_id"] = $row['id'];
                return 1;
            }
        }
    
    }
    return 0;
}


function getName(){
    $db = dbConnect();

    $userName ="";
    $statement = $db->query('SELECT name FROM users WHERE id='.$_SESSION["user_id"]);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results[0]['name'];

}

function register($clientName, $clientEmail, $clientPassword){

    $db = dbConnect();
    $emailValid = true;

    foreach ($db->query('SELECT email FROM users') as $row)
    {
        if($row['email']==$clientEmail){
            $_SESSION["user_id"] = $row['id'];
            $emailValid = false;
        }
    
    }
    
    if ($emailValid){
        $insert_QUERY = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $insert_QUERY->bindParam(':name', $clientName);
        $insert_QUERY->bindParam(':email', $clientEmail);
        $insert_QUERY->bindParam(':password', $clientPassword);
        $insert_QUERY->execute();

        $box_insert = $db->prepare("INSERT INTO recipebox (user_id) VALUES (:user_id)");
        $box_insert->bindParam(':user_id', $_SESSION["user_id"]);
        $box_insert->execute();

        $list_insert = $db->prepare("INSERT INTO shoppinglist (user_id) VALUES (:user_id)");
        $list_insert->bindParam(':user_id', $_SESSION["user_id"]);
        $list_insert->execute();
        return 1;
    }
    return 0;
}
