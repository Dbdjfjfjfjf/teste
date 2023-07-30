<?php
session_start();

// Resto do seu código...

// Array para salvar os dados submetidos no formulário
$savedData = [];

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obtém os dados do formulário
  $name = $_POST["name"];
  $email = $_POST["email"];
  $date = $_POST["date"];
  $hora = $_POST["hora"];
  $message = $_POST["message"];

  // Salva os dados no array
  $savedData = [
    "name" => $name,
    "email" => $email,
    "date" => $date,
    "hora" => $hora,
    "message" => $message
  ];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pagina - Ajuda</title>
    <link rel="stylesheet" href="css/ajuda.css">
    <style>
      /* Estilos gerais */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f1f1f1;
}

/* Estilos do cabeçalho */
header {
  background-color: #2c2f33;
  padding: 20px;
  text-align: center;
}

header nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

header nav ul li {
  display: inline;
  margin-right: 10px;
}

header nav ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 16px;
}

/* Estilos do menu */
nav {
  background-color: #7289da;
  color: #fff;
  padding: 20px;
  text-align: center;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav ul li {
  margin-bottom: 10px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 18px;
}

/* Estilos do conteúdo */
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
  border: 1px solid #ddd;
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
  width: 100%;
  border: 1px solid #ddd;
  border-radius: 3px;
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

/* Estilos do rodapé */
footer {
  background-color: #2c2f33;
  color: #fff;
  padding: 20px;
  text-align: center;
}

footer p {
  margin: 0;
  font-size: 14px;
  color: #ddd;
}
    </style>
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="login/index.php">Inicio</a></li>
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
    <section class="hero">
        <h1>Bem-Vindo(a) a Nossa Pagina de Ajuda</h1>
        <p>Espero Resolver Suas Duvidas!</p>
    </section>
    <nav>
      <h2>Menu</h2>
      <ul>
        <li><a href="home.html">Pagina Inicial</a></li>
        <li><a href="contato.html">Contato</a></li>
      </ul>
    </nav>

    <main>
      <article>
        <h2>Como Posso Falar com um Admin?</h2>
        <p>Como parte da equipe responsavel pelo desenvolvimento e manutencao da nossa pagina de ajuda, gostariamos de destacar alguns aspectos sobre essa ferramenta valiosa para os usuarios do nosso site.

          Primeiramente, a organizacao clara e intuitiva da pagina de ajuda e algo que nos orgulhamos muito. Nos nos esforcamos para garantir que as informacoes sejam divididas em conteudos relevantes e que os usuarios possam encontrar rapidamente o que estao procurando. Acreditamos que isso torna a experiencia do usuario muito mais agradavel e eficiente.
          
          Outro ponto importante e que a nossa pagina de ajuda e regularmente atualizada. Sabemos que as coisas mudam rapidamente no mundo online e, por isso, nos esforcamos para manter todas as informacoes atualizadas e precisas. Se houver mudancas em nossos servicos, voce pode ter certeza de que estaremos atualizando a pagina de ajuda tao logo seja possivel.
          
          Alm disso, a opcao de pesquisa e uma funcionalidade importante para os usuarios que buscam informacoes especificas. Com a barra de pesquisa, e possivel digitar uma palavra-chave e encontrar rapidamente os artigos relevantes.
          
          Por fim, e importante destacar que, se mesmo apos a consulta da pagina de ajuda, o usuario ainda tiver duvidas, nossa equipe de suporte ao cliente estara pronta para ajuda-lo. Nos nos esforcamos para fornecer um atendimento rapido e eficiente, para que nossos usuarios possam usar nossos servicos com confianca.
          
          Em resumo, a pagina de ajuda e uma ferramenta essencial para ajudar os usuarios a navegar e utilizar nossos servicos de maneira eficiente. Estamos sempre trabalhando para melhora-la e garantir que as informacoes sejam claras, atualizadas e precisas.</p>
      </article>

      <form method="post" action="banco-geral/banco-ajuda/submit-form.php">
        <input type="text" name="name" placeholder="Nome Completo" required>
        <input type="email" name="email" placeholder="Endereço de Email" required>
        <input type="date" name="date" placeholder="Data" required>
        <input type="time" name="hora" placeholder="Hora" required>
        <textarea name="message" placeholder="Mensagem"></textarea>
        <button type="submit">Enviar</button>
      </form>
    </main>
    <footer>
      <p>&copy; 2023 Todos os direitos reservados.</p>
    </footer>
    <script src="js/ajuda.js"></script>
  </body>
</html>
