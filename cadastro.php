<?php
 
include("config.php");


$email= $_POST['email'];
$apelido=$_POST['apelido'];
$senha=$_POST['senha'];
$confirmar=$_POST['confirmar'];

$result = mysqli_query($conexao, "INSERT INTO usuarios(email,apelido,senha,confirmar) VALUES('$email','$apelido','$senha','$confirmar')");

?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-cadastro.css">

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
               <a href="login.html">
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
                   <input type="password" name="senha" id="senha" required>
                   <br><br>
                </div>
        </div>
        <div class="input-box-confirmar-senha">
            <label for="confirmar-senha">Confirmar senha</label>
                <div class="input-field">
                   <input type="password" name="confirmar-senha" id= "confirmar-senha" required>
                   <br><br>
                   </div>
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
        <button class="pe">
            <a href="index.html">
        <img src="./img/logope.png" height="60px"class="pe1">
        <img src="./img/texto.png" height="20px" class="pe2"> 
            </a> 
      </button>
      <div class="redes">
      <a href="https://www.instagram.com/UrbanClubSantos/"><img src="./img/insta.png"></a> 
      <img src="./img/twitter.png">
    </div>
    </footer>
</body>
</html>