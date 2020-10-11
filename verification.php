<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';


if(isset($_GET['u_code'])) {
	$sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "'";
	$result= $conn->query($sql);
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$sql = "UPDATE `users` SET  `verified` = '1', `confirm_mail`='' WHERE `id` =" . $user['id'];
		if($conn->query($sql)) {
			echo "Пользователь верифицирован!";
			// создаём куки для хранения данных пользователя
			setcookie("user", $user["id"], time() + 60*60);
			header("Location:http://shop-master.local/private_office.php");
		} else {
			echo "Ошибка регистрации";
		}
	}

} 

	// делаем проверку,был ли отправлен POST запрос 	
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	// $email = $_POST['email'];
	// $u_code = generateRandomString(20);
	// выбираем email
	$sql = "SELECT * FROM `users` WHERE  `email`='" . $_POST['email'] . "' AND `verified` = '0'";
	$user_id = 0;
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$user_id = $user['id'];
		// var_dump($user_id);
		$u_code = generateRandomString(20);
		// // register	
		$sql = "UPDATE  users SET confirm_mail='$u_code' WHERE `id` =" . $user['id'];

		if($conn->query($sql)) {
		// echo " Пользователь зарегистрирован </br>";
		echo " Вам выслано письмо на почту для подтверждения регистрации</br>";
		// получаем последнего id пользователя
		$user_id = $conn->insert_id;
		$link = "<a href='http://shop-master.local/verification.php?u_code=$u_code'>Confirm</a>";
		mail($_POST['email'], 'Register', $link);
		var_dump($link);
		}
	}	
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}	
?>



<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property = "og: image" content = "https://varvy.com/pagespeed/images/base64-image.png">
	<title>shop</title>
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
			  		<div>
			  			<h3>
			  				Подтверждение регистрации
			  			</h3>
			  			<h4>
			  				Вы не прошли верификацию, подтвердите свою электронную почту
			  			</h4>
			  		</div>
			  		
			  		<a class="navbar-brand" href="/" title="На главную">
      					<img src="assets/img/logo.png" alt="logo" >
      					<p>
        					Shop-<span>master</span>
      					</p>  
    				</a>
				</label>
			  <div class="form-group">
			  	 <label for="exampleInputEmail">Эл. почта:</label>
			    <input type="text" name="email" class="form-control" id="" required="" placeholder="Ваш email:">
			  </div>
			  
			  	<button type="submit" name="" class="btn btn-success"  style="width:260px; height:45px; font-size:22px; font-weight:300 ">Отправить</button>
			  	<a href="login.php" id="come-in" class="reg-btn">
					Авторизация
				</a>
			</form>

		</div>
			
	</div><!-- /.row -->
</div>	
</body>

<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	