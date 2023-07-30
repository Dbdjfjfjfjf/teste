// Array para armazenar os usuários cadastrados
let usuarios = [];

// Função para cadastrar um novo usuário
function cadastrarUsuario(nome, email, senha, isAdmin) {
  let novoUsuario = {
    nome: nome,
    email: email,
    senha: senha,
    isAdmin: isAdmin
  };
  usuarios.push(novoUsuario);
  console.log("Novo usuário cadastrado:", novoUsuario);
}

// Exemplo de uso da função cadastrarUsuario:
cadastrarUsuario("João", "joao@example.com", "123456", true);
// Função para verificar se um usuário existe no array
function verificarUsuario(email, senha) {
  for (let i = 0; i < usuarios.length; i++) {
    let usuario = usuarios[i];
    if (usuario.email === email && usuario.senha === senha) {
      console.log("Usuário encontrado:", usuario);
      return usuario;
    }
  }
  console.log("Usuário não encontrado.");
  return null;
}

// Exemplo de uso da função verificarUsuario:
let usuario = verificarUsuario("joao@example.com", "123456");
if (usuario !== null) {
  console.log("Bem-vindo,", usuario.nome);
} else {
  console.log("Email ou senha inválidos.");
}
// Função para tornar um usuário admin
function tornarAdmin(email) {
  let usuario = encontrarUsuario(email);
  if (usuario !== null) {
    usuario.isAdmin = true;
    console.log("Usuário", usuario.nome, "tornou-se admin.");
  } else {
    console.log("Usuário não encontrado.");
  }
}

// Exemplo de uso da função tornarAdmin:
tornarAdmin("joao@example.com");
// Selecionar o botão de login
const loginButton = document.querySelector('#login-button');

// Adicionar um evento de clique ao botão de login
loginButton.addEventListener('click', () => {
  // Obter o valor do campo de e-mail e senha
  const email = document.querySelector('#email').value;
  const password = document.querySelector('#password').value;
  
  // Verificar se o e-mail e a senha são válidos
  if (isValidEmail(email) && isValidPassword(password)) {
    // Redirecionar o usuário para a página index.html
    window.location.href = 'index.php';
  } else {
    // Exibir uma mensagem de erro se o e-mail ou a senha forem inválidos
    const errorMessage = document.querySelector('#error-message');
    errorMessage.textContent = 'E-mail ou senha inválidos.';
  }
});

// Função para verificar se o e-mail é válido
function isValidEmail(email) {
  // Implemente sua lógica de validação de e-mail aqui
  return true;
}

// Função para verificar se a senha é válida
function isValidPassword(password) {
  // Implemente sua lógica de validação de senha aqui
  return true;
}