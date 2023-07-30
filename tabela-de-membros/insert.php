<?php
// Verifica se foi feita uma solicitação POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // Obtém os valores do formulário de cadastro
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Salva a senha criptografada
  $dataCriacao = date('Y-m-d H:i:s'); // Obtém a data e hora atual
  $statusConta = 'ativo'; // Define o status da conta como ativo
  
  // Conecta ao banco de dados
  $servername = 'localhost';
  $username = 'seu_usuario';
  $password = 'sua_senha';
  $dbname = 'seu_banco_de_dados';
  $conn = new mysqli('localhost', 'seu_usuario', 'sua_senha', 'seu_banco_de_dados');

  // Verifica se a conexão foi bem-sucedida
  if (!$conn) {
    die('Conexão falhou: ' . mysqli_connect_error());
  }

  // Cria a query SQL para inserir o novo membro no banco de dados
  $sql = "INSERT INTO membros (nome, sobrenome, email, senha, data_criacao, status_conta) VALUES ('$nome', '$sobrenome', '$email', '$senha', '$dataCriacao', '$statusConta')";

  // Executa a query SQL
  if (mysqli_query($conn, $sql)) {
    // Redireciona para a página inicial com uma mensagem de sucesso
    header('Location: index.html?success=1');
  } else {
    echo 'Erro ao inserir o novo membro: ' . mysqli_error($conn);
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conn);
} else {
  // Redireciona para a página de cadastro
  header('Location: cadastro.php');
}
