<?php
/*
1. Сделать форму регистрации
2. Сделать отправку формы
3. Сделать отправку письма со ссылкой на подтверждение регистрации
4. Сделать страницу с подтверждением регистрации
*/

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';


if(isset($_GET['u_code'])) {
	$sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$sql = "UPDATE `users` SET `verified` = '1' WHERE `id` =" . $user['id'];
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
	
	// выбираем пользователя у которого телефон такой как в бд
	$sql = "SELECT * FROM users WHERE login='" . $_POST['username'] . "' || phone='" . $_POST['phone'] . "' || email='" . $_POST['email'] . "'";
	$user_id = 0;
	$result = $conn->query($sql);
	// если есть переменная $result значит пользователь есть
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$user_id = $user['id'];
		echo "Ошибка регистрации! </br>
				Данные login, либо phone, либо email существуют, выберите другие.";
	// иначе нужно зарегистрировать пользователя	
	} else {
		$password = md5($_POST['pass']);
		// var_dump($password);
		$u_code = generateRandomString(20);
		// register	
		$sql = "INSERT INTO users(login, phone, email, password, confirm_mail) VALUES ('" . $_POST['username'] . "','" . $_POST['phone'] . "', '" . $_POST['email'] . "', '" . $password . "', '$u_code')";

		
		if($conn->query($sql)) {
			
			echo " Пользователь зарегистрирован </br>";
			echo " Вам выслано письмо на почту для подтверждения регистрации</br>";
			// получаем последнего id пользователя
			$user_id = $conn->insert_id;
			$link = "<a href='http://shop-master.local/register.php?u_code=$u_code'>Confirm</a>";
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
			  		Форма регистрации
					<a class="navbar-brand" href="/" title="На главную">
      					<img src="assets/img/logo.png" alt="logo">
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
			  	 <label for="exampleInputPhone">Телефон:</label>
			    <input type="text" name="phone" class="form-control" id="" required="" placeholder="Ваш телефон:">
			  </div>
			   <div class="form-group">
			  	 <label for="exampleInputEmail">Эл. почта:</label>
			    <input type="text" name="email" class="form-control" id="" required="" placeholder="Ваш email:">
			  </div>
			 
			  <div class="form-group">
			  	 <label for="exampleInputPassword">Пароль:</label>
			    <input type="password" name="pass" class="form-control" id="" required="" placeholder="Ваш пароль:">
			  </div>
				<div class=" my-2 my-sm-0 d-flex ">
					<button type="submit" name="" class="btn btn-success"  style="width:260px; height:45px; font-size:22px; font-weight:300 ">Регистрация</button>
			  		<a href="login.php" id="come-in" class="reg-btn" style="margin-left: 40px; margin-right: 20px; margin-top: 15px; margin-bottom: 0px;">
						Я уже зарегистрирован
					</a>
					 <a href="basket.php" class="basket my-2 my-sm-0 d-flex "  id="go-basket" style="text-decoration: none; width: 40px">
            			<img src="assets/img/shopcartadd.png" alt="Корзина" title="Корзина" style="width: 100%">
          				<span style="font-size: 20px"> </span>
        			</a>
				</div>

			</form>

			
		</div>
			
	</div><!-- /.row -->
</div>	
</body>

<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	

