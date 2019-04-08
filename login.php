<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title> User Login</title>
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">
	
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
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="psw">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p> Not a member? <a href="register.php">Sign Up</a></p>
	</form>
</body>
</html>
