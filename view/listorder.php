<?php
    include_once '../api/controls.php';
    $orderTable = $clCon->showlistOrder();
    if(isset($_SESSION['userses'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Aboreto' rel='stylesheet'>
    <link rel="stylesheet" href="css/menu.css">
    <title>SignUp</title>
</head>
<body>
    <div class="r">
        <p>
            Username | <a href="logout.php">Logout</a>
        </p>
    </div>
    <div class="row bg">
        <div class="col-10"><h3>List Order</h3></div> 
        <div class="col-2 r"><a href="Menu.php">Menu</a></div> 
        <div class="col-12">
            <table>
                <tr>
                    <th>Menu Name</th>
                    <th style="width:20%">Order Amount</th>
                    <th style="width:20%">Price</th>
                    <th style="width:20%"></th>
                </tr>
                <?php
                    $total = 0;
                    foreach ($orderTable as $value) {
                        $total += $value['order_amount']*$value['menu_price'];
                ?>
                <tr>
                    <td><?= $value['menu_name'] ?></td>
                    <td><?= $value['order_amount'] ?></td>
                    <td><?= $value['menu_price'] ?></td>
                    <td><button class="b">Cancel</button></td>
                    
                </tr>
                <?php } ?>
            </table>
        <!-- </div>
        <div class="col-12"> -->
            <table>
                <tr style="color:red;">
                    <th>Total</th>
                    <th style="width:22%"><?= $total ?></th>
                    <th style="width:18%">Bath</th>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
<?php }else{
    echo "<script>alert('Please login.')</script>";
    echo "<script>goto('index.html')</script>";
} ?>