<?php

/*
1. Добавить кнопку удаления товара
2. Пройтись по всему массиву товаров
3  Проверить id товара и удалить товар

*/

// делаем проверку,был ли отправлен POST запрос 	
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	// если сущесвует $_COOKIE
	if(isset($_COOKIE['basket'])) {
		// преобразуем через json_decode в строчный формат
		$basket = json_decode($_COOKIE['basket'], true);
		// echo "<pre>";
		// var_dump($basket['basket']);
		for($i = 0; $i < count($basket['basket']); $i++) {
			if($basket['basket'][$i]['product_id'] == $_POST['id']) {
				unset($basket['basket'][$i]);
				sort($basket['basket']);
				
			}
		}
		// Преобразование массива в JSON формат
		$jsonProduct = json_encode($basket);

		// очищаем  куки
		setcookie("basket", "", 0,"/");
		// добавляем куки
		setcookie("basket", $jsonProduct, time() + 60*60,"/");
		
		echo $jsonProduct;
	}
}
?>