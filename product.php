<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
		
?>

<div class="container" style="margin-top: 130px">
	<div class="row mt-4">
	  <div class="col-2" style="position: fixed;">
	    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/parts/cat_nav.php';
      ?>
	  </div>
	  <div class="col-10 ml-auto px-0">
 <!-- хлебные крошки -->
	<?php
	$sql = "SELECT * FROM products WHERE id=" . $_GET['id'];
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);

	 $categoryResult = $conn->query( 'SELECT * FROM categories WHERE id=' . $row['categories_id']);
	$category = mysqli_fetch_assoc( $categoryResult ); 
	?>
	
	<nav aria-label="breadcrumb ">
	  <ol class="breadcrumb ml-3 mx-5 bg-white">
	    <li class="breadcrumb-item"><a href="/" style="color: green">Home</a></li>

	    <li class="breadcrumb-item">
	    	<a href="cat.php?id=<?php echo $category['id'] ?>" style="color: green">
	    		<?php echo $category['title']; ?>
	    	</a>
	    </li>
	    <li class="breadcrumb-item active" aria-current="page">
	    	<?php echo $row['title']; ?>	
	    </li>
	  </ol>
	</nav>
<!-- /хлебные крошки -->
	<div class="container pr-10">
		<div class="row">
			<?php
			
			?>
			<div class="col-12 ml-5">
				<div class="card mr-5 shadow p-3 mb-5 bg-white rounded">
					<div class="row">
						<div class="col-4">
						<img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']) ?>"  class="card-img-top" alt="photo" title="<?php echo $row['description'] ?>">
					</div>
					
					<div class="card-body col-8">
				    	<h5 class="card-title" style="font-size: 23px">
				    		<?php echo $row['title'] ?>	
				    	</h5>
				    	<p class="card-text mb-2"><?php echo $row['description'] ?></p>
				     	<p class="card-text mb-3"><span style="font-size: 17px; font-weight: 500;">Описание: </span><?php echo $row['content'] ?></p>
				    	<button class="btn btn-outline-secondary" onclick="addToBasket(this)" data-id="<?php echo $row['id'] ?>">
    						В корзину
						</button>
					</div>
					</div>
					
				</div>
				
			</div>
		</div><!-- /.row -->
	</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>