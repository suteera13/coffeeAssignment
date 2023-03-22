<script>
    function goto(url){
        window.location.href = url;
    }
</script>
<?php
    session_start();
    include_once 'class.php';
    $clCon = new control();

    if(isset($_GET["ac"])){
        if($_GET["ac"]==0){
            echo "<script>console.log('login')</script>";
            $user = $_POST['username'];
            $pass = $_POST['password'];
            
            if($user != "" && $pass != ""){
                $status = $clCon->checkUser($user,$pass);
                $arr = $status[0];
                $user_id;
                foreach ($arr as $key => $value) {
                    $user_id = $value;
                }
                echo $user_id ;
                if($user_id!=0){
                    $_SESSION['userses'] = ["id"=>$user_id,"user"=>$user,"pass"=>$pass];
                    echo "<script>goto('../view/Menu.php')</script>";
                }else{
                    echo "<script>alert('No data found.');goto('../view')</script>";
                }
            }else{
                echo "<script>alert('Please enter your user name and password.');goto('../view')</script>";
            }
        }
        elseif($_GET["ac"]==1){
            echo "<script>console.log('signup')</script>";
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $confirm = $_POST['confirm'];
            if($user != "" && $pass != "" && $confirm != ""){
                if($confirm != $pass){
                    echo "<script>alert('Failed to confirm password.')</script>";
                    echo "<script>goto('../view/Signup.html')</script>";
                }
                else{
                    $status = $clCon->addUser($user,$pass);
                    if($status==1){
                        echo "<script>goto('../view')</script>";
                    }else{
                        echo "<script>alert('No data found.');goto('../view/Signup.html')</script>";
                    }
                }
                
            }
            else{
                if ($user == "" && $pass == "") {
                    echo "<script>alert('Please enter your user name and password.')</script>";
                }
                else{
                    echo "<script>alert('Please confirm password.')</script>";
                }
                echo "<script>goto('../view/Signup.html')</script>";
            }
        }
        elseif($_GET["ac"]==2){
            echo "<script>console.log('buy order')</script>";
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            foreach ($_POST as $key => $value) {
                if($value != ""){
                    $clCon->buyOrder($_SESSION['userses']['id'],$key,$value);
                }
            }
            echo "<script>goto('../view/listorder.php')</script>";
        }
        elseif($_GET["ac"]==3){
            echo "<script>console.log('cancel order')</script>";
            print_r($_POST);
            echo $_POST['order_id'];
            if(isset($_POST['Edit'])){
                $clCon->editOrder($_POST['order_id'],$_POST['order_amount']);
            }
            if(isset($_POST['Cancel'])){
                $clCon->delOrder($_POST['order_id']);
            }
            echo "<script>goto('../view/listorder.php')</script>";
        }
    }
?>
