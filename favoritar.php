
<?php

// Receba os dados do lugar favoritado via POST

$latitude = $_POST['latitude'];

$longitude = $_POST['longitude'];




// Conecte-se ao banco de dados

$servername = "localhost";

$username = "root";

$password = "root";

$dbname = "urbanclub";




$conn = new mysqli($servername, $username, $password, $dbname);




$idLugar = $_POST['id_lugar'];
$title = $_POST['title'];


if ($conn->connect_error) {
    die('Erro de conexão com o banco de dados: ' . $conn->connect_error);
  }
  
  // Inserir o lugar nos favoritos
  $sql = "INSERT INTO FAV (id_lugar, lugar) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('is', $idLugar, $title);
  
  if ($stmt->execute()) {
    echo 'Lugar adicionado aos favoritos com sucesso!';
  } else {
    echo 'Erro ao adicionar o lugar aos favoritos: ' . $conn->error;
  }
  
  // Fechar a conexão com o banco de dados
  $stmt->close();
  $conn->close();
  ?>

