<?php
$UsernameError = "";
$PasswordError = "";

$Username = "";
$Password = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) 
	{
        if (empty($_POST['username'])) {
            $UsernameError = "Username Required!";
        } else {
            $Username = Test_User_Input($_POST['username']);

            if (!preg_match("/^[A-Za-z0-9. ]*$/", $Username)) {
                $UsernameError = "You can use Number and letter";
            }
        }

        if (empty($_POST['password'])) {
            $PasswordError = "Give a password!" ;
        }
		else 
		{
            $Password = Test_User_Input($_POST['password']);
			
			if (strlen($Password) <= 8)
			{
			  $PasswordError = "Minimum 8 characters";
			  $Password="";
			}
			
            $UpperCase = preg_match("@[A-Z]@", $Password);
            $LowerCase = preg_match("@[a-z]@", $Password);
            $Number = preg_match("@[0-9]@", $Password);

            if (!$UpperCase || !$LowerCase || !$Number) {
                $PasswordError = "Try using Capital and small letters with alphanumeric(!@#$%^&*)";
            }
        }
    }
}

function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Login Form</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="position:left;" method="POST">
        <fieldset style="width: 750px">
            <legend><h2>Login</h2></legend>

            <p>
                <span>
                    <label for="input_username">Username:</label>
                    <input type="text" id="input_username" placeholder="ex: Joe_Kh" name="username">
                    <label for="input_username_error" style="color: red;"><?php echo $UsernameError; ?></label>
                </span>
            </p>

            <p>
                <span>
                    <label for="input_password">Password:</label>
                    <input type="password" id="input_password" placeholder="ex: @xGui69gKqXo!" name="Password">
                    <label for="input_password_error" style="color: red;"><?php echo $PasswordError; ?></label>
                </span>
            </p>
			
			<hr style="color:gray; border: 0.1px solid;">
			
			<div>
			<input type="checkbox" id="rememberPassword" Name="rememberPassword">
			<label for="rememberPassword">Remember Me </label><br><br>
			</div>
			
			<span>
                <input type="submit" id="input_submit" name="submit">
                <a href=" ">Forgot Password?</a>
            </span>
			
			
			
        </fieldset>


    </form>
</body>

</html>