<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';


// login
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	$password = md5($_POST['pass']);
	$sql = "SELECT * FROM users WHERE login='" . $_POST['username'] . "' AND  password='$password' AND `verified` = '1'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$user_id = $user['id'];
		// создаём куки для хранения данных пользователя
		setcookie("user", $user["id"], time() + 60*60);
		header("Location:http://shop-master.local/private_office.php");
	} 

	else {	
		echo "Пользователь не найден, зарегистрируйся.";
	// 	header("Location:http://shop-master.local/verification.php");
	}

	$sql1 = "SELECT * FROM users WHERE login='" . $_POST['username'] . "' AND  password='$password' AND `verified` = '0'";
	$result1 = $conn->query($sql1);
	if($result1->num_rows > 0) {
		
		header("Location:http://shop-master.local/verification.php");
	} 
}	
?>






<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property = "og: image" content = "https://varvy.com/pagespeed/images/base64-image.png">
	<title>login</title>
  <!--- Awesomes Fonts --->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
  <!--- Open Sans Google Fonts --->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700,700i,800&amp;subset=cyrillic" rel="stylesheet">
	<!--- Bootstrap Reboot CSS --->
	<link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
	<!--- Bootstrap CSS --->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!--- Main CSS --->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body class="bacground" style="background-image: url(assets/img/background28.jpg);">
<div class="container" >
	<div class="row" id="" >
		<div class="col-8 box-modal mt-5 " id="" >
			<form class="form-basket" action="" method="POST" id="">
			  	<label for="exampleInputEmail" class="d-flex justify-content-between">
			  		Форма авторизации
			  		<a class="navbar-brand" href="/" title="На главную">
      					<img src="assets/img/logo.png" alt="logo" >
      					<p>
        					Shop-<span>master</span>
      					</p>  
    				</a>
				</label>

			  <div class="form-group">
			  	 <label for="exampleInputName">Ваше имя:</label>
			    <input type="text" name="username" class="form-control" id="" required="" placeholder="Ваше имя:">
			    <small id="" class="form-text text-muted">Мы никогда не передадим ваши данные кому-либо еще.</small>
			  </div>
			  
			  
			  <div class="form-group">
			  	 <label for="exampleInputPassword">Пароль:</label>
			    <input type="password" name="pass" class="form-control" id="" required="" placeholder="Ваш пароль:">
			  </div>

			  	<button type="submit" name="" class="btn btn-success"  style="width:260px; height:45px; font-size:22px; font-weight:300 ">Войти</button>
			  	<a href="register.php" id="come-in" class="reg-btn">
					Зарегистрироваться
				</a>
			</form>

		</div>
			
	</div><!-- /.row -->
</div>	
</body>

<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	