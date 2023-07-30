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
// if (!isset($_SESSION["id"])) {
//   header("Location: ../voltar-login.php");
//   exit();
// }

// Função para obter todos os usuários do banco de dados
function obterUsuarios() {
    global $conn, $table;

    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    $usuarios = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }

    return $usuarios;
}

// Função para filtrar usuários com base em critérios de pesquisa
function filtrarUsuarios($termo, $tipo) {
    global $conn, $table;

    $sql = "SELECT * FROM $table WHERE (nome LIKE '%$termo%' OR email LIKE '%$termo%') AND tipo = '$tipo'";
    $result = $conn->query($sql);

    $usuarios = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }

    return $usuarios;
}

// Verificar se o termo de pesquisa e o tipo de usuário foram submetidos
if (isset($_GET['termo']) && isset($_GET['tipo'])) {
    $termo = $_GET['termo'];
    $tipo = $_GET['tipo'];
    $usuarios = filtrarUsuarios($termo, $tipo);
} else {
    // Obter todos os usuários se nenhum termo de pesquisa ou tipo de usuário for submetido
    $usuarios = obterUsuarios();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encontrar Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        form input[type="text"],
        form select {
            padding: 8px;
            font-size: 16px;
        }

        form button[type="submit"] {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        li strong {
            font-weight: bold;
        }

        li a {
            text-decoration: none;
            color: #007bff;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>Encontrar Usuários</h1>

<div class="botoes">
    <a href="../voltar.php" class="botao">Página Inicial</a>|
    <a href="../iindex.php" class="botao">Página administrativa</a>|
    <a href="../cadastrar.php" class="botao">Cadastrar membro</a>
  </div>

    <!-- Formulário de pesquisa -->
    <form action="" method="get">
        <input type="text" name="termo" placeholder="Pesquisar por nome ou e-mail">
        <select name="tipo">
            <option value="">Todos</option>
            <option value="admin">Admin</option>
            <option value="membro">Usuário</option>
        </select>
        <button type="submit">Pesquisar</button>
    </form>

    <!-- Lista de usuários -->
    <h2>Lista de Usuários</h2>
    <?php if (!empty($usuarios)) : ?>
        <ul>
            <?php foreach ($usuarios as $usuario) : ?>
                <li>
                    <strong>ID:</strong> <?php echo $usuario['id']; ?><br>
                    <strong>Nome:</strong> <?php echo $usuario['nome']; ?><br>
                    <strong>E-mail:</strong> <?php echo $usuario['email']; ?><br>
                    <strong>Senha:</strong> <?php echo $usuario['senha']; ?><br>
                    <strong>Tipo:</strong> <?php echo $usuario['tipo']; ?><br>
                    <strong>Endereço:</strong> <?php echo $usuario['endereco']; ?><br>
                    <strong>Telefone:</strong> <?php echo $usuario['telefone']; ?><br>
                    <strong>Data de Nascimento:</strong> <?php echo $usuario['data_nascimento']; ?><br>
                    <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a> |
                    <a href="encontrar_usuarios.php?id=<?php echo $usuario['id']; ?>">Remover</a>
                </li>
                <br>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Nenhum usuário encontrado.</p>
    <?php endif; ?>

    <?php
    // Verificar se o ID do usuário para exclusão foi fornecido na URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Executar a consulta para excluir o usuário
        $sql = "DELETE FROM $table WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Usuário removido com sucesso!');</script>";
            // Atualizar a lista de usuários após a exclusão
            $usuarios = obterUsuarios();
        } else {
            echo "<script>alert('Erro ao remover usuário: " . $conn->error . "');</script>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
