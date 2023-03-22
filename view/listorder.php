<?php
    include_once '../api/controls.php';
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
    <link rel="stylesheet" href="css/bar.css">
    <title>SignUp</title>
</head>
<body>
<div class="row">
    <div class="left bgBar">
        <h2>List Order</h2><hr>
        <ul id="myMenu">
        <li><a href="Menu.php">Menu</a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
  
  <div class="right" style="background-color:#fff;">
    <div class="r">
        <p>
            Name | <?php echo $_SESSION['userses']['user'] ?>
        </p>
    </div>
    <div class="row bg">
        <div class="col-12">
            <table>
                <tr>
                    <th>Menu Name</th>
                    <th style="width:20%">Order Amount</th>
                    <th style="width:20%">Price</th>
                    <th style="width:20%"></th>
                </tr>
                <form action="../api/controls.php?ac=3" method="post">
                    <?php
                        $total = 0;
                        $order = $clCon->showlistOrder($_SESSION['userses']['id']);
                        foreach ($order as $value) {
                            $total += $value['order_amount']*$value['menu_price'];
                    ?>
                    <tr>
<!-- edit del------------------------------------------------------------- -->
                        <td><?= $value['menu_name'] ?></td>
                        <td><input type="number" value="<?= $value['order_amount'] ?>"></td>
                        <td><?= $value['menu_price'] ?></td>                 
                        <td>
                            <input type="hidden" name="order_id" value="<?= $value['order_id'] ?>">
                            <input type="hidden" name="order_amount" value="<?= $value['order_amount'] ?>">
                            <button class="w" type="submit" name="Edit">Edit</button>
                            <button class="b" type="submit" name="Cancel">Cancel</button>
                        </td>
                        
                    </tr>
                    <?php } ?>
                </form>
            </table>

            <table>
                <tr style="color:red;">
                    <th>Total</th>
                    <th style="width:22%"><?= $total ?></th>
                    <th style="width:18%">Bath</th>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php }else{
    echo "<script>alert('Please login.')</script>";
    echo "<script>goto('index.html')</script>";
} ?>