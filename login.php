<?php

include('config.php');

if(isset($_POST['email']) || isset($_POST['senha'])){

  if(strlen($_POST['email'])== 0){
    echo "Prencha seu email";
  } else if (strlen($_POST['senha'])== 0) {
    echo "Preencha sua senha";
  } else {
    
    if(isset($_POST['email'])){
      
      $email = $conexao ->real_escape_string($_POST['email']);
      $senha = $conexao ->real_escape_string($_POST['senha']);

      $sql_code = "SELECT * FROM usuarios WHERE email = '$email'LIMIT 1";
      $sql_query = $conexao->query($sql_code) or die ("Falha na conexão do código SQL: " .$conexao->error);

      $quantidade = $sql_query->num_rows;

      if($quantidade == 1){
 
        $usuario = $sql_query->fetch_assoc();
        if(password_verify($senha,$usuario['senha'])){

          if(!isset($SESSION)) {
            session_start();
          }
          $_SESSION['email'] = $usuario['email'];
          $_SESSION['senha'] = $ususario['senha'];
  
          header("Location: mapa.php");
        }
        else{
         echo "Falha ao Logar!";
        }
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700, 800&display=swap">
    <link rel="stylesheet" href="./resposivdade.css">
    <title>
        Urban Club
    </title>
</head>
<body>
    <header>
        <div class="btn-login">
            
            <button class="logotipo">
            <a href="index.html">
            <img style=" width: 53px; height: 53px;" src="./img/image 10.png" alt="logo" class="logo">
            </a>
        </button>
            <button class="seta">
               <a href="index.html">
                <img style="background-position: center; background-repeat: repeat; width: 25px ;" src="./img/seta.png">
               </a>
            </button>
        </div>
            <hr>

        <main id="container">
            <form  class="login_form" action="" method="post" name="login">
               
            <div class="imagens">
                <img  src="./img/facebook.png" height="60px" >
                <img src="./img/Linha.png " height="130px">
                <img src="./img/google.png" height="60px">
            </div>

    <div id="inputs">
        
        <div class="input-box">
            <label for="Email">Email</label>
                <div class="input-field">
                   <input type="email" name="email"  placeholder="Exemplo@gmail.com" required>
                   <br><br>
                </div>
        </div>
        <div class="input-box">
            <label for="Senha">Senha</label>
                <div class="input-field">
                   <input type="password" name="senha" required>
                   <br><br>
                   </div>
                </div>
                <div class="input-check">
                    <input type = "checkbox">
                    <label> Lembrar de Mim </label>
                </div>
        </div>
    
    </div>
    
    <button class="botao-login" type="submit" name="submit" onclick="logar(); return false"> 
        Login
    </button>
        <a href="confirma-email.html"class="forgot"> Esqueceu sua senha? </a>
    <button class="botao-cadastrar" class="button" onclick="window.location.href='cadastro.php'"> 
        Cadastrar
    </button>
    
    </form>  
 </main>

    </header>
    
    <main id="content-primary">
    </main>
    <footer>
        <div class="base">
        <div class="esqurda">
          <button class="pe">
            <div class="ub">
              <a href="index.html">
          <img src="./img/Urban.png" height="60px"class="pe1">
          
              </a> 
            </div>
    
        </button>
  
    <div class="insta">
      <img src="./img/insta.png" onclick="window.location.href='https://www.instagram.com/UrbanClubSantos/';" style="cursor: pointer;"> 
        <p ><a href="https://www.instagram.com/UrbanClubSantos/" >Instagram</a></p> 
     </div>
  
  
    <div class="rede">
      <img src="./img/DISCOED.png" onclick="window.location.href='https://twitter.com/UrbanClub_ofc?t=Fht9QqwDdwFeynMv1H5Nhw&s=08';"  style="cursor: pointer;">
        <p ><a href="https://twitter.com/UrbanClub_ofc?t=Fht9QqwDdwFeynMv1H5Nhw&s=08" >Discord</a></p> 
    </div>

  </div>
  <div class="direita">
   
    <h1>Desenvolvedores</h1>
    <p>Andrey Vanolli</p>
    <p>Felipe Amaral</p>
    <p>Gabriel Cosme</p>
    <p>Gabriel Recco</p>
    <p class="jm">João Macedo</p>
    <h1>Contato da empresa </h1>
    <p>urbanclub07@gmail.com</p>
    
  </div>

  <div class="meio">
    <div class="artista">
        <div class="art">
         <img src="./img/artista.png"> <br>
          <p >Patricio Diniz</p>
        </div>
      </div>
    <div class="insta2">
      
      <img src="./img/insta.png" onclick="window.location.href='https://www.instagram.com/patricio.ilustra/';"  style="cursor: pointer;"> 
        <p ><a href="https://www.instagram.com/patricio.ilustra/">patricio.ilustra</a></p> 
    </div>
    <div class="insta2">
      <img  src="./img/Behance.png" onclick="window.location.href='https://www.behance.net/PatricioDiniz';" style="cursor: pointer;"> 
        <p ><a href="https://www.behance.net/PatricioDiniz">Patricio Diniz  </a></p> 
    </div>

  </div>
  <div class="canto">
    <h1>Legal</h1>
    <p>Politica de privacidade</p>
    <p>Termos de uso</p>  
    <p class="rules">2023 direitos reservados</p></div>
  </div>
  </footer>
</body>
</html>