<?php
include(config.php)
// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
  die('Falha na conexão com o banco de dados: ' . $conn->connect_error);
}

// Verifica se o formulário de comentário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtém o valor do comentário enviado pelo formulário
  $comentario = $_POST['comentario'];

  // Validação e sanitização do comentário (pode adicionar mais validações se necessário)
  $comentario = trim($comentario);
  $comentario = htmlspecialchars($comentario);

  // Insere o comentário no banco de dados
  if (!empty($comentario)) {
      // Prepara e executa a consulta SQL para inserir o comentário no banco de dados
      $sql = "INSERT INTO urbanclub (comentario) VALUES ($comentario)";

      // Prepara a instrução SQL com um espaço reservado para o comentário
      $stmt = $conn->prepare($sql);

      // Vincula o parâmetro do comentário à instrução SQL
      $stmt->bind_param("s", $comentario);

      if ($stmt->execute()) {
          echo 'Comentário salvo com sucesso!';
      } else {
          echo 'Erro ao salvar o comentário: ' . $stmt->error;
      }

      // Fecha a instrução
      $stmt->close();
  }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>