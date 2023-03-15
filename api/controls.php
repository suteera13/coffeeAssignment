<?php
    include_once 'class.php';
    $clCon = new control();
    $data = file_get_contents("php://input");
    $arr = json_decode($data, true);
    print_r($arr);
    if($_GET["ac"]==0){
        $user = $arr["user_name"];
        $pass = $arr["user_pass"];
        echo "\nname:".$user."\npass:".$pass."\n";
        $status = $clCon->checkUser($user,$pass);
        if($status==1){
            echo '<script>alert(login successfuly)</script>';
            echo '<script>goto(index.html)</script>';
        }else{
            phpAlert("login fail");
        }
    }
    // else if($_GET["ac"]==1){
    //     echo "signin";
    // }
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("'.$msg.'")</script>';
    }
?>