forneca apenas a array:
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
//     header("Location: ../voltar-login.php");
//     exit();
//   }


// Verificar se o ID do usuário para edição foi fornecido na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obter os dados do usuário a ser editado
    $sql = "SELECT * FROM $table WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "<script>alert('Usuário não encontrado.');</script>";
        exit;
    }
} else {
    echo "<script>alert('ID do usuário não fornecido.');</script>";
    exit;
}

// Verificar se o formulário de edição foi enviado
if (isset($_POST['editar_usuario'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];

    // Atualizar os dados do usuário no banco de dados
    $sql = "UPDATE $table SET nome='$nome', email='$email', tipo='$tipo', endereco='$endereco', telefone='$telefone', data_nascimento='$data_nascimento' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuário atualizado com sucesso!');</script>";
        // Redirecionar de volta para a página encontrar_usuarios.php após a edição
        echo "<script>window.location.href = 'encontrar_usuarios.php';</script>";
        exit;
    } else {
        echo "<script>alert('Erro ao atualizar usuário: " . $conn->error . "');</script>";
    }
}

// Função para atualizar a senha do usuário
function atualizarSenha($id, $novaSenha) {
    global $conn, $table;

    // Atualizar a senha do usuário no banco de dados
    $sql = "UPDATE $table SET senha='$novaSenha' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Senha atualizada com sucesso!');</script>";
        // Redirecionar de volta para a página encontrar_usuarios.php após a edição
        echo "<script>window.location.href = 'encontrar_usuarios.php';</script>";
        exit;
    } else {
        echo "<script>alert('Erro ao atualizar senha: " . $conn->error . "');</script>";
    }
}

// Verificar se o formulário de alteração de senha foi enviado
if (isset($_POST['alterar_senha'])) {
    $novaSenha = $_POST['nova_senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    if ($novaSenha === $confirmarSenha) {
        // Chamar a função para atualizar a senha
        atualizarSenha($id, $novaSenha);
    } else {
        echo "<script>alert('As senhas não coincidem.');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1 class="text-center">Editar Usuário</h1>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>"><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>"><br>

        <label for="tipo">Tipo:</label>
        <select name="tipo">
            <option value="admin" <?php if ($usuario['tipo'] === 'admin') echo 'selected'; ?>>Admin</option>
            <option value="membro" <?php if ($usuario['tipo'] === 'membro') echo 'selected'; ?>>Usuário</option>
            <option value="desativado" <?php if ($usuario['tipo'] === 'desativado') echo 'selected'; ?>>Desativar membro</option>
        </select><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" value="<?php echo $usuario['endereco']; ?>"><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $usuario['telefone']; ?>"><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" value="<?php echo $usuario['data_nascimento']; ?>"><br>

        <button type="submit" name="editar_usuario">Salvar</button>
    </form>

    <h2>Alterar Senha</h2>
    <form action="" method="post">
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" name="nova_senha" required><br>

        <label for="confirmar_senha">Confirmar Senha:</label>
        <input type="password" name="confirmar_senha" required><br>

        <button type="submit" name="alterar_senha">Alterar Senha</button>
    </form>
</body>
</html>