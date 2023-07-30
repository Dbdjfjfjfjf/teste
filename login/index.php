<?php
session_start();

// Verificar se o usuário já está autenticado, redirecionar para a página inicial
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']) {
    // Verificar o cargo do usuário
    if ($_SESSION['cargo'] == "admin") {
        header('Location: ../index2.php');
    } else {
        header('Location: ../index.php');
    }
    exit();
}

// Verificar se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = $_POST['senha'];

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

    // Consulta para verificar se o usuário está cadastrado no banco de dados
    $sql = "SELECT * FROM $table WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    // Verificar se o usuário está cadastrado
    if ($result->num_rows > 0) {
        // Obter o cargo do usuário
        $row = $result->fetch_assoc();
        $tipo = $row["tipo"];

        // Autenticação bem-sucedida, definir as variáveis de sessão e redirecionar para a página correta
        $_SESSION['autenticado'] = true;
        $_SESSION['tipo'] = $tipo;
        if ($tipo == "admin") {
            header('Location: ../index2.php');
        } else {
            header('Location: ../index.php');
        }
        exit();
    } else {
        // Autenticação falhou, exibir mensagem de erro
        $mensagem = "Credenciais inválidas. Por favor, tente novamente.";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            margin-top: 10px;
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Página de Login</h1>

        <?php if (isset($mensagem)) : ?>
            <p class="error-message"><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <button type="submit">Entrar</button>
            <p>Não Tem Conta?      <a href="cadastro.php">Cadastre-se Aqui</a></p>
        </form>
    </div>
</body>
</html>
