<?php

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';



//кол-во продукта на странице
$results_per_page = 3;


//выбираем все поля из таблицы продуктов
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
// получаем общее кол-во результатов
$number_of_results = mysqli_num_rows($result);

// число страниц
$number_of_pages = ceil($number_of_results/$results_per_page);
// echo $number_of_pages;

// если запроса на страницу не сущесвует то 
if(!isset($_GET['page'])) {
	$page = 1;
} else {
	$page = $_GET['page'];
	
}



//страница первого результата
$this_page_first_result = ($page-1)*$results_per_page; 

// запрос на вывод количества результатов в странице
$sql1 = "SELECT * FROM products LIMIT " . $this_page_first_result . ',' . $results_per_page;
$result_of_pag = mysqli_query($conn, $sql1);


?>


