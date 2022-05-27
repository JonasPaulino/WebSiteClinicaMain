<?php
    session_start(); //abre a sessão do php para poder usar a variável global nessa pagina
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="assets/css/contato.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
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
                        <li><a href="index.php">Agendar Consulta</a></li>
                        <li><a href="contato.php">Contato</a></li>
                        <li><a id="btlogin" href="login.php">Acessar sistema</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section id="bannerContato">
    <div class="container">
            <div class="textobannerContato">
                <h1>Clínica Plus</h1>
                <h2>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. </h2>
            </div>
        </div>
        <form class="FormLogin" method="POST" action="processa.php">
            <div class="card">
               <div class="card-top">
                    <img class="imglogin" src="assets/img/doctor.png" alt="80px" >
                    <h2 class="titulo">Formulário de Contato</h2> 
                    <p>Sua mensagem é muito importante para nós.</p> 
                </div>

                <div class="card-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" placeholder="Digite seu nome completo" required>
                </div>
                
                <div class="card-group">
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Digite seu email" required>
                </div>

                <div class="card-group">
                    <label>Mensagem:</label>
                    <textarea name="mensagem" placeholder="Deixe seu comentário." required> </textarea>
                </div>

                <?php
                    if(isset($_SESSION['mensagem_retorno'])){ //verifica se a variável global existe
                      echo $_SESSION['mensagem_retorno'];
                      unset($_SESSION['mensagem_retorno']);//destroi a variável     
                    }
                ?>
                
                <div class="card-group">
                    <input id="Btn" type="submit" value="ENVIAR" name="SendLogin">
                </div>
                
                <div style="font-size:9px;text-align:center">
                    <a style="text-decoration:none" href="http://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm">Lei Geral de Proteção de Dados (LGPD).</a>
                    <p>Leia nossa  <a style="text-decoration:none" href="politica_privacidade.php">Política de Privacidade</a> e <a style="text-decoration:none" href="termo_uso.php">Termo de Uso</a></p>
                </div>
            </div>

        </form>
    </section>
    <footer>
        <div class="container MudarParaColuna">
            <div class="footer_textos">
                <div class="area_texto">
                    <div class="widget">
                        <div class="widget_titulo">
                            <div class="widget_titulo_text">Marque uma consulta</div>
                            <div class="widget_titulo_bar"></div>
                        </div>
                        <div class="widget_body MudarParaColuna">
                            <div class="texto1">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos</div>
                            <div class="areatexto2">
                                <div class="texto2">
                                   Central pedriatrica <br>
                                    33 Avenia Sem Destino <br>
                                    Lugar nenhum <br>
                                    VIC 3033, Brasil
                                </div>
                                <div class="texto3">
                                    +123 655 655 <br>
                                    +123 765 765 <br>
                                    <b>centralpedriatrica@mail.com.br</b>
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
                            <div class="widget_titulo_text">Últimas postagens</div>
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
                
            </div>
            <div class="rodapediretos">
                <h6>COPYRIGHT © 2021 JONAS PAULINO</h6>
            </div>        
        </div>
    </footer>
</body>
</html>

