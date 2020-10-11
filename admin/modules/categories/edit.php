<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "categories";

// если существует параметры для ввода продукции
if(
    isset($_POST["send_btn"])

    // вставить в таблицу 
) {   $sql = "UPDATE `categories` SET title='" . $_POST["title"] . "'  WHERE id=" . $_GET["id"];
     
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
                 <?php
                   if( isset($_GET["id"])) {
                       
                        $sql = "SELECT * FROM categories WHERE id=" . $_GET["id"];
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                    
                    ?>
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
                              <?php echo 'Edit Categories'; ?>    
                          </li>
                        </ol>
                      </nav>
                       <!-- /хлебные крошки -->
                       <form action="" method="POST">
                            <label for="exampleInputTitle">Edit Categories</label>
                           <?php
                               
                             ?>
                            <div class="form-group">
                                <label for="exampleInputTitle">Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $row["title"]; ?>">
                            </div>
                            <button type="submit" name="send_btn" class="btn btn-primary">Save</button>
                           
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