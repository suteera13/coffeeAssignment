<?php
    class db{
        protected $db;
        public function __construct(){
            $this->connectdb();
        }
        private function connectdb(){
            define("user","root");
            define("pass","");
            define("config","mysql:host=localhost; dbname=coffeas; charset=utf8");
            try{
                $this->db = new PDO(config,user,pass);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOExection $e){
                echo $e->getMessage();
            }
        }
    }
?>