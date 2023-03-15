<?php
    include_once 'class.php';
    $ct = new control();
    $data = file_get_contents("php://input");
    $ct_data = json_decode($data, true);
    print_r($data);
?>