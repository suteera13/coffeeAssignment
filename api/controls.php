<script>
    function goto(){
        setInterval(() => {
            window.location.href = "../view/Menu.php";
        }, 1000);
    }
</script>
<?php
    session_start();
    include_once 'class.php';
    $clCon = new control();

    print_r($_POST);
    if($_GET["ac"]==0){
        echo "login\n";
        // echo "<script>goto()</script>";
        // // $user = $arr["user_name"];
        // // $pass = $arr["user_pass"];
        // echo "user: ".$user."\npass: ".$pass."\n";
        // $status = $clCon->checkUser($user,$pass);
        // if($status==1){
        //     $_SESSION['userses'] = ["user"=>$user,"pass"=>$pass];
        // }else{
        // }
    }
    // else if($_GET["ac"]==1){
    //     echo "signin\n";
    //     $user = $arr["user_name"];
    //     $pass = $arr["user_pass"];
    //     echo "user: ".$user." pass: ".$pass;
    //     $status = $clCon->addUser($user,$pass);
    //     if($status==1){
            
    //     }else{
    //     }
    // }
?>
