<?php
session_start();

// Verifique se o usuário já está logado, redirecione para a página principal se estiver
if (isset($_SESSION["id"])) {
  header("Location: ../index.php");
  exit();
}

$mensagensErro = array();

// Verifique as credenciais do cadastro e redirecione para a página de login se for bem-sucedido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $endereco = $_POST["endereco"];
  $nascimento = $_POST["nascimento"];

  // Faz a conexão com o banco de dados
  $conn = mysqli_connect("localhost", "root", "", "cadastro");

  // Verifique se a conexão foi estabelecida com sucesso
  if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
  }

  // Consulta o banco de dados para verificar se o email já está cadastrado
  $sql = "SELECT * FROM cadastro WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  // Verifique se o email já está cadastrado
  if (mysqli_num_rows($result) > 0) {
    $mensagensErro[] = "E-mail já cadastrado";
  } else {
    // Consulta o banco de dados para obter o próximo ID disponível
    $sql = "SELECT MAX(id) AS max_id FROM cadastro";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $nextId = $row['max_id'] + 1;

    // Cria um hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere os dados do novo usuário no banco de dados
    $sql = "INSERT INTO cadastro (id, nome, email, senha, endereco, data_nascimento) VALUES ('$nextId', '$nome', '$email', '$senhaHash', '$endereco', '$nascimento')";
    if (mysqli_query($conn, $sql)) {
      // Redireciona para a página de login
      header("Location: index.php");
      exit();
    } else {
      $mensagensErro[] = "Falha ao cadastrar o usuário";
    }
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Cadastro</title>
</head>
<body>
  <h2>Cadastro</h2>
  <?php foreach ($mensagensErro as $mensagem) { ?>
    <p><?php echo $mensagem; ?></p>
  <?php } ?>
  <form action="" method="POST">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <input type="text" name="endereco" placeholder="Endereço" required>
    <input type="date" name="nascimento" placeholder="Data de Nascimento" required>
    <button type="submit">Cadastrar</button>
    <p>Já tem uma conta? <a href="index.php">Faça login</a>
  </form>
</body>
</html>
