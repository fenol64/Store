<?php

$host = 'mysql:host=localhost;dbname=store';
$user = 'root';
$pass = '';

try {
    $con = new PDO($host, $user, $pass);
} catch (PDOExeption $th) {
    echo "erro:". $th->getMessage();
}

?>