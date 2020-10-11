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
                                <li class="breadcrumb-item">
                                     <a href="/admin/orders.php" >
                                         <?php echo $page; ?>
                                    </a>
                                </li>      
                                </li>
                                 <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo 'Show Orders'; ?>    
                                </li>
                              </ol>
                            </nav>
                         <!-- /хлебные крошки -->
                        <div class="card-header ">
                            <h4 class="card-title">Show Orders
                                 
                             </h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Order ID</th>
                                    <th>User ID</th>
                                    <th>Products ID</th>
                                    <th>Products title</th>
                                    <th>Price, ₴</th>
                                    <th>Count</th>
                                    <th>Costs, ₴</th>
                                   
                                </thead>
                                <tbody>
                                    <?php
                                       //если существует переменная $_GET["id"] то
                                       if( isset($_GET["id"])) {
                                           
                                        
                                            // выбираем из таблицы продуктов
                                            $sql = "SELECT * FROM orders WHERE id=" . $_GET["id"];
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);

                                            $order = json_decode($row['products'], true);

                                           for($i = 0; $i < count($order['basket']); $i++) {

                                            $sql1 = "SELECT * FROM products WHERE id=" . $order['basket'][$i]['product_id'];
                                            $result1 = $conn->query($sql1);
                                             // получаем продукт
                                            $product = mysqli_fetch_assoc($result1);



                                        ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td> 
                                                <td><?php echo $row["user_id"]; ?></td>
                                                <td><?php echo  $order["basket"][$i]["product_id"];?></td>

                                               <td><?php echo $product['title'] ?></td>
                                               <td><?php echo number_format($product['cost'],2, '.', '') ?></td>
                                                <td><?php echo  $order["basket"][$i]["count"];?></td>

                                                <td><?php $income = number_format($product['cost'] * $order['basket'][$i]['count'],2, '.', ''); echo $income; ?> </td>
                                               
                                            </tr>
                                        <?php
                                        // print_r($order);
                                        }
                                       
                                      }
                                    ?>
                                </tbody>
                                  <tr>
                                    <td>Total:</td>
                                    <td></td>
                                    <td></td><td></td><td></td><td></td>
                                    <td><?php echo $row["costs"]; ?></td>
                                  </tr> 
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
