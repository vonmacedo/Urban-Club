
<?php

// Receba os dados do lugar favoritado via POST

$latitude = $_POST['latitude'];

$longitude = $_POST['longitude'];




// Conecte-se ao banco de dados

$servername = "localhost";

$username = "root";

$password = "root";

$dbname = "places";




$conn = new mysqli($servername, $username, $password, $dbname);




// Verifique a conexão

if ($conn->connect_error) {

    die("Falha na conexão: " . $conn->connect_error);

}


// Insira os dados na tabela lugares_favoritos

$sql = "INSERT INTO lugares_favoritos (latitude, longitude)

        VALUES ('$latitude', '$longitude')";


if ($sql_query = $conn->query($sql) === TRUE) {

    echo "Lugar favoritado com sucesso!";

} else {

    echo "Erro ao favoritar o lugar: " . $conn->error;

}


$conn->close();

?>


