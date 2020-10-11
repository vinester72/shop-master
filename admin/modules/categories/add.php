<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = 'categories';

// если существует параметры для ввода продукции
if(
    isset($_GET["title"]) 
     
) {
    
    // вставить в таблицу "название таблицы"
    $sql = "INSERT INTO `categories` (`title`) VALUES ('" . $_GET['title'] ."')";
    if(mysqli_query($conn, $sql)){
         
        header("Location: /admin/categories.php");
    
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
                            <a href="/admin/categories.php" >
                              <?php echo $page; ?>
                            </a>
                        </li>
                       
                         <li class="breadcrumb-item active" aria-current="page">
                            <?php echo 'Add Categories'; ?>    
                        </li>
                      </ol>
                    </nav>
                    <!-- /хлебные крошки -->  

                   <form action="add.php" method="GET">
                        <label for="exampleInputTitle">Add Categories</label>  
                        <div class="form-group">
                            <label for="exampleInputTitle">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>