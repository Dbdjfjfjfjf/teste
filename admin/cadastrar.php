<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="css/cadastrar.css">
  <style>
    .container {
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f5f5f5;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #0056b3;
    }

    .form-group .botao {
      display: inline-block;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Cadastro de Admin</h1>

    <form action="cadastrar.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
      </div>

      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
      </div>

      <div class="form-group">
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo">
          <option value="membro">Membro</option>
          <option value="admin">Administrador</option>
        </select>
      </div>

      <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco">
      </div>

      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone">
      </div>

      <div class="form-group">
        <label for="data-nascimento">Data de Nascimento:</label>
        <input type="date" id="data-nascimento" name="data-nascimento">
      </div>

      <div class="form-group">
        <button type="submit">Cadastrar</button>
        <a href="usuarios/index.php" class="botao">Registros</a>
        <a href="#" class="botao">voltar</a>
      </div>
    </form>
  </div>

  <?php
  // Conectar ao banco de dados (substitua com suas próprias informações de conexão)
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cadastro";
  $table = "cadastro";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar a conexão
  if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
  }

  
// Verifica se o usuário já está logado, caso contrário redireciona para a página de login
if (!isset($_SESSION["id"])) {
  header("Location: ../login/index.php");
  exit();
}

// Verifica se o usuário é um administrador de nível "lider"
if ($_SESSION["email"] != "lideresbvr@gmail.com") {
  echo "Você não tem permissão para acessar esta página!";
  exit();
}
  // Verificar se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Obter os dados do formulário
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $tipo = $_POST['tipo'];
      $endereco = $_POST['endereco'];
      $telefone = $_POST['telefone'];
      $dataNascimento = $_POST['data-nascimento'];

      // Verificar se o usuário já existe no banco de dados
      $sql = "SELECT * FROM $table WHERE email = '$email' OR telefone = '$telefone'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // O usuário já existe no banco de dados, exiba uma mensagem de erro ou redirecione para uma página de erro.
          echo '<script>alert("O usuário já existe. Por favor, faça login em vez de cadastrar novamente.");</script>';
      } else {
          // O usuário não existe, então faça o cadastro
          $sql = "INSERT INTO $table (nome, email, senha, tipo, endereco, telefone, data_nascimento) VALUES ('$nome', '$email', '$senha', '$tipo', '$endereco', '$telefone', '$dataNascimento')";
          if ($conn->query($sql) === TRUE) {
              echo "Cadastro realizado com sucesso!";
          } else {
              echo "Erro ao cadastrar: " . $conn->error;
          }
      }
  }

  $conn->close();
  ?>
</body>
</html>
