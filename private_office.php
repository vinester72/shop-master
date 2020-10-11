


<?php



include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php'; 	
?>
<!-- </nav> -->
<div class="container"  style="margin-top: 130px">
	<div class="row mt-4">
	  <div class="col-2" style="position: fixed;">
	    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/parts/cat_nav.php';
      ?>
	  </div>
	  <div class="col-10 ml-auto px-0">
		  <!--  <div class="container">	 -->
		<div class="container" >
			<div class="row " style="max-width: 100%">
				<div class="col-12 d-flex justify-content-between">
					
					<div class="col-8">
					     
					</div>
					<div class="col-4 pl-0 pr-0" style=" width: 440px;">
						<a href="#" class="reg-btn" style="font-size: 16px; width: 100%; margin-left: 0">Pедактирование персоналных данных</a></br>
						<a href="#" class="reg-btn" style="font-size: 16px; width: 330px; margin-left: 0">Выход</a>
					</div>
				
				</div>
			</div><!-- /.row -->
		</div>
		
	</div>	
<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	