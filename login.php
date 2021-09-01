<?php
	session_start();
	if(isset($_SESSION['userlogin'])){
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Programming Knowledge Login</title>

<!--Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!--Font Awesome-->
	<script src="https://kit.fontawesome.com/b14b5d82a2.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/logo.png" class="brand_logo" alt="mylogo">
						<h1>Log in Form</h1>
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form>
						<div class="input-group mb-3">
							<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" id="username" class="form-control input_user" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" id="password" class="form-control input_pass" required>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
					
				</div>
				<div class="d-flex justify-content-center mt-3 login_container">
					<button type="button" name="button" id="login" class="btn login_btn">Login</button>
				</div>
				</form>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="../useraccounts/index.php" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(function(){
		$('#login').click(function(e){
			var valid = this.form.checkValidity();

			if (!$('#username').val() && !$('#password').val()) {
            	alert('Enter your Username and Password!');
        	}else if (!$('#username').val()) {
            	alert('Enter your name!');
        	}else if (!$('#password').val()) {
            	alert('Enter your password!');
        	}

			if(valid){
				var username = $('#username').val();
				var password = $('#password').val();
			

				e.preventDefault();

				$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data: {username: username, password: password},
				success: function(data){
					alert(data);
					if($.trim(data) === "1"){
						setTimeout(' window.location.href = "index.php"', 2000);
					}
				},
				error: function(data){
					alert('There were errors while doing the operation.');
				}
				});
			}
		});
	});
</script>
</body>
</html>