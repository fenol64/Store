<?php
    session_start();
?>
<!DOCTYPE html><html lang="pt-br"><head><title>Império das pizzas | login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <form class="form-signin" method="POST" action="receiveLoginData.php">
        <div class="text-center">
            <img class="mb-4 mx-auto" src="img/logo.png " alt="" width="150">
        </div>
        <h1 class="h3 mb-3 font-weight-normal text-center">Faça o login</h1>
        <label for="inputEmail" class="sr-only">Endereço de E-mail</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Endereço de E-mail" autocomplete="off" name="email" autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" autocomplete="off" name="senha"><p>
        <p class="text-center text-danger">
            <?php
                if(isset($_SESSION['loginErro'])){
                    echo $_SESSION['loginErro'];
                    unset($_SESSION['loginErro']);
                }
            ?>
        </p>
        <p class="text-center text-success">
            <?php 
            //Recuperando o valor da variável global, deslogado com sucesso.
            if(isset($_SESSION['logindeslogado'])){
                echo $_SESSION['logindeslogado'];
                unset($_SESSION['logindeslogado']);
            }
            ?>
        </p>
        <button class="btn btn-lg btn-dark btn-block mb-5" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
</body>
</html>