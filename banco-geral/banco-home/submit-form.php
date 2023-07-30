<?php
if($_POST) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $date = $_POST['date'];

  // monta o conteúdo que será salvo no arquivo
  $content = "<b>Nome: <mark>$name</mark><br>Data: <mark>$date</mark><br>E-mail: <mark>$email</mark><br>Mensagem: <mark>$message</mark><br><br><---------Separador---------><br><br></b>";

  // salva o conteúdo no arquivo
  $file = 'form-de-contato.html';
  file_put_contents($file, $content, FILE_APPEND);

  // redireciona para a página de sucesso
  header('Location: success.php');
}
?>
<style>
  .email{
    color: blue;
  }
</style>