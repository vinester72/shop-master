<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

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

				if(isset($_POST['count'])) {
				$basket['basket'][$i]['count'] = $_POST['count'];
			
			   }
			}	
		}
		// var_dump($basket['basket']);

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