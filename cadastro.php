<?php
include("config.php");

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $apelido = $_POST['apelido'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $result = mysqli_query($conexao, "INSERT INTO cadastro(email, apelido, senha) VALUES('$email', '$apelido', '$senha')");
    session_start();
    if ($result) {
        // Obtém o ID do cadastro inserido
        $id_cadastro = mysqli_insert_id($conexao);
        $_SESSION['id_cadastro'] = $id_cadastro;
        // Redireciona para a página do mapa com o ID do cadastro como parâmetro na URL
        header("Location: mapa.php?id_cadastro=$id_cadastro");
        exit();
    } else {
        echo "Erro ao cadastrar o usuário: " . mysqli_error($conexao);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-cadastro.css">
    <script src= "./js/scriptcadastro.js" defer></script>
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
               <a href="login.php">
                <img style="background-position: center; background-repeat: repeat; width: 25px ;" src="./img/seta.png">
               </a>
            </button>
        </div>
            <hr>
        </header>
        
        <main id="container">
            
            <form class="login_form" action="cadastro.php" method="post" name="cadastro">
               
            <div class="imagens">
                <img  src="./img/facebook.png" height="60px" >
                <img src="./img/Linha.png " height="130px">
                <img src="./img/google.png" height="60px">
            </div>

    <div id="inputs">
        <div class="input-box-Email">
            <label for="Email">Email</label>
                <div class="input-field" >
                   <input type="email" name="email" id= "email" required placeholder="Exemplo@gmail.com">
                   <br><br>
                </div>
        </div>
        <div class="input-box-Apelido">
            <label for="Apelido">Apelido</label>
                <div class="input-field">
                   <input type="text" name="apelido" id="apelido" required placeholder="Rex123">
                   <br><br>
                   </div>
        </div>
        <div class="input-box-senha">
            <label for="Senha">Senha</label>
                <div class="input-field">
                   <input type="password" name="senha" id="senha" required onchange='confereSenha()';>
                   <br><br>
                </div>
        </div>
        <div class="input-box-confirmar-senha">
            <label for="confirmar-senha">Confirmar senha</label>
                <div class="input-field">
                   <input type="password" name="confirmar" id= "confirmar" required onchange='confereSenha()';>
                   <br><br>
                   </div>
        </div>
        <div class="check-box">
                    <input type = "checkbox" id="checkbox" required>
                    <a href="teste.html"> Aceito os Termos de Uso </a>
                </div>
    </div>
            <button class="botao-cadastrar" type="submit" name ="submit" href="conta.html"> 
                Cadastrar
            </button>
    </form> 
 </main>
    
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
  <div class="canto">
    <h1>Legal</h1>
    <p>Politica de privacidade</p>
    <p>Termos de uso</p>  
    <p class="rules">2023 direitos reservados</p></div>
  </div>
  </footer>
</body>
</html>