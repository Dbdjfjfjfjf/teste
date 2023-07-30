<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Cadastro</h1>
  
  <form action="usuarios/cadastrar.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>
    
    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo">
      <option value="membro">Membro</option>
      <option value="admin">Administrador</option>
    </select>
    
    <button type="submit">Cadastrar</button>
  </form>
</body>
</html>
