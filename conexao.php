<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'bd_formulario');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);



$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "bd_formulario";

//Criar a conexao
$conn2 = mysqli_connect($servidor, $usuario, $senha, $dbname);