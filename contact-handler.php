<?php
// define variables and set to empty values
$first_nameErr = $last_nameErr = $mailErr  = $mobileErr =  $messageErr = "";
$first_name = $last_name = $mail  = $mobile= $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $first_nameErr = "Forst name is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
    // check if first_name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
      $first_nameErr = "Only letters and white space allowed";
    }
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["last_name"])) {
    $last_nameErr = "Last name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if last_name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
      $last_nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["mail"])) {
    $mailErr = "Email is required";
  } else {
    $mail = test_input($_POST["mail"]);
    // check if e-mail address is well-formed
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First_Name: <input type="text" first_name="first_name">
  <span class="error">* <?php echo $first_nameErr;?></span>
  <br><br>
    Last_Name: <input type="text" last_name="last_name">
  <span class="error">* <?php echo $last_nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="mail">
  <span class="error">* <?php echo $mailErr;?></span>
  <br><br>
  Message: <textarea name="message" rows="5" cols="40"></textarea>
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $first_name;
echo "<br>";
echo $last_name;
echo "<br>";
echo $mail;
echo "<br>";
echo $message;
echo "<br>";

?>



