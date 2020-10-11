<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
		
?>

<div class="container" style="margin-top: 130px">
	<div class="row mt-4">
	  <div class="col-2"  style="position: fixed;">
	  <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/parts/cat_nav.php';
      ?>
	  </div>
	  <div class="col-10 ml-auto px-0">
	  	
<!-- хлебные крошки -->
	<?php
	// выбираем все поля из таблицы категорий 
	$sql = "SELECT * FROM categories WHERE id=" . $_GET['id'];
	$category = mysqli_fetch_assoc($conn->query($sql));	
	?>
	
	<nav aria-label="breadcrumb " >
	  <ol class="breadcrumb mx-5 bg-white">
	    <li class="breadcrumb-item"><a href="/" style="color: green">Home</a></li>
	    
	    <li class="breadcrumb-item active" aria-current="page">
	    	<?php echo $category['title']; ?>
	    		
	    </li>
	  </ol>
	</nav>
<!-- /хлебные крошки -->
	<div class="container">
		<div class="row">
			<?php
				// выбираем все поля из таблицы продуктов 
				$sql = "SELECT * FROM products WHERE categories_id=" . $_GET['id'];
				$result = $conn->query($sql);
				while($row = mysqli_fetch_assoc($result)) {
					include 'parts/product_card.php';
				}
			?>
		</div><!-- /.row -->
	</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';	
?>