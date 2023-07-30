<?php
session_start();

// Obtém o email e o nome de usuário da sessão
$email = $_SESSION["email"];
$nome = $_SESSION["nome"];

// Verifica o tipo de membro (admin ou usuário) - você precisa ajustar isso de acordo com a estrutura do seu banco de dados
$tipo = "membro"; // Exemplo de tipo de membro (membro)
$tipo = "admin"; // exemplo de tipo de membro (admin)

// Restante do código permanece igual

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Breve descrição do conteúdo do site">
  <title>Página - Home</title>
  <link rel="stylesheet" href="css/index.css">
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
      <li><a href="configuracoes.php">Configurações do Usuário</a></li> <!-- Adicionado link para Configurações do Usuário -->
    </ul>
  </nav>
</header>
<section class="hero">
  <h1>Bem-Vindo(a) ao Site BVR Studios</h1>
  <p>Seja Bem-Vindo(a) ao Nosso Site. Espero que Goste!</p>
  <a href="lojas.html">
    <button type="button">Conheça Nosso Trabalho</button>
  </a>
</section>
<section class="services">
  <h2>Nossos Serviços</h2>
  <ul>
    <li>
      <div class="service-info">
        <img src="img/oisdfb.jpg" alt="Imagem do serviço">
        <h3>Desenvolvimento Web</h3>
        <p>Oferecemos serviços de desenvolvimento web personalizados para atender às necessidades de sua empresa. Conte com nossa equipe especializada para criar sites profissionais e responsivos.</p>
        <a href="servico-web.html">Saiba mais</a>
      </div>
    </li>
    <li>
      <i class="fas fa-mobile-alt" alt="Ícone de Celular"></i>
      <h3>Desenvolvimento Mobile</h3>
      <p>Desenvolvemos aplicativos móveis para Windows e Android, oferecendo soluções personalizadas para atender às necessidades do seu negócio.</p>
    </li>
    <li>
      <i class="fas fa-shopping-cart" alt="Ícone de Carrinho de Compras"></i>
      <h3>E-commerce</h3>
      <p>Desenvolvemos lojas virtuais personalizadas e escaláveis para vender seus produtos e serviços online.</p>
    </li>
  </ul>
</section>
<section class="cta">
  <div class="cta-container">
    <h2>Entre em Contato</h2>
    <p>Preencha o formulário abaixo para entrar em contato conosco e receber uma cotação.</p>
    <form action="banco-geral/banco-home/submit-form.php" method="post">
      <div class="form-group">
        <label for="name">Nome Completo</label>
        <input type="text" id="name" name="name" placeholder="Seu nome completo" required>
      </div>
      <div class="form-group">
        <label for="email">Endereço de Email</label>
        <input type="email" id="email" name="email" placeholder="Seu endereço de email" required value="<?php echo $email; ?>">
      </div>
      <div class="form-group">
        <label for="date">Data</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="form-group">
        <label for="message">Mensagem</label>
        <textarea id="message" name="message" placeholder="Sua mensagem" required></textarea>
      </div>
      <button type="submit">Enviar</button>
    </form>
  </div>
</section>
<footer>
  <p>© 2023 Todos os Direitos Reservados</p>
</footer>
<script src="js/home.js"></script>
</body>
</html>