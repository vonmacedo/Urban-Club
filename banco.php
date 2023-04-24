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

// Executando a consulta
$sql = "SELECT * FROM cadastro";
$result = $conn->query($sql);

// Exibindo os resultados
if ($result->num_rows > 0) {
    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo "Nome: " . $row["nome"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fechando a conexão
$conn->close();
?>
