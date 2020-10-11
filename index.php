<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "home";

// подключение header
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php'; 	
?>
<!-- </nav> -->
<div class="container" style="margin-top: 130px">
	<div class="row mt-4">
	  <div class="col-2" style="position: fixed;">
	  <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/parts/cat_nav.php';
      ?>
	  </div>
	  <div class="col-10 ml-auto px-0">
	  <!--  <div class="container">	 -->
	<div class="container">
		<?php
	 		// функционал постраничной навигации
			include $_SERVER['DOCUMENT_ROOT'] . '/modules/products/pagination.php';
		?>	
		 <div class="row" id="products-block">
			 <?php
				// вывод товаров на страницу
				$sql_i = "SELECT * FROM products LIMIT 3";

				$result = $conn->query($sql_i);
				
				while($row = mysqli_fetch_assoc($result_of_pag)) {
					include 'parts/product_card.php';

				}
			?>
		</div><!-- /.row --> 
	</div>
	<?php
	/*
	1. Вывести блок с корзиной в шпке сайта+
	2. Сделать таблицу в базе данных для хранения заказов+
	3. Добавление товара в корзину+
	  	3.1 Сделать клик по кнопке "добавить в корзину"
		3.2 Добавить товар в куки козины
		3.3 Отобразить, что товар добавился в корзине
	4. Сделать страницу корзины
	5. Сделать оформление заказа
	*/
	// setcookie("basket", "", 0,"/");
	// var_dump($_COOKIE['basket']);

	/*
	1. Выводить на странице только 6 записей
	2. Сделать клик по кнопке
	3. Сделать запрос к базе данных на получение следующих 6 записей
	4. Получить следующие записи
	5. Вывести записи на экран
	*/
	
	?>
	<!-----Кнопка "Показать ущё 6 ..."----->
	<div class="row">
		<div class="col-12 ml-5">
			<input type="hidden" value="<?php echo $page ?>" id="current-page">
			<button class="btn btn-lg btn-outline-success" id="show-more" style="width:230px"
			>Показать ещё ...</button>
		</div>
	</div>
	<!----Кнопки постраничной навигации ---->
	<div class="row ">
		<div class="col-12  mt-3 d-flex flex-wrap">
			<div class="pagination">
				<?php
				
				if($page>1) {
					echo "<a href='/index.php?page=" . ($page-1) . "' class='btn btn-outline-secondary'>Previous</a>";			
				}

				for($page=1; $page<$number_of_pages; $page++) {
					if(isset($_GET['page']) && $_GET['page'] == $page) {	
						echo "<a href='/index.php?page=" . $page . "' class='btn btn-outline-success active'>" . $page . "</a>";
					} else {
						echo "<a href='/index.php?page=" . $page . "' class='btn btn-outline-success '>" . $page . "</a>";
					}
				}

				if($page<$number_of_pages) {
					echo "<a href='/index.php?page=" . ($page+1) . "' class='btn btn-outline-secondary'>Next</a>";			
				}
			?>
			</div>
		</div>
	</div>

<?php 

// подключение футера
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	