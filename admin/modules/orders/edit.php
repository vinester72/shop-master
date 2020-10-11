<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "orders";

// если существует параметры для ввода продукции
if(
    isset($_POST["send_btn"])
    

    // вставить в таблицу 
) { // читаем содержимое файла
 
 $sql = "UPDATE `orders` SET status='" . $_POST["status"] . "', name='" . $_POST["name"] . "', address='" . $_POST["address"] . "', phone='" . $_POST["phone"] . "' WHERE id=" . $_GET["id"];
     
      if(mysqli_query($conn, $sql)){
            header("Location: /admin/orders.php");
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
                <div class="col-12">
                 <?php
                    //если существует переменная $_GET["id"] то
                   if( isset($_GET["id"])) {
                        // выбираем из таблицы 
                        $sql = "SELECT * FROM orders WHERE id=" . $_GET["id"];
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                       
                    ?>
                        <!-- хлебные крошки -->
                      <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>

                          <li class="breadcrumb-item">
                              <a href="/admin/orders.php" >
                                <?php echo $page; ?>
                              </a>
                          </li>
                         
                           <li class="breadcrumb-item active" aria-current="page">
                              <?php echo 'Edit Status'; ?>    
                          </li>
                        </ol>
                      </nav>
                       <!-- /хлебные крошки -->

                       <form action="" method="POST" enctype="multipart/form-data">
                            <label for="exampleInputOrders">Edit Status</label>
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row["name"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress">Address</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $row["address"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $row["phone"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleStatus">Status</label>
                                <select type="text" name="status" class="form-control">
                                    <option value="0">Не выбрано</option>
                                     <option value="Товар оплачен">Товар оплачен</option>
                                    <option value="Отправлен клиенту">Отправлен клиенту</option>
                               <?php
                                    $sqls = "SELECT * FROM orders";
                                    $results = $conn->query($sqls);
                                    $row = mysqli_fetch_assoc($results);
                                        echo "<option value='" . $row["status"] . "'> " . $row["status"] . "</option>";    
                                ?>  
                                </select>
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