<?php
session_start();

include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
echo var_dump($dados);
//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data_start = str_replace('/', '-', $dados['start']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$Date1 = $data_start_conv;
$data_end_conv = date('Y-m-d', strtotime($Date1. ' + 1 days'));

$titbleunificado = 'Consulta: '.$dados['title'].' Medico: '.$dados['color'];

$query_event = "INSERT INTO agendamentos (title, color, start, end) VALUES (:title, :color, :start, :end)";

$insert_event = $conn->prepare($query_event);
$insert_event->bindParam(':title', $titbleunificado);
$insert_event->bindParam(':color', $dados['cor']);
$insert_event->bindParam(':start', $data_start_conv);
$insert_event->bindParam(':end', $data_end_conv);


//verifica se o insert foi bem sucedido.
 if ($insert_event->execute()) {
    $_SESSION['mensagem_retorno'] = "<p style='color:green;'>Agendamento realizado sucesso!</p>";
     //esse comando faz retornar para página inicial.
     header("Location: index.php#agendamento"); 
 }else{
     $_SESSION['mensagem_retorno'] = "<p style='color:red;'>Não foi possível agendar, tente novamente mais tarde!</p>";
     header("Location: index.php#agendamento");
 }