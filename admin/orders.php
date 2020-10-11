<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "orders";

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
                            <h4 class="card-title">Orders
                                
                             </h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Costs, ₴</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Options</th>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    
                                        // выбираем все поля
                                        $sql = "SELECT * FROM orders";
                                        //  $conn выполнит запрос, в который передадим $sql
                                        $result = $conn->query($sql);
                                        // выводим все результаты
                                        while ($row = mysqli_fetch_assoc($result)) {

                                        ?>
                                            <tr>
                                                <td><?php echo $row["id"] ?></td>
                                                <td><?php echo $row["status"] ?></td>
                                                <td><?php echo $row["name"] ?></td>
                                                <td><?php echo $row["costs"] ?></td>

                                                <td><?php echo $row["address"] ?></td>
                                                <td><?php echo $row["phone"] ?></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                      <a  href="modules/orders/show_orders.php?id=<?php echo $row["id"] ?>" type="button" class="btn btn-secondary">Show</a>  

                                                      <a href="modules/orders/edit.php?id=<?php echo $row["id"] ?>" type="button" class="btn btn-secondary">Edit</a>
                        
                                                      <a  href="modules/orders/delete.php?id=<?php echo $row["id"] ?>" type="button" class="btn btn-secondary">Delete</a>
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
