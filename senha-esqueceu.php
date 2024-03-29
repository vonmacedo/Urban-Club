
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-senha-esqueceu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700, 800&display=swap">
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

            <button class="seta">
               <a href="confirma-email.html">
                <img style="background-position: center; background-repeat: repeat; width: 25px ;" src="./img/seta.png">
               </a>
            </button>
        </div>
            <hr>
<?php
  include("config.php");
$erro = array();

if(isset($_POST['OK'])){

  $email = $conexao->escape_string($_POST['email']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
$erro[] = "E-mail inválido";


}


if(count($erro) == 0){




  $novasenha = substr(md5(time()), 0, 6);
$nscriptografada = md5(md5($novasenha));


if(mail($email, "Sua nova senha", "Sua nova senha:", $novasenha)){

$sql_code = "UPDATE  cadastro SET senha = '$nscriptografada' WHERE email = '$email'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
}

}
}

  ?>
        <main id="container">
            <form class="nova-senha_form" action="" method="POST" name="nova-senha">
    <div id="inputs">
      
        <div class="input-box-senha">
            <label for="email">E-mail</label>
                <div class="input-field">
                   <input type="text" name="email" placeholder="Digite seu email">
                   <br><br>
                </div>
        </div>
     
                 
        </div>

    </div>
<button class="btn-login"> ENVIAR
    <input type="submit"   name="OK" value="OK">
    </button>
    </form> 
 </main>

    </header>
    
    <main id="content-primary">
    </main>
    <footer>
        <div class="base">
        <div class="esqurda">
          <button class="pi">
            <div class="ub">
              <a href="index.html">
          <img src="./img/Urban.png" height="60px"class="pi1">
          
              </a> 
            </div>
    
        </button>
  
    <div class="insta">
      <img src="./img/insta.png" onclick="window.location.href='https://www.instagram.com/UrbanClubSantos/';" style="cursor: pointer;"> 
        <p ><a href="https://www.instagram.com/UrbanClubSantos/" >Instagram</a></p> 
     </div>
  
  
    <div class="rede">
      <img src="./img/twitter.png" onclick="window.location.href='https://twitter.com/UrbanClub_ofc?t=Fht9QqwDdwFeynMv1H5Nhw&s=08';"  style="cursor: pointer;">
        <p ><a href="https://twitter.com/UrbanClub_ofc?t=Fht9QqwDdwFeynMv1H5Nhw&s=08" >Twitter</a></p> 
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
         <img src="./img/artista.png">
         <p>Arte:</p>
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
  <div class="canto2">
    <h1>Legal</h1>
    <p>Politica de privacidade</p>
    <p>Termos de uso</p>  
    <p class="rules">2023 direitos reservados</p></div>
  </div>
  </footer>
</body>
</html>
</body>
</html>