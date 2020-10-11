<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = 'products';

// если существует параметры для ввода продукции
if(
    isset($_POST["submit"]) 
    && !empty($_FILES["image"]["tmp_name"]) 
     
) { // читаем содержимое файла
    $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        
    // вставить в таблицу "название таблицы"
    $sql = "INSERT INTO `products` (`title`, `cost`, `description`, `content`, `categories_id`, `image`) VALUES ('" . $_POST["title"] . "', '" . $_POST["cost"] . "','" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["categories_id"] . "', '" . $image . "')";
    if(mysqli_query($conn, $sql)) {
        echo "<h3>товар добавлен!</h3>";
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
                            <?php echo "Add Products"; ?>    
                        </li>
                      </ol>
                    </nav>
                     <!-- /хлебные крошки -->

                   <form action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputTitle">Add Products</label>  
                        <div class="form-group">
                            <label for="exampleInputTitle">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCost">Cost</label>
                            <input type="text" name="cost" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescription">Description</label>
                            <input type="text" name="description" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputContent">Content</label>
                            <textarea type="text" name="content" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCategories_id">Categories_id</label>
                            <select type="text" name="categories_id" class="form-control">
                                <option value="0">Не выбрано</option>
                                <?php
                                    $sql = "SELECT * FROM categories";
                                    $result = $conn->query($sql);
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";    
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputImages">Images</label>
                            <input type="file" name="image" class="form-control"></input>
                        </div>
                        <button type="submit" name="submit" value="Upload" class="btn btn-primary">Save</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>