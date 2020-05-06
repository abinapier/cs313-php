<html>
<body>
<?php
$majors = array
  (
  array("Computer Science","CS"),
  array("Web Design and Development","WDD"),
  array("Computer Information Technology", "CIT"),
  array("Computer Engineering", "CE")
  );
  ?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="03teach.php">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Major:<br>
  <?php
    foreach($majors as $major) {
      
      echo '<input type="radio" name="major"' . 'value="' . $major[1] . '">' . $major[0].'<br>'; 
}
  ?>
  <br><br>
  Continents Visited:<br>
  <input type="checkbox" name="check_list[]" value="NA">
  <label for="continent1">North America</label><br>
  <input type="checkbox" name="check_list[]" value="SA">
  <label for="continent2"> South America</label><br>
  <input type="checkbox" name="check_list[]" value="EU">
  <label for="continent3"> Europe</label><br>
  <input type="checkbox" name="check_list[]" value="AS">
  <label for="continent4">Asia</label><br>
  <input type="checkbox" name="check_list[]" value="AU">
  <label for="continent5">Australia</label><br>
  <input type="checkbox" name="check_list[]" value="AF">
  <label for="continent6">Africa</label><br>
  <input type="checkbox" name="check_list[]" value="AN">
  <label for="continent7">Antartica</label><br>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>