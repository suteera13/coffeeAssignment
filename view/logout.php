<script>
    alert('logout?');
    function logout(){
        alert('logout?');
    }
    function goto(url){
        window.location.href = url;
    }
</script>
<?php
    session_start();
    $_SESSION[] = [];
    echo "<script>goto('../view')</script>";
?>