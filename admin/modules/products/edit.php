<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "products";

// если существует параметры для ввода продукции
if(
    isset($_POST["send_btn"])
     && !empty($_FILES["image"]["tmp_name"])

    // вставить в таблицу 
) { // читаем содержимое файла
 $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

 $sql = "UPDATE `products` SET title='" . $_POST["title"] . "', cost='" . $_POST["cost"] . "',description='" . $_POST["description"] . "', content='" . $_POST["content"] . "', categories_id='" . $_POST["categories_id"] . "', image='" . $image . "' WHERE id=" . $_GET["id"];
     
      if(mysqli_query($conn, $sql)){
            header("Location: /admin/products.php");
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
                        $sql = "SELECT * FROM products WHERE id=" . $_GET["id"];
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                       
                    ?>
                        <!-- хлебные крошки -->
                      <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>

                          <li class="breadcrumb-item">
                              <a href="/admin/products.php" >
                                <?php echo $page; ?>
                              </a>
                          </li>
                         
                           <li class="breadcrumb-item active" aria-current="page">
                              <?php echo 'Edit Product'; ?>    
                          </li>
                        </ol>
                      </nav>
                       <!-- /хлебные крошки -->

                       <form action="" method="POST" enctype="multipart/form-data">
                            <label for="exampleInputTitle">Edit Product</label>
                            <div class="form-group">
                                <label for="exampleInputTitle">Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $row["title"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCost">Cost</label>
                                <input type="text" name="cost" class="form-control" value="<?php echo $row["cost"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDescription">Description</label>
                                <input type="text" name="description" class="form-control" value="<?php echo $row["description"]; ?>"></input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputContent">Content</label>
                                <textarea type="text" name="content" class="form-control" value="<?php echo $row["content"]; ?>"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputCategories_id">Categories_id</label>
                                <select type="text" name="categories_id" class="form-control">
                                    <option value="0">Не выбрано</option>
                               <?php
                                    $sql = "SELECT * FROM categories";
                                    $result = $conn->query($sql);
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row["id"] . "'> " . $row["title"] . "</option>";    
                                    }
                                ?>  
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputImages">Images</label>
                                <input type="file" name="image" class="form-control" value="<?php echo $row['image']; ?>"></input>

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