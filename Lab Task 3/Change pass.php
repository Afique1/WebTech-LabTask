<!DOCTYPE html>
<html>
<head>
<title>Change Password: @passWord123</title>
</head>
<body>
  
<style>
.error {color: red;}
</style>

<?php
$current_password = $new_password = $retype_new_password = "";
$current_passwordErr = $new_passwordErr = $retype_new_passwordErr = "";
$password="@passWord123";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["current_password"])) 
  {
    $current_passwordErr = "Please provide your password";
  } 
  else 
  {
    $current_password = test_input($_POST["current_password"]);
    if($current_password!==$password)
    {
      $current_passwordErr = "Password dosen't match";
      $current_password="";
    }
  }

  if (empty($_POST["new_password"])) 
  {
    $new_passwordErr = "Enter a New Password";
  } 
  else 
  {
    $new_password = test_input($_POST["new_password"]);
    if (strlen($new_password) < 8)
    {
      $new_passwordErr = "Minimum 8 characters with Special charecter";
      $new_password="";
    }
    else if (!preg_match("/[@,#,$,%]/",$new_password)) 
    {
      $new_passwordErr = "Password must contain at least one of the special character (@, #, $,%)";
      $new_password ="";
    }
    else if($new_password==$current_password)
    {
      $new_passwordErr = "This is old password. Try a new one";
      $new_password="";
    }
  }

  if (empty($_POST["retype_new_password"])) 
  {
    $retype_new_passwordErr = "Confirm your New Password";
  } 
  else 
  {
    $retype_new_password = test_input($_POST["retype_new_password"]);
    if($retype_new_password !== $new_password)
    {
      $retype_new_passwordErr = "Password dosen't match";
      $retype_new_password="";
    }
  }
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post">
 <fieldset style="width: 750px">
  <legend><h2>Change password</h2></legend>

  <label for="current_password">Current Password :</label>
  <input type="password" id="current_password" name="current_password">
  <span class="error"> <?php echo $current_passwordErr;?></span>
  <br><br>

  <label for="new_password" style="color:#00FF00">New Password :</label>
  <input type="password" id="new_password" name="new_password">
  <span class="error"> <?php echo $new_passwordErr;?></span>
  <br><br>

  <label for="retype_new_password" style="color:red;">Retype New Password :</label>
  <input type="password" id="retype_new_password" name="retype_new_password">
  <span class="error"> <?php echo $retype_new_passwordErr;?></span>
  <br><br>

  <hr style="color:gray; border: 0.1px solid;">

  <input type="submit" value="Submit">

 </fieldset>
</form>
</body>
</html>