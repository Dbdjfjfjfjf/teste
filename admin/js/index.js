// Array para armazenar os membros
var members = [];

// Função para adicionar um membro à tabela
function addMemberToTable(member) {
	var table = document.getElementById('members-table');
	var row = table.insertRow();
	var nameCell = row.insertCell(0);
	var emailCell = row.insertCell(1);
	var actionsCell = row.insertCell(2);
	nameCell.innerHTML = member.name;
	emailCell.innerHTML = member.email;
	actionsCell.innerHTML = '<a href="#edit-member" class="edit-member" data-id="' + member.id + '">Editar</a> | <a href="#delete-member" class="delete-member" data-id="' + member.id + '">Excluir</a>';
}

// Função para exibir o formulário de adicionar membro
function showAddMemberForm() {
	document.getElementById('add-member').style.display = 'block';
	document.getElementById('edit-member').style.display = 'none';
	document.getElementById('delete-member').style.display = 'none';
}

// Função para exibir o formulário de editar membro
function showEditMemberForm(memberId) {
	document.getElementById('edit-member').style.display = 'block';
	document.getElementById('add-member').style.display = 'none';
	document.getElementById('delete-member').style.display = 'none';
	var member = members.find(function(m) {
		return m.id == memberId;
	});
	document.getElementById('edit-name').value = member.name;
	document.getElementById('edit-email').value = member.email;
}

// Função para exibir o formulário de excluir membro
function showDeleteMemberForm(memberId) {
	document.getElementById('delete-member').style.display = 'block';
	document.getElementById('add-member').style.display = 'none';
	document.getElementById('edit-member').style.display = 'none';
	document.getElementById('delete-member').addEventListener('submit', function(e) {
		e.preventDefault();
		deleteMember(memberId);
	});
}

// Função para adicionar um novo membro
function addMember() {
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var member = {
		id: members.length + 1,
		name: name,
		email: email
	};
	members.push(member);
	addMemberToTable(member);
	document.getElementById('add-member').style.display = 'none';
	document.getElementById('name').value = '';
	document.getElementById('email').value = '';
}

// Função para editar um membro existente
function editMember(memberId) {
	var member = members.find(function(m) {
		return m.id == memberId;
	});
	member.name = document.getElementById('edit-name').value;
	member.email = document.getElementById('edit-email').value;
	var table = document.getElementById('members-table');
	var rows = table.rows;
	for (var i = 0; i < rows.length; i++) {
		var row = rows[i];
		if (row.cells[2].querySelector('.edit-member').getAttribute('data-id') == memberId) {
			row.cells[0].innerHTML = member.name;
			row.cells[1].innerHTML = member.email;
		}
	}
	document.getElementById('edit-member').style.display = 'none';
	document.getElementById('edit-name').value = '';
	document.getElementById('edit-email').value = '';
}

// Função para excluir um membro existente
function deleteMember(memberId) {
	var index = members.findIndex(function(m) {
		return m.id == memberId;
	});
	if (index != -1) {
members.splice(index, 1);
var table = document.getElementById('members-table');
var rows = table.rows;
for (var i = 0; i < rows.length; i++) {
var row = rows[i];
if (row.cells[2].querySelector('.delete-member').getAttribute('data-id') == memberId) {
table.deleteRow(i);
}
}
document.getElementById('delete-member').style.display = 'none';
}
}

// Event listener para o formulário de adicionar membro
document.getElementById('add-member-form').addEventListener('submit', function(e) {
e.preventDefault();
addMember();
});

// Event listener para os links de editar membro
var editMemberLinks = document.getElementsByClassName('edit-member');
for (var i = 0; i < editMemberLinks.length; i++) {
editMemberLinks[i].addEventListener('click', function(e) {
e.preventDefault();
showEditMemberForm(e.target.getAttribute('data-id'));
});
}

// Event listener para os links de excluir membro
var deleteMemberLinks = document.getElementsByClassName('delete-member');
for (var i = 0; i < deleteMemberLinks.length; i++) {
deleteMemberLinks[i].addEventListener('click', function(e) {
e.preventDefault();
showDeleteMemberForm(e.target.getAttribute('data-id'));
});
}

// Adiciona alguns membros de exemplo
var member1 = {
id: 1,
name: 'João',
email: 'joao@example.com'
};
var member2 = {
id: 2,
name: 'Maria',
email: 'maria@example.com'
};
var member3 = {
id: 3,
name: 'Pedro',
email: 'pedro@example.com'
};
members.push(member1);
members.push(member2);
members.push(member3);
addMemberToTable(member1);
addMemberToTable(member2);
addMemberToTable(member3);
