<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

	/*
	1. Получить товар по которому кликнул пользователь +
	2. Добавить в массив товаров +
	3. Добавить массив в куки +

	4. Перебрать прошлый массив
		4.1 Преобразовать JSON с куки в массив
		4.2 Добавить новый элемент в массив
		4.3 Преобразовать элемент в правильный JSON
		4.4 Добавить в куки
	*/
		
	// делаем проверку,был ли отправлен POST запрос 	
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {

	$sql = "SELECT * FROM products WHERE id=" . $_POST['id'];
	$result = $conn->query($sql);
	$product = mysqli_fetch_assoc($result);

	//проверяем: если существует переменная куки basket, происходит добавление в корзину
	if(isset($_COOKIE['basket'])) { // если в корзине что то есть
		// преобразовываем нашу корзину с помощью json_decode в обычный массив
		$basket = json_decode($_COOKIE['basket'], true);

		/*
		1. Пройтись по всему массиву корзины +
		2. Проверить, есть ли совпадение по id	
		3. если совпадение есть, увеличить кол-во товара
		*/
		// наличие товара
		$issetProduct = 0;
		// пока  $i меньше количества переменной корзины
		for($i = 0; $i < count($basket["basket"]); $i++) {

			if( $basket["basket"][$i]["product_id"] == $product['id'] ) {
				$basket["basket"][$i]["count"]++;
				$issetProduct = 1;
			}
		}

		if($issetProduct != 1) {
			// добавляем элемент в массив
			$basket['basket'][] = [
				"product_id" => $product['id'],
				"count" => 1
			];
		}	
		
	} else { // если корзина пустая
		// в элемент добавляем массив
		$basket = ["basket" => [
			["product_id" => $product['id'],
			"count" => 1]
		]];
	}

	// Преобразование массива в JSON формат
	$jsonProduct = json_encode($basket);

	// очищаем  куки
	setcookie("basket", "", 0,"/");
	// добавляем куки
	setcookie("basket", $jsonProduct, time() + 60*60,"/");
	// возвращаем количество записей в корзине через массив
	echo json_encode([
		"count" => count($basket['basket'])
	]);
	// echo $jsonProduct;
}	
?>