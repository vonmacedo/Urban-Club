<?php
// Informações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "UrbanClub";

// Criando a conexão
$conn = new mysqli($localhost, $root, $root, $UrbanClub);

// Verificando se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}
echo "Conexão bem sucedida";


$nm_username= $_POST['apelido'];
$cd_email = $_POST['email'];
$cd_password = $_POST['senha'];
$cd_corfim_password = $_POST['confirmar-senha'];