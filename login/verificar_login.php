<?php
// Dados do banco de dados
$servername = "localhost"; // Endereço do servidor (normalmente é "localhost")
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "cadastro"; // Nome do banco de dados

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtem os dados do formulário de login
$nome = $_POST["nome"];
$senha = $_POST["senha"];

// Query para verificar o cargo do usuário no banco de dados
$query = "SELECT tipo FROM cadastro WHERE nome = '$nome' AND senha = '$senha'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tipo = $row["tipo"];
    if ($tipo == "admin") {
        // Redireciona para a página index2.php se o cargo for "admin"
        header("Location: ../index2.php");
    } else {
        // Redireciona para a página index.php se o cargo for "usuario" ou vazio
        header("Location: ../index.php");
    }
} else {
    // Caso os dados de login estejam incorretos, redireciona para a página de login novamente
    header("Location: index.php");
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
