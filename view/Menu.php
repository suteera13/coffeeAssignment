<?php
    include_once '../api/controls.php';
    $munuTable = $clCon->showMenu();
    if(isset($_SESSION['userses'])){
?>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
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
    <h2>Menu</h2>
    <ul id="myMenu">
      <li><a href="listorder.php">list order</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  
  <div class="right" style="background-color:#fff;">
    <div class="r">
            <p>
                <?php echo $_SESSION['userses']['user'] ?> 
            </p>
        </div>
        <div class="row bg">
            <div class="col-12">
                <form action="total.php" method="post">
                    <table>
                        <tr>
                            <th>Menu Name</th>
                            <th style="width:23%">Order Amount</th>
                            <th style="width:23%">Price</th>
                        </tr>
                        <?php
                            foreach ($munuTable as $value) {
                        ?>
                        
                        <tr>
                            <th><?= $value["menu_name"] ?></th>
                            <th>
                                <input type="number" name="<?= $value["menu_id"] ?>" id="<?= $value["menu_id"] ?>">
                            </th>
                            <th id="price"><?= $value["menu_price"] ?></th>
                        </tr>
                        
                        <?php } ?>
                    </table>
                    <center>
                        <button class="w" type="reset">Reset</button>
                        <button class="b" type="submit">Buy</button>
                    </center>                
                </form>
            </div>
        </div>
  </div>
    
</body>
</html>
<?php 
}else{
    echo "<script>goto('../view')</script>";
} ?>
