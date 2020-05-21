<?php
function login($email, $password){
    $db = dbConnect();

    foreach ($db->query('SELECT * FROM users') as $row)
    {
        if($row['email']==$email && $row['password']==$password){
            $_SESSION["user_id"] = $row['id'];
            return 1;
        }
    
    }
    return 0;
}

function regClient(){
    $db = dbConnect();
}

function getName(){
    $db = dbConnect();

    $userName ="";
    //foreach ($db->query('SELECT name FROM users WHERE id='.$_SESSION["user_id"]) as $name){
    //    return $name;
    //}


    $statement = $db->query('SELECT name FROM users WHERE id='.$_SESSION["user_id"]);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;

    //return $userName;
}
?>