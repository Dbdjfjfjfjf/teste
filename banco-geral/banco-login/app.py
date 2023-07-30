import os
import tkinter as tk

# Definir o caminho para a pasta de banco de dados
database_path = os.path.join(os.path.expanduser('~'), 'Desktop', 'banco-de-dados')

# Criar a pasta de banco de dados, se ela ainda não existe
if not os.path.exists(database_path):
    os.mkdir(database_path)

# Definir a classe de usuário
class User:
    def __init__(self, username, password, is_admin=False):
        self.username = username
        self.password = password
        self.is_admin = is_admin

# Definir a função de cadastro de usuário
def register(username, password, is_admin):
    # Verificar se o usuário já existe
    filename = os.path.join(database_path, f"{username}.txt")
    if os.path.exists(filename):
        return "Usuário já cadastrado!"
    
    # Salvar as informações do usuário em um arquivo de texto
    with open(filename, 'w') as f:
        f.write(f"{username}\n{password}\n{is_admin}")
    
    return "Usuário cadastrado com sucesso!"

# Definir a função de login
def login(username, password):
    # Verificar se o usuário existe e a senha está correta
    filename = os.path.join(database_path, f"{username}.txt")
    if not os.path.exists(filename):
        return "Usuário não cadastrado!"
    
    with open(filename, 'r') as f:
        saved_username = f.readline().strip()
        saved_password = f.readline().strip()
        is_admin = f.readline().strip() == 'True'
    
    if saved_username == username and saved_password == password:
        if is_admin:
            return "Login bem sucedido! Você é um administrador."
        else:
            return "Login bem sucedido! Você é um usuário comum."
    else:
        return "Nome de usuário ou senha incorretos!"

# Definir a função para lidar com o botão de cadastro
def register_button_handler():
    username = username_entry.get()
    password = password_entry.get()
    is_admin = is_admin_checkbox.get()
    result = register(username, password, is_admin)
    result_label.config(text=result)

# Definir a função para lidar com o botão de login
def login_button_handler():
    username = username_entry.get()
    password = password_entry.get()
    result = login(username, password)
    result_label.config(text=result)

# Criar a janela principal
root = tk.Tk()
root.title("Sistema de Login/Cadastro")

# Adicionar um campo de entrada de nome de usuário
username_label = tk.Label(root, text="Nome de usuário:")
username_label.grid(row=0, column=0)
username_entry = tk.Entry(root)
username_entry.grid(row=0, column=1)

# Adicionar um campo de entrada de senha
password_label = tk.Label(root, text="Senha:")
password_label.grid(row=1, column=0)
password_entry = tk.Entry(root, show="*")
password_entry.grid(row=1, column=1)

# Adicionar uma caixa de seleção para admin
is_admin_checkbox = tk.BooleanVar()
is_admin_checkbox.set(False)
is_admin_label = tk.Label(root, text="Administrador:")
is_admin_label.grid(row=2, column=0)
is_admin_entry = tk.Checkbutton(root, variable=is_admin
