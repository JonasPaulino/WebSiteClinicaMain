<?php
session_start();
ob_start();
include_once './conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Plus</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/animamenu.js"></script>
    <script type="text/javascript" src="assets/js/personalizado.js"></script>
</head>
<body>
    <header class="herder_top">
        <div class="container">
            <div class="logo">
                <a href="">
                    <img  src="assets/img/logo.png" alt="Logo marca">
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
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="#agendamento">Agendar Consulta</a></li> 
                        <li><a href="contato.php">Contato</a></li>
                        <li><a id="btlogin" href="login.php">Acessar sistema</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    
    <section id="banner">
        <div class="container column">
            <div class="textobanner">
                <h1>Sua clínica pediatrica em Caruaru</h1>
                <h2>Atendendo sua criança com carinho e amor.</h2>
            </div>
            <div class="opcoesbanner">
                <div class="opcoes1">
                   <div class="opcoestitulo">Emergencia médicas</div>
                   <div class="opcoestitulodetalhe">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with</div>
                    <a href="">Continuar lendo</a>
                </div>
                <div class="opcoes2">
                    <div class="opcoestitulo">Doutores disponíveis</div>
                    <div class="opcoestitulodetalhe">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with</div>
                    <a href="">Continuar lendo</a>
                </div>
                <div class="opcoes3">
                    <div class="opcoestitulo">Horários de funcionamento</div>
                    <div class="opcoestitulodetalhe">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with</div>
                    <a href="">Continuar lendo</a>
                </div>
            </div>
        </div>
    </section>
    <section id="geral">
        <div class="container">
           <section>
            <div class="widget">
                <div class="widget_titulo">
                    <div class="widget_titulo_text">Notícias</div>
                    <div class="widget_titulo_bar"></div>
                </div>
                <div class="widget_body flex">


                    <article>
                        <a href="">
                            <div class="noticia_data">
                                <div class="noticia_poster_at">12 DEC 12</div>
                                <div class="noticia_comentario">2</div>
                            </div>
                            <div class="noticia_imagem">
                                <img src="assets/img/noticia1.png" alt="Imagem de noticia">
                            </div>
                            <div class="noticia_titulo">
                                Lorem ipsom dolor sit amat valum
                            </div>
                            <div class="noticia_resumo">
                                Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. 
                            </div>
                        </a>
                    </article>

                    <article>
                        <a href="">
                            <div class="noticia_data">
                                <div class="noticia_poster_at">12 DEC 12</div>
                                <div class="noticia_comentario">2</div>
                            </div>
                            <div class="noticia_imagem">
                                <img src="assets/img/pediatra2.jpg" alt="Imagem de noticia">
                            </div>
                            <div class="noticia_titulo">
                                Lorem ipsom dolor sit amat valum
                            </div>
                            <div class="noticia_resumo">
                                Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. 
                            </div>
                        </a>
                    </article>

                    <article>
                        <a href="">
                            <div class="noticia_data">
                                <div class="noticia_poster_at">12 DEC 12</div>
                                <div class="noticia_comentario">2</div>
                            </div>
                            <div class="noticia_imagem">
                                <img src="assets/img/pediatra3.jpg" alt="Imagem de noticia">
                            </div>
                            <div class="noticia_titulo">
                                Lorem ipsom dolor sit amat valum
                            </div>
                            <div class="noticia_resumo">
                                Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. 
                            </div>
                        </a>
                    </article>
                </div>
            </div>

            <div id="agendamento" class="widget2">
                <div class="widget_titulo">
                    <div class="widget_titulo_text">Realize o agendamento de sua consulta</div>
                    <div class="widget_titulo_bar"></div> <br>
                </div>
                <div class="widget_body">
                    <div class="formedit">
                        <h3>Vamos agendar?</h3>
                        <h7>Preenha os campos com suas informações.</h7><br> <br>
                    
                        <span id="msg-edit"></span>
                        <form class="alinha" method="POST" action="cad_event_index.php">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nome Paciente</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Título do evento">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Médico pediatra</label>
                                <div class="col-sm-10">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Selecione</option>
                                        <option style="color:#FF4500;" value="Jonas Paulino">Jonas Paulino</option>
                                        <option style="color:#0071c5;" value="Gabriel Lima">Gabriel Lima</option>
                                        <option style="color:#A020F0;" value="Maria Heloisa">Maria Heloísa</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="cor" name="cor" value="#FF4500">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Data do agendamento</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" name="salvaragendamento" id="CadEvent" value="CadEvent" class="btn btn-warning">Agendar consulta</button>
                                </div>
                            </div>
                        </form>
                        
                        <?php
                            if(isset($_SESSION['mensagem_retorno'])){ //verifica se a variável global existe
                                echo $_SESSION['mensagem_retorno'];
                                unset($_SESSION['mensagem_retorno']);//destroi a variável     
                        }
                        ?>
                    </div>

                    <div class="rodapeagendamento">
                        <h3>Meus dados estão seguros?</h3>
                        <a href="http://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm">Lei Geral de Proteção de Dados Pessoais (LGPD).</a>
                        <p>
                            Art. 1º Esta Lei dispõe sobre o tratamento de dados pessoais, inclusive nos meios digitais, por pessoa natural ou por pessoa jurídica de direito público ou privado, com o objetivo de proteger os direitos fundamentais de liberdade e de privacidade e o livre desenvolvimento da personalidade da pessoa natural.                        </p>
                        <div>
                         <p>Leia nossa  <a href="politica_privacidade.php">Política de Privacidade</a> e <a href="termo_uso.php">Termo de Uso</a></p>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
           </section>
        </div>
    </section>
    <footer>
        <div class="container MudarParaColuna">
            <div class="footer_barra">
                <div class="fm_1">
                   <a href="">
                        <h2>Atendimento</h2>
                        <h6>Hre in medicenter we have</h6>
                    </a> 
                </div>
                <div class="fm_2">
                    <a href="">
                        <h2>Plantão</h2>
                        <h6>Hre in medicenter we have</h6>
                    </a>  
                </div>
                <div class="fm_3">
                    <a href="">
                        <h2>Emergência</h2>
                        <h6>Hre in medicenter we have</h6>
                    </a> 
                </div>
            </div>
            <div class="footer_textos">
                <div class="area_texto">
                    <div class="widget">
                        <div class="widget_titulo">
                            <div class="widget_titulo_text">Campo de rodapé</div>
                            <div class="widget_titulo_bar"></div>
                        </div>
                        <div class="widget_body MudarParaColuna">
                            <div class="texto1">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos</div>
                            <div class="areatexto2">
                                <div class="texto2">
                                    Pediatra caruaru <br>
                                    33 Fariane Street <br>
                                    Keilor East <br>
                                    VIC 3033, Australia
                                </div>
                                <div class="texto3">
                                    +123 655 655 <br>
                                    +123 765 765 <br>
                                    <b>clinicamedica@mail.com.br</b>
                                </div>
                            </div>
                            <div>
                                <img src="assets/img/facebook.png" alt="Icone facebook" srcset="">
                                <img src="assets/img/linkedin.png" alt="Icone facebook" srcset="">
                                <img src="assets/img/youtube.png" alt="Icone facebook" srcset="">
                                <img src="assets/img/instagram.png" alt="Icone facebook" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="area_texto">
                    <div class="widget">
                        <div class="widget_titulo">
                            <div class="widget_titulo_text">Todos os poster</div>
                            <div class="widget_titulo_bar"></div>
                        </div>
                        <div class="widget_body ">
                            <div class="containerposter">
                                <div class="poster">
                                    <div class="seta">
                                        <img src="assets/img/seta.png" alt="" srcset="">
                                    </div>
                                    <div class="seta_texto">
                                        <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos</p>
                                        <a href="">@Ano mês</a> 
                                    </div>
                                </div>    
                                <div class="poster">
                                    <div class="seta">
                                        <img src="assets/img/seta.png" alt="" srcset="">
                                    </div>
                                    <div class="seta_texto">
                                        <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos</p>
                                        <a href="">@Ano mês</a> 
                                    </div>
                                </div>
                                <div class="poster">
                                    <div class="seta">
                                        <img src="assets/img/seta.png" alt="" srcset="">
                                    </div>
                                    <div class="seta_texto">
                                        <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos</p>
                                        <a href="">@Ano mês</a> 
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="area_texto">
                    <div class="widget">
                        <div class="widget_titulo">
                            <div class="widget_titulo_text">Campo de rodapé</div>
                            <div class="widget_titulo_bar"></div>
                        </div>
                        <div class="widget_body">
                            ...
                        </div>
                    </div>
                </div>
            </div>
            <div class="rodapediretos">
                <h6>COPYRIGHT © 2021 JONAS PAULINO</h6>
            </div>        
        </div>
    </footer>
</body>
</html>