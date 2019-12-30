<?php
include_once('../config/connect.php');
include_once('../function/function.php');
if(isset($_POST['sbm']))
{
	$name = $_POST['name'];
	$address = $_POST['address'];
	$cmt = $_POST['cmt'];
	$sdt = $_POST['sdt'];
	$mail = $_POST['email'];
	$pass = $_POST['password'];
	$again_pass = $_POST['again_password'];
	if($pass == $again_pass){
		$passwordHash = password_hash($pass,PASSWORD_DEFAULT);
		$code = (uniqid(rand()));
	}
	else{
		echo 'kiem tra lai mat khau';
	}
	$sql = "INSERT INTO thanh_vien(email,password,ho_ten,so_cmt,so_dien_thoai,dia_chi,code) VALUES('$mail','$passwordHash','$name','$cmt','$sdt','$address','$code')";
	if(queryStr($sql))
	{
		header('location:index.php');
	}
	else{
		$error="Thông tin có vấn đề";
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
	<script src="js/html5shiv.js"s></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<?php
				if (isset($error)) {
					echo'
						<div class="alert alert-primary" role="alert">
						<strong>'.$error.'</strong>
						</div>
					';
				}
				?>
				
				<div class="panel-heading" style="text-align: center;">Đăng Ký</div>
				<div class="panel-body">
					<form role="form" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="name" type="" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Address" name="address" type="" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Cmtnd" name="cmt" type="" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Sdt" name="sdt" type="" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật Khẩu" name="password" type="password" value="">
							</div>
                            <div class="form-group">
								<input class="form-control" placeholder="Nhập lại mật khẩu" name="again_password" type="password" value="">
                            </div>
                          
						
							<button type="submit" name="sbm" class="btn btn-primary">Register</button>
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