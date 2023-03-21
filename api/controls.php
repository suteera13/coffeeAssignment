<script>
    function goto(url){
        window.location.href = url;
    }
</script>
<?php
    session_start();
    include_once 'class.php';
    $clCon = new control();

    print_r($_POST);
    if($_GET["ac"]==0){
        echo "<script>console.log('login')</script>";
        $user = $_POST['username'];
        $pass = $_POST['password'];
        
        if($user != "" && $pass != ""){
            $status = $clCon->checkUser($user,$pass);
            if($status==1){
                $_SESSION['userses'] = ["user"=>$user,"pass"=>$pass];
                echo "<script>goto('../view/Menu.php')</script>";
            }else{
                echo "<script>alert('No data found.');goto('../view')</script>";
            }
        }else{
            echo "<script>alert('Please enter your user name and password.');goto('../view')</script>";
        }
    }
    else if($_GET["ac"]==1){
        echo "<script>console.log('sigup')</script>";
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $confirm = $_POST['confirm'];
        if($user != "" && $pass != "" && $confirm != ""){
            $status = $clCon->addUser($user,$pass);
            if($status==1){
                echo "<script>goto('../view')</script>";
            }else{
                echo "<script>alert('No data found.');goto('../view/Signup.html')</script>";
            }
        }
        else{
            if ($user == "" && $pass == "") {
                echo "<script>alert('Please enter your user name and password.')</script>";
            }else{
                echo "<script>alert('Please confirm password.')</script>";
            }
            echo "<script>goto('../view/Signup.html')</script>";
        }
    }
    
?>
