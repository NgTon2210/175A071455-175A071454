<?php
if(isset($_POST['sbm']))
{
	$mail = $_POST['email'];
	$pass = $_POST['password'];
	$sql = "SELECT * FROM thanh_vien WHERE email = '$mail'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($query);
	if($row>0)
	{
		$test = password_verify($pass,$row['password']);
		if($test)
		{
			$_SESSION['mail'] = $mail;
			$_SESSION['pass'] = $pass;
			header('location:index.php');
		}
		else
		{
			echo 'dang nhap sai';
		}
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading" style="text-align: center;">Đăng Nhập</div>
				<div class="panel-body">
					<form  method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật Khẩu" name="password" type="password" value="">
							</div>
						
							<button type="submit" name="sbm" class="btn btn-primary">Login</button>
							<a href="dang-ky.php" class="btn btn-primary">Register</a>
						</fieldset>
						
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
