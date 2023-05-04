<?php

include ('conexao.php');

$email= $_POST['email'];
$apelido=$_POST['apelido'];
$senha=$_POST['senha'];
$confirmar=$_POST['confirmar'];

$sql= "INSERT INTO cadastro(email, apelido, senha, confirmar)
VALUES ('$email', '$apelido', '$senha', '$confirmar'
?>