<?php
    include_once 'connect.php';
    class control extends db{
        public $db;
        private $name;
        private $pass;
        public function checkUser($name,$pass){
            $sql = "SELECT user_id FROM user WHERE user_name = '{$name}' AND user_pass = '{$pass}'";
            return $this->db->query($sql)->fetchall(PDO::FETCH_ASSOC);
            // $stmt->bindParam(':username', $name , PDO::PARAM_STR);
            // $stmt->bindParam(':password', $pass , PDO::PARAM_STR);
            // if($stmt->rowCount() == 1){
                // return 1;
            // }
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
<<<<<<< HEAD
        public function buyOrder($user, $menu, $order){
            $sql = "INSERT INTO `order`(`user_id`, `menu_id`, `order_amount`) VALUES ()";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user', $user_id , PDO::PARAM_STR);
            $stmt->bindParam(':menu', $menu_id , PDO::PARAM_STR);
            $stmt->bindParam(':order', $order , PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount() == 1){
                return 1;
            }
=======
        public function showMenu(){
            $sql = "SELECT `menu_name`, `menu_price` FROM `menu`";
            $stmt = $this->db->query($sql);
            // return $stmt;
>>>>>>> d680555b6032f5b492ba10a54124d7260edc7931
        }
    }
?>