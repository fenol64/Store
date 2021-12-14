<?php

function getConnection(){
    $host = 'mysql:host=localhost;dbname=store';
    $user = 'root';
    $pass = '!sec@1234';

    try {
        $pdo = new PDO($host, $user, $pass);
        return $pdo;
    } catch (PDOExeption $th) {
        echo "erro:". $th->getMessage();
    }
}

?>