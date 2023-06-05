<?php

session_start();

ob_start();
include('config.php');

?>
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
  $dados 
  =filter_input_array(INPUT_POST, FILTER_DEFAULT);
  $query_email = "SELECT id_cadastro, email, apelido
  FROM cadastro
  WHERE email = ?
  LIMIT 1";

$result_email = $conexao->prepare($query_email);
if ($result_email === false) {
die("Error preparing the statement: " . $conexao->error);
}

$email = $dados['email'];
$result_email->bind_param('s', $email);
$result_execution = $result_email->execute();

if ($result_execution === false) {
die("Error executing the statement: " . $result_email->error);
}

$result_email->store_result();

if ($result_email->num_rows != 0) {
$result_email->bind_result($id_cadastro, $email, $apelido);
$result_email->fetch();

$row_email = [
'id_cadastro' => $id_cadastro,
'email' => $email,
'apelido' => $apelido
];

var_dump($row_email);

$recuperar_senha = password_hash($row_email['id_cadastro'] . $row_email['email'],
PASSWORD_DEFAULT);


$query_up_email = "UPDATE cadastro

SET recuperar_senha =:recuperar_senha
WHERE id_cadastro =:id_cadastro
LIMIT 1";

$editar_email = $conexao->prepare($query_up_email);
$editar_email->bind_param(':recuperar_senha', $dados[email]);
    $editar_email->bind_param(':id_cadastro', $row_email['id_cadastro']);

    


}



$result_email->close();
$conexao->close();


  ?>
        <main id="container">
            <form class="nova-senha_form" action="" method="post" name="nova-senha">
    <div id="inputs">
      
        <div class="input-box-senha">
            <label for="Email">E-mail</label>
                <div class="input-field">
                   <input type="text" name="email" placeholder="Digite seu email">
                   <br><br>
                </div>
        </div>
     
                 
        </div>

    </div>

    <input type="submit" class="botao-login" name="recuperar" value="Recuperar">
        
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