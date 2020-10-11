<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'] . '/modules/telegram/send-message.php';
/*
1. Проверяем, есть ли в базе данных пользователь с номером телефона, что ввёл пользователь
2. Если нет, то регистрируем пользовыателя
3. Добавляем заказ в базу данных с привязхкой к пользователю
*/

// делаем проверку,был ли отправлен POST запрос 
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	// выбираем пользователя у которого телефон такой как в бд
	$sql = "SELECT * FROM users WHERE login='" . $_POST['username'] . "' AND phone='" . $_POST['phone'] . "'";
	$user_id = 0;
	$result = $conn->query($sql);
	// если есть переменная $result значит пользователь есть
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$user_id = $user['id'];
	// иначе нужно зарегистрировать пользователя	
	} else {
		$sql = "INSERT INTO users(login, phone) VALUES ('" . $_POST['username'] . "', '" . $_POST['phone'] . "')"; 
		if($conn->query($sql)) {
			echo "User added!";
			// получаем последнего id пользователя
			$user_id = $conn->insert_id;
		} else {
			echo "error user";
		}
	}
	
	
		
	$_POST['status']="Новый";
	// выводим информацию в базу данных
	$sql = "INSERT INTO orders (user_id, status, name, products, costs, address, phone) VALUES('" . $user_id . "', '" . $_POST['status'] . "', '" . $_POST['username'] . "', '" . $_COOKIE['basket'] . "', '" . $_POST['costs'] . "', '" . $_POST['address'] . "', '" . $_POST['phone'] . "')";
		// получаем заказ в бд
		if($conn->query($sql)) {
				// очищаем  куки
			setcookie("basket", "", 0,"/");
			echo "<h3>Товар заказан! <br/>
				<a href='/'>На главную</a></h3>";
				message_to_telegram('Новый заказ!');
			
		} else {
			echo "<h4>Произошла ошибка</h4>";
		}			

}
?>