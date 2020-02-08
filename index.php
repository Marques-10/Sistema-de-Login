<?php 
    
    session_start();
    
    require("./class/Users.Class.php");
    
    $consult = new User();

    if(empty($_SESSION['logado'])) {
        header("Location: login.php");
        exit;
    } else {
        $id = $_SESSION['logado'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $consult->checkIp($id, $ip);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página de Login</title>
    <link rel="stylesheet" href="assets/css/style.css"></link>
</head>
<body>

    <div class="container">
        <div class="conteudo-index">
            <h1>Ae! Você está logado.</h1> 
            <div class="left">
                <?php 
                    $email = $consult->logado($id);
                    echo "<h3>".$email."</h3>";
                ?>
                <button class="btn btn-danger">Sair</button>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">

        let left = document.querySelector('.btn-danger');

        left.addEventListener('click', (e) => {
            <?php
                $_SESSION['logado'] = '';
            ?>
            window.location = "login.php";
        });

    </script>
</body>
</html>