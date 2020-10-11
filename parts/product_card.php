
<div class="card litle col-3 ml-5 mb-4 shadow p-3 mb-5 bg-white rounded"  style="width: 18rem; cursor: pointer">
<div style="width: 10em; height: 11em">
  <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" class="card-img-top" alt="photo" title="<?php echo $row['description'] ?>" style="cursor: pointer; ">
</div>

  <div class="card-body m-0 p-1">
    <h5 class="card-title text-center">
      <a href="product.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; font-size: 23px; color: #000">
        <?php echo $row['title'] ?>
      </a>  
    </h5>
    <p class="card-text text-center mb-3"><?php echo $row['description'] ?></p>
     <p class="card-text-red ml-1">Цена:<span>&#8194;<?php echo $row['cost'] ?></span> ₴</p>
    <div class="" onclick="addToBasket(this)" data-id="<?php echo $row['id'] ?>" title="Добавить в корзину"  style="position: absolute; right: 18px; border: none; background: transparent; bottom: 20px; width: 40px; height: 35px
    ">
      <img src="assets/img/shopcartadd.png" class="w-100 h-100" >
  </div>
  </div>
</div>
