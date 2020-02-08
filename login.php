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
        <div class="conteudo">
            <form action="autentication.php" method="POST">
                <div class="title">
                    <h2>Acesse sua conta</h2>
                </div>

                <div class="email">
                    <div>
                        <label for="email">Email:</label> 
                        <input type="email" placeholder="exemplo@hotmail.com" name="email" id="email">
                    </div>
                </div>

                <div class="password">
                    <div>
                        <label for="password">Senha:</label>
                        <input type="password" placeholder="abc123" id="password" name="password">
                    </div>
                </div>

                <div class="access">
                    <button class="btn btn-register">Registrar</button>
                    <button class="btn btn-login">Entrar</button>
                </div>

                <div class="esqueci">
                    <a href="#">Esqueci minha senha</a>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">

        let register = document.querySelector(".btn-register");
        
        register.addEventListener("click", function(e) {
            e.preventDefault();
            window.location = "cadastro.php";
        });

    </script>
    
</body>
</html>