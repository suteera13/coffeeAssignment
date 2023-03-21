<?php
    include_once 'connect.php';
    class control extends db{
        public $db;
        private $name;
        private $pass;
        public function checkUser($name,$pass){
            $sql = "SELECT user_id FROM user WHERE user_name = '{$name}' AND user_pass = '{$pass}'";
            return $this->db->query($sql)->fetchall(PDO::FETCH_ASSOC);
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
        public function buyOrder($user, $menu, $order){
            $sql = "INSERT INTO `order`(`user_id`, `menu_id`, `order_amount`) VALUES (:user, :menu, :order)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user', $user , PDO::PARAM_STR);
            $stmt->bindParam(':menu', $menu , PDO::PARAM_STR);
            $stmt->bindParam(':order', $order , PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount() == 1){
                return 1;
            }
        }
        public function delOrder($id){
            $sql = "DELETE FROM `order` WHERE `order_id`= $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        }
        public function showMenu(){
            $sql = "SELECT * FROM menu";
            return $this->db->query($sql)->fetchall(PDO::FETCH_ASSOC);
        }
        public function checkPrice($id){
            $sql = "SELECT menu_name, menu_price FROM menu WHERE menu_id = {$id}";
            return $this->db->query($sql)->fetchall(PDO::FETCH_ASSOC);
        }
        public function showlistOrder(){
            $sql = "SELECT * FROM `order`,`menu`";
            return $this->db->query($sql)->fetchall(PDO::FETCH_ASSOC);
        }
    }
?>