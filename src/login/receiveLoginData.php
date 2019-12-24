<?php
    session_start(); 
    //Incluindo a conexão com banco de dados   
    include_once("../includes/conection.php");    
    $con = getConnection();
    
    //O campo usuário e senha preenchido entra no if para validar
    if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];
        $usuario = $_POST['email'];
        $_SESSION['usuario'] = $usuario;
        $senha =  $_POST['senha'];
        $senha = md5($senha);

        $sql = "SELECT * FROM users WHERE email = '$usuario' AND senha = '$senha'";
        $sth = $con->prepare($sql);
        $sth->execute();
        $resultado = $sth->fetchAll();

        if(count($resultado) != 0){
            $_SESSION['condicao'] = $resultado['condicao'];
            header("Location: ../index/index.php");
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
        }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: ./login.php");
        }
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        header("Location: ./login.php");
    }
?>