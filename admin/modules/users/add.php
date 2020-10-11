<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = 'users';

// если существует параметры для ввода продукции
if(
    isset($_POST["submit"]) 
   
     
) {
        
    // вставить в таблицу "название таблицы"
    $sql = "INSERT INTO `users` (`login`, `phone`, `email`) VALUES ('" . $_POST["username"] . "', '" . $_POST["phone"] . "','" . $_POST["email"] . "')";
    if(mysqli_query($conn, $sql)) {
        echo "<h3>пользователь добавлен!</h3>";
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
                            <?php echo "Add Users"; ?>    
                        </li>
                      </ol>
                    </nav>
                     <!-- /хлебные крошки -->

                   <form action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputTitle">Add Users</label>  
                        <div class="form-group">
                            <label for="exampleInputTitle">Login</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCost">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescription">Email</label>
                            <input type="text" name="email" class="form-control"></input>
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