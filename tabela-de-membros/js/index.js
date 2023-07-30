// Obtém a referência aos elementos HTML
const table = document.getElementById('table-members');
const tbody = table.querySelector('tbody');
const btnAdd = document.getElementById('btn-add');

// Define a URL da API de membros
const apiUrl = 'api/members.php';

// Adiciona um listener de clique no botão Adicionar Membro
btnAdd.addEventListener('click', () => {
  window.location.href = 'cadastro.php';
});

// Carrega a lista de membros ao carregar a página
window.addEventListener('load', () => {
  loadMembers();
});

// Função para carregar a lista de membros
function loadMembers() {
  fetch(apiUrl)
    .then(response => response.json())
    .then(members => {
      tbody.innerHTML = ''; // Limpa a tabela antes de adicioná-los novamente
      members.forEach(member => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${member.id}</td>
          <td>${member.nome}</td>
          <td>${member.sobrenome}</td>
          <td>${member.email}</td>
          <td>${member.data_criacao}</td>
          <td>${member.status_conta}</td>
          <td class="actions">
            <button class="btn-edit" data-id="${member.id}">Editar</button>
            <button class="btn-delete" data-id="${member.id}">Excluir</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    })
    .catch(error => console.error(error));
}

// Adiciona um listener de clique na tabela para editar ou excluir membros
table.addEventListener('click', event => {
  const target = event.target;
  const isEditButton = target.classList.contains('btn-edit');
  const isDeleteButton = target.classList.contains('btn-delete');
  if (isEditButton || isDeleteButton) {
    const memberId = target.getAttribute('data-id');
    if (isEditButton) {
      window.location.href = `cadastro.php?id=${memberId}`;
    } else {
      if (confirm('Tem certeza de que deseja excluir este membro?')) {
        deleteMember(memberId);
      }
    }
  }
});

// Função para excluir um membro
function deleteMember(id) {
  fetch(`${apiUrl}?id=${id}`, { method: 'DELETE' })
    .then(() => loadMembers())
    .catch(error => console.error(error));
}
