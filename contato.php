<?php
session_start();

// Resto do seu código...
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Pagina - Contato</title>
  <link rel="stylesheet" href="css/contato.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="verificar_login.php">Inicio</a></li>
        <li><a href="sobre.php">Sobre</a></li>
        <li><a href="contato.php">Contato</a></li>
        <li><a href="membro.php">Membros</a></li>
        <li><a href="ajuda.php">Ajuda</a></li>
        <li><a href="https://discord.com/invite/XxX3fWcETr">Discord</a></li>
        <li><a href="lojas.php">Servicos</a></li>
        <li><a href="configuracoes.php">Configurações do Usuário</a></li> <!-- Adicionado link para Configurações do Usuário -->
      </ul>
    </nav>
  </header>

  <style>
    .hero {
      background-image: url('https://www.bizplanetsolution.com/wp-content/uploads/2020/09/shutterstock_1018000423-1.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
      color: #fff;
    }

    .hero h1 {
      font-size: 4rem;
      margin: 0;
      padding: 0;
      text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
    }

    .hero p {
      font-size: 1.5rem;
      margin: 20px 0 0 0;
      padding: 0;
      text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
    }
  </style>

  <section class="hero">
    <h1>Seja Bem Vindo(a) a Nossa Pagina de Contato!!</h1>
    <p>Espero que goste de nossa Pagina de Contato!!</p>
  </section>

  <style>
    main {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 20px;
    }

    article {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      max-width: 600px;
      margin-right: 20px;
    }

    article h2 {
      margin: 0 0 10px 0;
      font-size: 24px;
    }

    article p {
      margin: 0 0 20px 0;
      font-size: 18px;
    }

    form {
      background-color: #fff;
      border: 1px solid #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      max-width: 400px;
    }

    form h2 {
      margin: 0 0 20px 0;
      font-size: 24px;
    }

    form label {
      display: block;
      margin-bottom: 5px;
      font-size: 18px;
    }

    form input,
    form textarea {
      font-size: 18px;
      padding: 5px;
      margin-bottom: 10px;
      width: 110%;
      border: 1px solid #ddd;
      border-radius: 10px;
    }

    form button[type="submit"] {
      background-color: #7289da;
      color: #fff;
      border: none;
      border-radius: 3px;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
    }

    form button[type="submit"]:hover {
      background-color: #5a68a5;
    }
  </style>

  <main>
    <article>
      <h2>Como Posso Falar com um Admin?</h2>
      <p>Para entrar em contato conosco, é necessário preencher um formulário de contato que está disponível ao lado. Você também pode falar conosco através do nosso Discord! Para acessar, clique na aba "Discord". Ou entre em contato por e-mail: brasilvidaroleplay3@gmail.com</p>
    </article>

    <form method="post" action="banco-geral/banco-contato/submit-form.php">
      <input type="text" name="nome" placeholder="Nome Completo" required>
      <input type="email" name="email" placeholder="Endereço de Email" required>
      <input type="date" name="data" placeholder="Data" required>
      <input type="time" name="hora" placeholder="Hora" required>
      <textarea name="message" placeholder="Mensagem"></textarea>
      <button type="submit" name="submit">Enviar</button>
      <div id="form-status"></div>
    </form>

    <script src="js/contato.js"></script>
  </main>
</body>
</html>
