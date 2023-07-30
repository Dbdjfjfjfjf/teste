<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página com Botões</title>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .button-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .button {
      margin: 10px;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="button-container">
    <a class="button" href="../banco-geral/banco-home/form-de-contato.html">formulario de contato - home</a>
    <a class="button" href="../banco-geral/banco-ajuda/form-de-contato.html">formulario de contato - ajuda</a>
    <a class="button" href="link3.html">formulario de contato -</a>
    <a class="button" href="link4.html">formulario de contato -</a>
  </div>
</body>
</html>
