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
            <form action="autenticationRegister.php" method="POST">
                <div class="title">
                    <h2>Faça o seu cadastro!</h2>
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
                        <input type="password" placeholder="abc123  |  Min: 6 caracteres" id="password" name="password">
                    </div>
                </div>
                
                <div class="password">
                    <div>
                        <label for="ConfPassword">Confirme a senha:</label>
                        <input type="password" placeholder="abc123  |  Min: 6 caracteres" id="ConfPassword" name="ConfPassword">
                    </div>
                </div>

                <div class="access">
                    <button class="btn btn-return">Retornar</button>
                    <button class="btn btn-login">Confirmar</button>
                </div>

            </form>
        </div>
    </div>
    
    <script type="text/javascript">
    
        let retornar = document.querySelector(".btn-return");

        retornar.addEventListener("click", (e) => {
            e.preventDefault();
            window.location = "login.php";
        });
    </script>
</body>
</html>