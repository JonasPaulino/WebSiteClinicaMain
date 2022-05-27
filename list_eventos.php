<?php
include 'conexao.php';

$query_events = "SELECT id, title, color, start, end FROM agendamentos";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];
    
    $eventos[] = [
        'id' => $id, 
        'title' => $title, 
        'color' => $color, 
        'start' => $start, 
        'end' => $end, 
        ];
}

echo json_encode($eventos);