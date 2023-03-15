<?php
    include_once 'connect.php';
    class control extends db{
        public $db;
        private $name;
        private $pass;
        public function checkUser($name,$pass){
            $sql = "SELECT * FROM user WHERE user_name = :username AND user_pass = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $name , PDO::PARAM_STR);
            $stmt->bindParam(':password', $pass , PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount() == 1){
                return 1;
            }
        }
        public function addUser($name,$pass){
            $sql = "INSERT INTO `user`(`user_name`, `user_pass`) VALUES (:username, :password)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $name , PDO::PARAM_STR);
            $stmt->bindParam(':password', $pass , PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount() == 1){
                return 1;
            }
        }
    }
?>