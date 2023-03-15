<?php
    include_once 'connect.php';
    class control extends db{
        public function checkUser($name,$pass){
            $sql = "SELECT * FROM user WHERE user_name = {$name} 
                and user_pass = {$pass}";
            $check = $this->db->query($sql)->fetchall(PDO::FETCH_ASSOC);
            return $check;
        }
    }
?>