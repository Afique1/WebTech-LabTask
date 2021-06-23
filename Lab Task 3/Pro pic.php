<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile Picture</title>
</head>
<body>
	
<form action="upload.php" method="post" enctype="multipart/form-data">
	
	<fieldset style="width:300px";>
	<legend>Profile picture:</legend>
	
	<img src="https://image.flaticon.com/icons/png/512/64/64572.png" alt="picture logo" width="100" height="100"><br><br>
	
	<input type="file" name="fileToUpload" id="fileToUpload"><br>
	<hr style="color:gray; border: 0.1px solid;"><br>
	<input type="submit" value="Submit" name="submit">
	
	</fieldset>
</form>

</body>
</html>