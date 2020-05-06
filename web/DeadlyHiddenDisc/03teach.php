<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
 // define variables and set to empty values
$nameErr = $emailErr = $majorErr = $commentErr = "";
$name = $email = $major = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["major"])) {
    $majorErr = "Major is required";
  } else {
    $major = test_input($_POST["major"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo '<p><a href="mailto:' .$email.  '">Send email</a></p>';
echo "<br>";
echo $major;
echo "<br>";
echo $comment;
echo "<br>";

$countries= array('NA'=>'North America', 'SA'=>'South America', 'EU'=>'Europe', 'AS'=>'Asia', 'AU'=>'Australia', 'AF'=>'Africa', 'AN'=>'Antarctica');

if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
           
            
            echo $countries[$check] . '<br>'; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
}

?>

</body>
</html>