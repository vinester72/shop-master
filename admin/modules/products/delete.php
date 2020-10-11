<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

// Сделать страницу обработчик где удаляем из  базы данных выбранный товар

if(isset($_GET["id"])) {
	$sql = "DELETE FROM products WHERE id=" . $_GET["id"];
	if(mysqli_query($conn, $sql)) {
        header("Location: /admin/products.php");
    } else {
        echo "<h3>произошла ошибка</h3>" . mysqli_error($conn);
    } 
}
		
?>