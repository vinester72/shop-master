<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property = "og: image" content = "https://varvy.com/pagespeed/images/base64-image.png">
	<title>shop</title>
  <meta name="description" content="shop-master">
  <meta name="keywords" content="shop-master">
  <!-- Favicon -->
  <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
  <!--- Awesomes Fonts --->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
  <!--- Open Sans Google Fonts --->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700,700i,800&amp;subset=cyrillic" rel="stylesheet">
	<!--- Bootstrap Reboot CSS --->
	<link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
	<!--- Bootstrap CSS --->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!--- Main CSS --->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
  <div class="navigation bg-light" style="position: fixed; top: 0; z-index: 10; width: 100%">
     <div class="container">
      <div class="navbar-light">
        <div class="d-flex" style="margin-left: auto; max-width: 420px">
          <p style="margin-right: 15px; margin-top: 5px; margin-left: auto; color: grey">Здравствуйте,</p>
          
          <i class="fa fa-user" style="font-size: 15px; margin-top: 10px; margin-right: 5px; color: grey"></i>
           <?php
              if(isset($_COOKIE["user"])) {
                //выбираем нашего пользователя id = ...
                $sql = "SELECT * FROM users WHERE id=" . $_COOKIE["user"];
                $result = mysqli_query($conn, $sql);
                // получаем пользователя
                $user = mysqli_fetch_assoc($result); 
                ?>
                <a href="private_office.php" id="come-in" class="come-in" title="Личный кабинет">
                  <?php echo $user["login"]; ?>
                </a>
                <a href="exit.php" title="Выйти" style="width: 20px; margin-left: 20px">
                  <img src="assets/img/application-exit.png" style="width: 100%">
                </a>
                <?php
              } else {
              ?>
         
          <a href="login.php" id="come-in" class="come-in" title="Войти" style="">
              войдите в личный кабинет
          </a>
          <?php
            }
          ?>
        </div>
      </div>  
      <nav class="navbar navbar-expand-lg navbar-light px-0" >
          <a class="navbar-brand" href="/" title="На главную">
            <img class="mb-3" src="assets/img/logo.png" alt="logo">
            <p>
              Shop-<span>master</span>
            </p>  
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item  <?php if($page == "home"){ echo 'active'; } ?>">
                <a class="nav-link " href="/" title="На главную">Home <span class="sr-only">(current)</span></a>
              </li>
             
               <li class="nav-item  <?php if($page == "about"){ echo 'active'; } ?>">
                <a class="nav-link" href="/about.php">About</a>
              </li>
               <li class="nav-item  <?php if($page == "contacts"){ echo 'active'; } ?>">
                <a class="nav-link" href="/contacts.php">Contacts</a>
              </li>
             
            </ul>
            <form class="form-inline my-2 my-lg-0 ">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                Search
              </button>
              
              <a href="basket.php" class="basket my-2 my-sm-0 d-flex "  id="go-basket" style="text-decoration: none;">
                  <img src="assets/img/shopcartadd.png" alt="Корзина" title="Корзина">
                <span style="font-size: 20px">
                   <?php
                  // заходим в условие если есть куки basket
                    if (isset($_COOKIE['basket'])){
                  // дешифруем JSON формат куки корзины
                    $cookie = json_decode($_COOKIE['basket'], true);
                    // выводим посчитанное колличество товаров из массива куки basket
                      echo count($cookie['basket']);
                  // если куки нет то выводим 0
                    }else{
                    echo "0";
                    }
                  ?>
                </span>
   
              </a>
            </form>
          </div>
      </nav>
    </div>
  </div>