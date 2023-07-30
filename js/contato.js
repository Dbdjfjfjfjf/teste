/* formulario de contato js*/

const form = document.querySelector("#contact-form");

form.addEventListener("submit", function(event) {
  event.preventDefault();
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "submit-form.php");
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert("Sua mensagem foi enviada com sucesso!");
      form.reset();
    } else {
      alert("Houve um problema ao enviar sua mensagem. Tente novamente mais tarde.");
    }
  };
  xhr.send(formData);
});

document.querySelector('form').addEventListener('submit', function(event) {
  event.preventDefault(); // previne que o formulário seja enviado

  // envia os dados do formulário para o arquivo PHP usando AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'banco-geral/banco-contato/submit-form.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // exibe mensagem de sucesso
      document.querySelector('#form-status').textContent = 'Mensagem enviada com sucesso!';
    } else {
      // exibe mensagem de erro
      document.querySelector('#form-status').textContent = 'Erro ao enviar mensagem. Por favor, tente novamente mais tarde.';
    }
  };
  xhr.send(new FormData(event.target));
});
