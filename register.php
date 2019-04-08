<?php
	include('server.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title> User registration</title>
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">
	
	<!---display validation errors here--->
	<?php if(count($errors) >0): ?>
			<div class="error">
				<?php foreach ($errors as $error): ?>
					<p><?php echo $error; ?></p>
				<?php endforeach ?>
			 </div>
	<?php endif ?>
	
	
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="psw">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="cpsw">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
		<p> Already a member? <a href="login.php">Sign In</a></p>
	</form>
</body>
</html>
