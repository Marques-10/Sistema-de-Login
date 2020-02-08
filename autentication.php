<?php 
    session_start();
    require("./class/Users.Class.php");
    
    $consult = new User();

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        $consult->confirmData($email, $password);
    } else {
        $consult->location();
    }


?>