<?php
    
    session_start();

    require('./class/Users.Class.php');
    $consult = new User();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $newPassword = $_POST['ConfPassword'];

    $emailValido = $consult->validatorEmail($email);

    $passwordValida = $consult->validatorPassword($password);

    if (isset($email) && !empty($email) && $emailValido &&
        isset($password) && !empty($password) && $passwordValida &&
        isset($newPassword) && !empty($password)) 
    {
        if ($password == $newPassword) {
            $consult->createUser($email, $password, $newPassword);
            echo "<script type='text/javascript'>alert('Usuário cadastrado com sucesso, faça seu login!')</script>";
            $consult->location();
        } else {
            echo "<script type='text/javascript'>alert('As senhas digitadas são diferentes!')</script>";
            $consult->locationRegister();
            exit;
        }
    } else {
        echo "<script type='text/javascript'>alert('Preencha todos os campos corretamente!')</script>";
        $consult->locationRegister();
        exit;
    }



?>