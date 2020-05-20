<?php
function login($email, $password){
    $db = dbConnect();
    
    $userFound = false;

    foreach ($db->query('SELECT * FROM users') as $row)
    {
        echo "here!";
        if($row['email']==$email && $row['password']==$password){
            $userFound = true;
            $_SESSION["user_id"] = $row['id'];
            $userFound = true;
        }
    
    }
    exit;
    return $userFound;
}

function regClient(){
    $db = dbConnect();
}

function getName(){
    $db = dbConnect();

    $userName ="";
    foreach ($db->query('SELECT name FROM users WHERE id=$_SESSION["user_id"]') as $name){
        return $name;
    }

    return $userName;
}
?>