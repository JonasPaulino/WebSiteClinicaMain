<?php
session_start();
include_once './conexao.php';

    //Verifica se existe uma sessão aberta, caso não exista volte para tela de login e não permita acessar.
if ((!isset($_SESSION['id'])) and (!isset($_SESSION['nome']))) {
     $_SESSION['msg'] = "<p style = 'color:Orange'>Para acessar o gerenciador, realize login com suas credenciais!</p>";
     header("Location:login.php");
 };


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='assets/css/core/main.min.css' rel='stylesheet' />
    <link href='assets/css/daygrid/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/personalizado.css">
    <link rel="stylesheet" href="assets/css/estilo_main.css">


    <script src='assets/js/core/main.min.js'></script>
    <script src='assets/js/interaction/main.min.js'></script>
    <script src='assets/js/daygrid/main.min.js'></script>
    <script src='assets/js/core/locales/pt-br.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="assets/js/personalizado.js"></script>
</head>

<body>
    <!-- <header>
        <div class="container">
            <div class="logo">
                <a href="">
                    <img src="assets/img/logo.png" alt="Logo marca">
                </a>
            </div>
            
            <div class="menu">
                <nav>
                    <div class="menu_mobile">
                        <div class="mmlinha"></div>
                        <div class="mmlinha"></div>
                        <div class="mmlinha"></div>
                    </div>
                    <ul>
                        <li><a id="btlogin" href="sair.php">Sair do sistema</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header> -->
    <div style="just;display:flex;height:100px">

        <div style="flex:1;justify-content: center;align-items: center;display: flex;">
            <div style="font-size: 20px;margin: 10px;color:#0079c7">BEM VINDO AO DESHBOARD</div>
        </div>

        <div style="flex:1;justify-content: center;align-items: center;display: flex;">
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="index.php#agendamento">Agendar Consulta</a></li> 
                    <li><a href="contato.php">Contato</a></li>
                    <li><a id="btlogin" href="sair.php">Sair do sistema</a></li>
                </ul>
            </nav>
        </div>


    </div>

   <section>
    
        <div class="SectionContainer">
            <div class="containdercalendario" id='calendar-container'>
                <h1>Calendário com agendamentos</h1>
                <div id='calendar'></div>
                
                <?php
                if (isset($_SESSION['msg'])) {
                   
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }

                ?>
            </div>

            <div class="contatos">
                <h1>Contatos realizados no síte</h1>
                <div>
                  <?php 
                  if (isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                  } 
                    $result_qry_contato = "select * from contato";
                    $resultado_contato = mysqli_query($conn2,$result_qry_contato);
                    
                    while($row_contato = mysqli_fetch_assoc($resultado_contato)){
                        
                        $date=date_create($row_contato['data_cadastro']);
                        $date = date_format($date,"d/m/y");


                        echo "<b>Nome:</b> " . $row_contato['nome'] . "<br>";
                        echo "<b>Email:</b> " . $row_contato['email'] . "<br>";
                        echo "<b>Data do contato:</b> " . $date . "<br><br>";
                        echo "<b>Mensagem:</b>    " . $row_contato['mensagem'] . "<br><hr>";
            
                    }
                  ?>
                </div>
            </div>
        </div>
    </section>

    <!--Tela modal para visualizar dados no calendário -->
    <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="visevent">
                        <dl class="row">
                            <dt class="col-sm-3">ID do evento</dt>
                            <dd class="col-sm-9" id="id"></dd>

                            <dt class="col-sm-3">Título do evento</dt>
                            <dd class="col-sm-9" id="title"></dd>

                            <dt class="col-sm-3">Início do evento</dt>
                            <dd class="col-sm-9" id="start"></dd>

                            <dt class="col-sm-3">Fim do evento</dt>
                            <dd class="col-sm-9" id="end"></dd>
                        </dl>
                        <button class="btn btn-warning btn-canc-vis">Editar</button>
                        <a href="" id="apagar_evento" class="btn btn-danger">Apagar</a>
                    </div>
                    <div class="formedit">
                        <span id="msg-edit"></span>
                        <form id="editevent" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Título</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Selecione</option>
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                        <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                        <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                        <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Início do evento</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Final do evento</label>
                                <div class="col-sm-10">
                                    <input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                                    <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-warning">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Tela modal para cadastro dados no calendário -->
    <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="msg-cad"></span>
                    <form id="addevent" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-10">
                                <select name="color" class="form-control" id="color">
                                    <option value="">Selecione</option>
                                    <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                    <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                    <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                    <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                    <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                    <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                    <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                    <option style="color:#228B22;" value="#228B22">Verde</option>
                                    <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Início do evento</label>
                            <div class="col-sm-10">
                                <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Final do evento</label>
                            <div class="col-sm-10">
                                <input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="background:#1e1e1e;justify-content: center;align-items: center;display: flex;color:#fff;height:50px">
        <p>COPYRIGHT © 2021 JONAS PAULINO</p>
    </div>     
</body>

</html>