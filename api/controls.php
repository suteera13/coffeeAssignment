<?php
    session_start();
    include_once 'class.php';
    $clCon = new control();
    $data = file_get_contents("php://input");
    $arr = json_decode($data, true);
    print_r($arr);
    if($_GET["ac"]==0){
        $user = $arr["user_name"];
        $pass = $arr["user_pass"];
        $status = $clCon->checkUser($user,$pass);
        if($status==1){
            echo json_encode(["status"=>"ok", "message"=>"welcome to coffee site"]);
            $_SESSION['userses'] = ["user"=>$user,"pass"=>$pass];
        }else{
            echo json_encode(["status"=>"error", "message"=>"login fail"]);
        }
    }
    // else if($_GET["ac"]==1){
    //     echo "signin";
    // }
?>