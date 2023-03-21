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
    session_unset();
    echo "<script>goto('../view')</script>";
?>