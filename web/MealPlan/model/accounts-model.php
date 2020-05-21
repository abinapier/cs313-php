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


function getName(){
    $db = dbConnect();

    $userName ="";
    $statement = $db->query('SELECT name FROM users WHERE id='.$_SESSION["user_id"]);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results[0]['name'];

}

function register($clientName, $clientEmail, $clientPassword){
    $db = dbConnect();
    $insert_QUERY = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $insert_QUERY->bindParam(':name', $clientName);
    $insert_QUERY->bindParam(':email', $clientEmail);
    $insert_QUERY->bindParam(':password', $clientPassword);

    $insert_QUERY->execute();

    $databaseErrors = $insert_QUERY->errorInfo();

    if( !empty($databaseErrors) ){  
        echo 'Error occurred:'.implode(":",$this->pdo->errorInfo());
        exit;      
    }
}

?>