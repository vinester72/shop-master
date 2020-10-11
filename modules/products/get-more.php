<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

if(!isset($_GET['page'])) {
	$page = 1;
} else {
	$page = $_GET['page'];
	
}

// echo $page;
$offset = $page * 3 ;
// выбираем все поля из таблицы продуктов с лимитом 6 страниц
$sql2 = "SELECT * FROM products LIMIT 3 OFFSET " . $offset;
$result2 = $conn->query($sql2);

while($row = mysqli_fetch_assoc($result2)) {
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/product_card.php';
}


?>