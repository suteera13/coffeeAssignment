<?php
    session_start();

    include_once '../api/class.php';
    $clCon = new control();
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
        <h2>Total</h2><hr>
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
                    <th style="width:23%">Order Amount</th>
                    <th style="width:23%">Price</th>
                </tr>
                <?php
                    foreach ($_POST as $key => $value) {
                        if($value != ""){
                            $price = $clCon->checkPrice($key);
                ?>
                <tr>
                    <td><?= $price[0]['menu_name']; ?></td>
                    <td><?= $value; ?></td>
                    <td><?= $price[0]['menu_price']; ?></td>
                </tr>
                <?php }} ?>
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

            <div class="fr col-6">
                <form action="../api/controls.php?ac=2" method="post">
                    <?php 
                        foreach ($_POST as $key => $value) {
                    ?>
                    <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
                    <?php } ?>
                    <button class="b" type="submit">Confirm</button>
                </form>
            </div>

        </div>
    </div>
</div>
</body>
</html>