<?php
session_start();
  
  // Verifique se a chave 'configuracoes' está definida no array $_SESSION
  if (!isset($_SESSION['configuracoes'])) {
    $_SESSION['configuracoes'] = array();
  }
  
  // Agora você pode acessar a chave 'configuracoes' sem gerar o erro
  $configuracoes = $_SESSION['configuracoes'];
// Verifica se o usuário já está logado, caso contrário redireciona para a página de login
// if (!isset($_SESSION["id"])) {
//   header("Location: login/index.php");
//   exit();
// }

// Obtém o email, usuário e configurações da sessão
$email = $_SESSION["email"];
$usuario = $_SESSION["usuario"];
$configuracoes = $_SESSION["configuracoes"];

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Verifica se a senha foi enviada e corresponde à senha da conta cadastrada
  $senha = $_POST["senha"];

  // Verifique a senha com a lógica adequada, por exemplo, consultando o banco de dados
  $senhaCorreta = true; // Substitua por sua lógica de verificação de senha

  if ($senhaCorreta) {
    // A senha está correta, permita que o membro modifique as configurações
    $novasConfiguracoes = $_POST["configuracoes"];

    // Atualize as configurações no banco de dados ou em outra forma de armazenamento
    // ...

    // Exemplo: atualizando as configurações na sessão
    $_SESSION["configuracoes"] = $novasConfiguracoes;

    // Redirecione o membro de volta para a página de configurações com uma mensagem de sucesso
    header("Location: configuracoes.php?sucesso=true");
    exit();
  } else {
    // A senha está incorreta, exiba uma mensagem de erro
    $erroSenha = "A senha está incorreta. Tente novamente.";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Breve descrição do conteúdo do site">
  <title>Página - Configurações</title>
  <link rel="stylesheet" href="css/configuracoes.css">
  <style>
    /* Estilos CSS adicionais podem ser adicionados aqui */
  </style>
</head>
<body>
<header>
  <nav>
    <ul>
      <li><a href="verificar_login.php">Início</a></li>
      <li><a href="sobre.php">Sobre</a></li>
      <li><a href="contato.php">Contato</a></li>
      <li><a href="membro.php">Membros</a></li>
      <li><a href="ajuda.php">Ajuda</a></li>
      <li><a href="https://discord.com/invite/XxX3fWcETr">Discord</a></li>
      <li><a href="lojas.php">Serviços</a></li>
      <li><a href="configuracoes.php">Configurações do Usuário</a></li>
    </ul>
  </nav>
</header>
<section class="configuracoes">
  <h2>Configurações do Usuário</h2>
  <?php if (isset($_GET["sucesso"]) && $_GET["sucesso"] === "true"): ?>
    <p class="mensagem-sucesso">As configurações foram atualizadas com sucesso.</p>
  <?php endif; ?>
  <form action="configuracoes.php" method="POST">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="usuario">Usuário</label>
      <input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="senha">Senha</label>
      <input type="password" id="senha" name="senha" required>
      <?php if (isset($erroSenha)): ?>
        <p class="mensagem-erro"><?php echo $erroSenha; ?></p>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <label for="configuracoes">Configurações</label>
      <textarea id="configuracoes" name="configuracoes"><?php echo $configuracoes; ?></textarea>
    </div>
    <button type="submit">Salvar Configurações</button>
    <a href="login/logout.php">Sair da Conta</a>
  </form>
</section>
<footer>
  <p>© 2023 Todos os Direitos Reservados</p>
</footer>
</body>
</html>
