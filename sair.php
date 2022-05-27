<?php
session_start();
unset( $_SESSION['id'], $_SESSION['nome']);


$_SESSION['msg'] = "<p style = 'color:green'>Usuário descontectado com sucesso!</p>";
header("Location:login.php");