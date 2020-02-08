<?php

    class User {
        
        private $pdo;

        function __construct()
        {
            try { 
                $this->pdo = new PDO("mysql:dbname=sistema_login;host=localhost", "root", "");
            } catch(PDOException $e) {
                echo "ERROR: ".$e->getMessage();
                exit;
            }
        }

        public function existeEmail($email) {
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function createUser($email, $password) {
            
            $existe = $this->existeEmail($email);

            if ($existe == false) {
                $sql = "INSERT INTO usuarios (email, password) VALUES (:email, MD5(:password))";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':password', $password);
                $sql->execute();
            } else {
                echo "<script type='text/javascript'>alert('Email já cadastrado, faça login!')</script>";
                $this->location();
                exit;
            }
        }

        public function confirmData($email, $password) {
            $sql = "SELECT * FROM usuarios WHERE email = :email AND password = MD5(:password)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':password', $password);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $id = $sql['id'];
                $ip = $_SERVER['REMOTE_ADDR'];

                $_SESSION['logado'] = $id;

                $sql = "UPDATE usuarios SET ip = :ip WHERE id = :id";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":ip", $ip);
                $sql->bindValue(":id", $id);
                $sql->execute();

                header("Location: index.php");

                exit;

            } else {
                $this->location();
                return false;
            }
        }

        public function validatorEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public function location(){
            header("location: login.php");
        }

        public function locationRegister(){
            header("Location: cadastro.php");
        }

        public function logado($id) {
            $sql = "SELECT email FROM usuarios WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                $email = $sql['email'];
                return $email;
            } else {
                $this->location();
            }
        }

        public function validatorPassword($password) {
            $qtd = strlen($password);
            if ($qtd >= 6) {
                return true;
            } else {
                return false;
            }
        }

        public function checkIp($id, $ip){
            $sql = "SELECT * FROM usuarios WHERE id = :id AND ip = :ip";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":ip", $ip);
            $sql->execute();

            if($sql->rowCount() > 0) {
                return true;
            } else {
                $this->location();
            }
        }

    }