<?php
    session_start();
    include_once './conexao.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
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
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section id="banner">
        <form class="FormLogin" method="POST" action="">
            <div class="card">
               <div class="card-top">
                    <img class="imglogin" src="assets/img/doctor.png" alt="80px" >
                    <h2 class="titulo">Gestor Clínica</h2> 
                    <p>Informe suas credenciais para entrar no sistema</p> 
                </div>

                <div class="card-group">
                    <label>Email</label>
                    <input type="text" name="login" placeholder="Digite seu email" required>
                </div>

                <div class="card-group">
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Digite seu senha" required>
                </div>
                
              <?php              
                //Pega os dados nos inputs da tela e preenche um array
                $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);                
                
                if(!empty($dados['SendLogin'])){//so vai entrar se for clicado no botão envair SendLogin
                    //Esse var_dump está gravando as informações que estão contidas no formulário nos inputs
                   // var_dump($dados);  //foi comentado pq não tem necessidade de mostrar na tela                   
                    //select para verificar se existe o usuário digitado no banco de dados
                    $qry_usuario = "SELECT id,
                                            nome,
                                            senha,
                                            email,
                                            login
                                    FROM usuario 
                                    WHERE login= :p_login
                                    LIMIT 1";

                    //prepara query para ser executada
                    $result_usuario= $conn->prepare($qry_usuario);
                    //envia paramentros para a query executar
                    $result_usuario->bindParam(':p_login',$dados['login'],PDO::PARAM_STR);                    
                    //executa a query
                    $result_usuario->execute();

                    //valida se encontou o usuário e se a quantidade é maior que zero
                    if(($result_usuario) and ($result_usuario->RowCount() !=0 ) ){
                        $row_usuario = $result_usuario ->fetch(PDO::FETCH_ASSOC);
                    // var_dump($row_usuario); //foi comentado para não mostrar na tela                        
                    
                    //var_dump($dados['login']);
                    //var_dump($dados['senha'],$row_usuario['senha']);
                    //var_dump(password_hash(123,PASSWORD_DEFAULT));
                    //if valida a senha criptografada
                        if(password_verify($dados['senha'],$row_usuario['senha'])){
                            $_SESSION['msg'] = "<p style = 'color:green'>Usuário logado!</p>";
                            $_SESSION['id'] = $row_usuario['id'];
                            $_SESSION['nome'] = $row_usuario['nome'];
                            header("Location:Main.php");
                        }else{
                            $_SESSION['msg'] = "<p style = 'color:red'>Usuário ou senha errados!</p>";
                        }
                        
                    }else{
                        //declara uma variável global para a sessão e imprimir uma mensagem caso não encontre nada no banco
                        $_SESSION['msg'] = "<p style = 'color:red'>Usuário ou senha inválidas!</p>";
                    };
                };

                //se a variavel global existir então imprima a mensagem contida nela
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);//isso destroi a variavel para não imprimir novamente
                };
              ?>
            
                <div class="card-group">
                    <input id="Btn" type="submit" value="ACESSAR" name="SendLogin">
                </div>
            </div>
        </form>
        <div class="container">
            <div class="textobanner">
                <h1>Olá bem vindo!</h1>
                <h2>Gerencie sua clínica acessando ao sistema.</h2>
            </div>
        </div>
    </section>
    <footer>
        <div class="container MudarParaColuna">
            <div class="footer_barra">
                <div class="fm_1">
                   <a href="">
                        <h2>Health Insurace</h2>
                        <h6>Hre in medicenter we have</h6>
                    </a> 
                </div>
                <div class="fm_2">
                    <a href="">
                        <h2>Health Insurace</h2>
                        <h6>Hre in medicenter we have</h6>
                    </a>  
                </div>
                <div class="fm_3">
                    <a href="">
                        <h2>Health Insurace</h2>
                        <h6>Hre in medicenter we have</h6>
                    </a> 
                </div>
            </div>
            <div class="footer_textos">
                <div class="area_texto">
                    <div class="widget">
                        <div class="widget_titulo">
                            <div class="widget_titulo_text">Make An Appointment</div>
                            <div class="widget_titulo_bar"></div>
                        </div>
                        <div class="widget_body MudarParaColuna">
                            <div class="texto1">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos</div>
                            <div class="areatexto2">
                                <div class="texto2">
                                    Medicenter Clinic <br>
                                    33 Fariane Street <br>
                                    Keilor East <br>
                                    VIC 3033, Australia
                                </div>
                                <div class="texto3">
                                    +123 655 655 <br>
                                    +123 765 765 <br>
                                    <b>medicenter@mail.com.br</b>
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
                            <div class="widget_titulo_text">Latest Posts</div>
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
                            <div class="widget_titulo_text">Make An Appointment</div>
                            <div class="widget_titulo_bar"></div>
                        </div>
                        <div class="widget_body">
                            ...
                        </div>
                    </div>
                </div>
            </div>
            <div class="rodapediretos">
                <h6>COPYRIGHT © 2021 JONAS PAULINO </h6>
            </div>        
        </div>
    </footer>
</body>
</html>