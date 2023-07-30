<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // Conecta ao banco de dados
  $conn = new mysqli('localhost', 'usuario', 'senha', 'query.sql');
  
  // Verifica se houve erro na conexão
  if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
  }
  
  // Prepara as variáveis para inserção no banco de dados
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
  $data_criacao = date('Y-m-d H:i:s');
  $status_conta = 'ativo';
  
  // Insere os dados no banco de dados
  $sql = "INSERT INTO membros (nome, sobrenome, email, senha, data_criacao, status_conta)
          VALUES ('$nome', '$sobrenome', '$email', '$senha', '$data_criacao', '$status_conta')";
  
  if ($conn->query($sql) === TRUE) {
    // Redireciona para a página de login com uma mensagem de sucesso
    header("Location: login.php?msg=cadastro_sucesso");
    exit();
  } else {
    // Exibe uma mensagem de erro caso ocorra algum problema na inserção
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }
  
  // Fecha a conexão com o banco de dados
  $conn->close();
}
?>
