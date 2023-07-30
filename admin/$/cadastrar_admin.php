<?php
// Conectar ao banco de dados
$conn = mysqli_connect("localhost", "root", "", "admin-login");

// Verificar a conexão
if (!$conn) {
  die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  // Criar a consulta SQL para inserir o administrador
  $sql = "INSERT INTO `admin_login`.cadastro (email, senha, tipo) VALUES ('$email', '$senha', 'admin')";

  // Executar a consulta
  if (mysqli_query($conn, $sql)) {
    echo "Administrador cadastrado com sucesso!";
  } else {
    echo "Erro ao cadastrar administrador: " . mysqli_error($conn);
  }
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
