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

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

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
	<div class="container" >
		<div class="row pl-5" id="products-block">
			<div class="col-12 ">
			
			<!--- таблица с продуктами в корзине ---->
				<table class="table table-striped" style="color: #797575">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Photo</th>
				      <th scope="col">Title</th>
				      <th scope="col">Price, ₴</th>
				      <th scope="col">Count</th>
				       <th scope="col">Costs, ₴</th>
				      <th scope="col">Options</th>
				    </tr>
				  </thead>
				  <tbody class="table-products">
					<?php
					// переменная кол-ва наименований товара в заказе
					$total = 0;
					$summ = 0;
						// если существует переменная $_COOKIE['basket'] то  
						if(isset($_COOKIE['basket'])) {
							// преобразуем через json_decode в строчный формат
							$basket = json_decode($_COOKIE['basket'], true);
							// пока $i < кол-ва продуктов, которые добавили
							for($i = 0; $i < count($basket['basket']); $i++) {
								// выбираем все поля с таблицы продуктов
								$sql = "SELECT * FROM products WHERE id=" . $basket['basket'][$i]['product_id'];
								$result = $conn->query($sql);
								// получаем продукт
								$product = mysqli_fetch_assoc($result);
								// о продукте выводим информацию 
								
								?>
								<tr>
							      	<th scope="row"><?php echo $product['id'] ?></th>
							     	<td class="basket-img">
							     		<img src="data:image/jpeg;base64,<?php echo base64_encode($product['image']); ?>" class="card-img-top" alt="photo" title="<?php echo $product['description'] ?>" style="cursor: pointer; width: 60px;">
							     	</td>
							      	<td><?php echo $product['title'] ?></td>
							      	<!------цена товара---------->
							      	<td><?php echo number_format($product['cost'],2, '.', '') ?></td>
							      	<!-------количество товара---------->
							      	<td>
										<form action="" method="POST" id=""  onsubmit="countesFormOfBasket(this, <?php echo $product['id'] ?>)">
											<input type="text" name="count" class="form-control" value="<?php echo $basket['basket'][$i]['count']; ?>" style="width:70px">

										</form>
							      	</td>

							      	<td><?php $income = number_format($product['cost'] * $basket['basket'][$i]['count'],2, '.', ''); echo $income; ?> </td>
							        <!-----Кнопка удаления товаров в корзине--------> 
							      	<td>	
							      		<button type="submit" name="delete_btn" onclick="deleteProductBasket(this, <?php echo $product['id'] ?>)" class="btn btn-outline-secondary">Delete</button>
							      		
							      	</td>
							   		
							<?php
								
								// перебираем массив и суммируем стоимость всего товара
								$arr[]=(double)$income;
								// var_dump($income);
								$total = 0;
								foreach ($arr as $value) {
								$total = (number_format($total,2, '.', '') + number_format($value,2, '.', '') );
								 // echo "{$value}";
								}
								
							}
						}
					?>
				  </tbody>
					
				  <!-----Стоимость заказа------>
				   </tr><th colspan="4">Итого:</th><th></th><th><?php echo number_format($total,2, '.', '');?></span></th></th><th></tr>	

				</table>
			</div>
			<?php
				
			?>

			<div class="col-12  mt-5" id="order">
				<form class="form-basket" action="/modules/basket/order.php" method="POST" id="form_basket">
				  <label for="exampleInputEmail1" style="color: #797575">Форма заказа товара</label>

				  <div class="form-group">
				    <input type="text" name="username" class="form-control" id="inputName" required="" placeholder="Ваше имя:">
				    <small id="emailHelp" class="form-text text-muted">Мы никогда не передадим ваши данные кому-либо еще.</small>
				  </div>
				  <div class="form-group">
				    <input type="hidden" name="product" class="form-control" value="<?php echo $product['title'] ?>">
				  </div> 
				 <div class="form-group">
				    <input type="hidden" name="costs" class="form-control" value="<?php echo number_format($total,2, '.', '');?>">
				  </div> 
					
				  <div class="form-group">
				    <input type="text" name="address" class="form-control" id="inputEddress" required="" placeholder="Почтовый адрес:">
				  </div>

				  <div class="form-group">
				    <input type="text" name="phone" class="form-control" id="inputPhone" required="" placeholder="Ваш телефон:">
				  </div>
				   <!-----Стоимость заказа------>
				 
				  	<div class="sum"><span>Итого: </span><?php echo number_format($total,2, '.', '');?><span>грн.</span></div>
				  	<!-----Кнопка оформить заказ---------->
				  	<button type="submit" name="order_btn" class="btn btn-outline-success"  style="width:260px; height:45px; font-size:22px; font-weight:400;  margin-bottom:15px ">Оформить заказ</button>
				  	<!-----Ссылка на страницу регистрации---------->
				 	<a href="register.php" id="come-in" class="reg-btn">
						Зарегистрироваться
					</a>
				</form>
			</div>
				
		</div><!-- /.row -->
	</div>
<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	