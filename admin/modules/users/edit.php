<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "users";

// если существует параметры для ввода продукции
if(
    isset($_POST["send_btn"])
    

    // вставить в таблицу 
) { 

 $sql = "UPDATE `users` SET login='" . $_POST["username"] . "', phone='" . $_POST["phone"] . "', email='" . $_POST["email"] . "' WHERE id=" . $_GET["id"];
     
      if(mysqli_query($conn, $sql)){
            header("Location: /admin/users.php");
      } else {
            echo "<h3>произошла ошибка</h3>" . mysqli_error($conn);
    }
}


include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                 <?php
                    //если существует переменная $_GET["id"] то
                   if( isset($_GET["id"])) {
                        // выбираем из таблицы продуктов
                        $sql = "SELECT * FROM users WHERE id=" . $_GET["id"];
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        
                    ?>
                        <!-- хлебные крошки -->
                      <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>

                          <li class="breadcrumb-item">
                              <a href="/admin/users.php" >
                                <?php echo $page; ?>
                              </a>
                          </li>
                         
                           <li class="breadcrumb-item active" aria-current="page">
                              <?php echo 'Edit Users'; ?>    
                          </li>
                        </ol>
                      </nav>
                       <!-- /хлебные крошки -->

                       <form action="" method="POST" enctype="multipart/form-data">
                            <label for="exampleInputTitle">Edit Product</label>
                            <div class="form-group">
                                <label for="exampleInputTitle">Login</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row["login"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCost">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $row["phone"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDescription">Email</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $row["email"]; ?>"></input>
                            </div>
                            
                            
                            <button type="submit" name="send_btn" value="Upload" class="btn btn-primary">Save</button>
                           
                        </form>
                    <?php
                    }
                             
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>   