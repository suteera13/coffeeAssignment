<?php 
    session_start(); 
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
        <div class="col-10"><h3>Menu</h3></div> 
        <div class="col-2 r"><a href="listorder.php">list order</a></div> 
        <div class="col-12">
            <table>
                <tr>
                    <th>Menu Name</th>
                    <th style="width:23%">Order Amount</th>
                    <th style="width:23%">Price</th>
                </tr>
                <?php 
                    include_once '../api/class.php';
                    $clCon = new control();
                    $show = $clCon->showMenu();
                ?>
                <tr>
                    <td><?php echo $resul["menu_name"]; ?></td>
                    <td><input type="number" min="1" value="0" style="width: 60%"></td>
                    <td><?php echo $resul["price"]; ?></td>
                </tr>
                <?php ?>
            </table>
        <!-- </div>
        <div class="col-12"> -->
            <table>
                <tr style="color:red;">
                    <th>Total</th>
                    <th style="width:23%">0</th>
                    <th style="width:23%">Bath</th>
                </tr>
            </table>
            <center>
                <button class="w">Reset</button>
                <button class="b">Buy</button>                
            </center>
        </div>
    </div>
</body>
</html>