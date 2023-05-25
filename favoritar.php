<?php

include("config.php");




// Verificar se o usuário está autenticado e obter o ID do usuário

// Obtém o ID do lugar favoritado enviado via POST
$idLugar = $_POST['id_lugar'];

// Verificar se o lugar já está favoritado pelo usuário
$stmt = $conexao->prepare('SELECT * FROM favoritos WHERE id_cadastro AND id_lugar = ?');
$stmt->bind_param('ii',  $idLugar);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // O lugar já está favoritado pelo usuário, você pode mostrar uma mensagem ou retornar um status indicando isso
    echo json_encode(['message' => 'Lugar já está favoritado']);
    exit;
}

// Inserir o favorito na tabela de favoritos
$stmt = $conexao->prepare('INSERT INTO fav(id_lugar) VALUES (?, ?)');

if ($stmt->execute()) {
    echo json_encode(['message' => 'Lugar favoritado com sucesso']);
} else {
    echo json_encode(['message' => 'Erro ao favoritar o lugar']);
}

$stmt->close();
$conexao->close();
?>