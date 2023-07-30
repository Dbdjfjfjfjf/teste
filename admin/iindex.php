<?php
// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar as credenciais de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se o usuário e senha estão corretos
    if ($email === 'brasilvidaroleplay3@gmail.com' && $senha === 'Ruan1243') {
        // As credenciais estão corretas, continuar com a exibição da página
        include('admin/iindex.php'); // Substitua 'pagina_administrativa.php' pelo nome do arquivo da página administrativa

        exit(); // Encerrar a execução do script após exibir a página administrativa
    } else {
        // As credenciais estão incorretas, redirecionar de volta para a página inicial
        header('Location: index.php'); // Substitua 'index.php' pelo nome do arquivo da página inicial
        exit(); // Encerrar a execução do script após redirecionar
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Página Administrativa</title>
	<style>
		/* Estilo CSS para a página */
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		header {
			background-color: #333;
			color: #fff;
			padding: 10px;
			text-align: center;
		}
		.container {
			display: flex;
			flex-direction: row;
		}
		.sidebar {
			background-color: #f1f1f1;
			flex: 1;
			padding: 10px;
		}
		.main-content {
			flex: 4;
			padding: 10px;
		}
		/* Estilo CSS para a tabela de membros */
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		.text-center{
			text-align: justify;
		}
	</style>
</head>
<body>
	<header>
		<h1>Página Administrativa</h1>
	</header>
	<div class="container">
		<div class="sidebar">		
			<h2>Gerenciamento de Membros</h2>
			<ul>
				<li><a href="../index2.php">Voltar</a></li>
				<li><a href="cadastrar.php">Adicionar Membro</a></li>
				<li><a href="usuarios/encontrar_usuarios.php">Editar Membro</a></li>
				<li><a href="#delete-member">Excluir Membro</a></li>
				<li><a href="mensagens.php">Ver Mensagens</a></li>
			</ul>
		</div>
		<div class="main-content">
			<h2>Lista de Membros</h2>
			<table>
				<thead>
					<tr>
						<th class="text-center">ID:</th>
						<th class="text-center">Nome:</th>
						<th class="text-center">Email:</th>
						<th class="text-center">Telefone:</th>
					</tr>
				</thead>
				<tbody>
					<?php
					// Conexão com o banco de dados
					$host = 'localhost'; // substitua pelo host do seu banco de dados
					$user = 'root'; // substitua pelo nome de usuário do seu banco de dados
					$password = ''; // substitua pela senha do seu banco de dados
					$database = 'cadastro'; // substitua pelo nome do seu banco de dados

					$conn = new mysqli($host, $user, $password, $database);

					// Verificar a conexão
					if ($conn->connect_error) {
					    die('Falha na conexão: ' . $conn->connect_error);
					}

					// Consulta SQL para obter os membros
					$sql = 'SELECT id, nome, email, telefone FROM cadastro';
					$result = $conn->query($sql);

					// Exibir os membros na tabela
					if ($result->num_rows > 0) {
					    while ($row = $result->fetch_assoc()) {
					        echo '<tr>';
					        echo '<td>' . $row['id'] . '</td>';
					        echo '<td>' . $row['nome'] . '</td>';
					        echo '<td>' . $row['email'] . '</td>';
							echo '<td>' . $row['telefone'] . '</td>';
					        echo '</tr>';
					    }
					} else {
					    echo '<tr><td colspan="3">Nenhum membro encontrado.</td></tr>';
					}

					// Fechar a conexão com o banco de dados
					$conn->close();
					?>
				</tbody>
			</table>
			<!-- Formulários e scripts omitidos para maior clareza -->
		</div>
	</div>
	<script>
		// Exibir o formulário de adicionar membro quando o link for clicado
		document.querySelector('a[href="#add-member"]').addEventListener('click', function(e) {
			e.preventDefault();
			document.getElementById('add-member').style.display = 'block';
			document.getElementById('edit-member').style.display = 'none';
			document.getElementById('delete-member').style.display = 'none';
		});
		// Exibir o formulário de editar membro quando o link for clicado
		document.querySelector('a[href="#edit-member"]').addEventListener('click', function(e) {
			e.preventDefault();
			document.getElementById('edit-member').style.display = 'block';
			document.getElementById('add-member').style.display = 'none';
			document.getElementById('delete-member').style.display = 'none';
		});
		// Exibir o formulário de excluir membro quando o link for clicado
		document.querySelector('a[href="#delete-member"]').addEventListener('click', function(e) {
			e.preventDefault();
			document.getElementById('delete-member').style.display = 'block';
			document.getElementById('add-member').style.display = 'none';
			document.getElementById('edit-member').style.display = 'none';
		});
	</script>
	<script src="js/index.js"></script>
</body>
</html>