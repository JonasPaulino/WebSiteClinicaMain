<?php
session_start();

//declaração de uma outra página, assim podemos usar tudo que estiver nela aqui nessa página
include_once("conexao.php");

//pega as informações do formulário index
$nome =  filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$email =  filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$mensagem =  filter_input(INPUT_POST,'mensagem',FILTER_SANITIZE_STRING);

//preenche a query para dar o insert no banco
$qry_insert_contato = "insert into contato (nome,email,mensagem,data_cadastro) values ('$nome','$email','$mensagem',NOW())";

//executa query e grava retorno na variavel
$resultado_insert = $conn2->prepare($qry_insert_contato);

//verifica se o insert foi bem sucedido.
if ($resultado_insert->execute()) {
   $_SESSION['mensagem_retorno'] = "<p style='color:green;'>Mensagem enviada com sucesso!</p>";
    //esse comando faz retornar para página inicial.
    header("Location: contato.php");
}else{
    $_SESSION['mensagem_retorno'] = "<p style='color:red;'>Não foi possível enviar sua mensage, tente novamente mais tarde!</p>";
    header("Location: contato.php");
}