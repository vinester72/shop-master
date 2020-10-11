<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "products";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <!-- хлебные крошки -->
                            <nav aria-label="breadcrumb " >
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $page; ?>
                                        
                                </li>
                              </ol>
                            </nav>
                         <!-- /хлебные крошки -->
                        
                        <div class="card-header ">

                            <h4 class="card-title">Products
                                <a href="modules/products/add.php" type="button" class="btn btn-secondary">Add</a>
                             </h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Options</th>
                                </thead>
                                <tbody>
                                    <?php
                                    // выбираем все поля
                                    $sql = "SELECT * FROM products";
                                    //  $conn выполнит запрос, в который передадим $sql
                                    $result = $conn->query($sql);
                                    // выводим все результаты
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row["title"] ?></td>
                                            <td><?php echo $row["description"] ?></td>
                                            <td><?php echo $row["categories_id"] ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                  <a href="modules/products/edit.php?id=<?php echo $row["id"] ?>" type="button" class="btn btn-secondary">Edit</a>
                    
                                                  <a  href="modules/products/delete.php?id=<?php echo $row["id"] ?>" type="button" class="btn btn-secondary">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="main-panel"> -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>
