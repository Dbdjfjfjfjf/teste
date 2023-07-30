<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <title>Redirecionando...</title>
    <style>
      .loading-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        background-color: #fff;
      }

      .loading-text {
        font-size: 24px;
        margin-bottom: 20px;
      }

      .loading-spinner {
        display: inline-block;
        width: 50px;
        height: 50px;
        border: 3px solid rgba(0, 0, 0, 0.3);
        border-radius: 50%;
        border-top-color: #3498db;
        animation: spin 1s ease-in-out infinite;
      }

      @keyframes spin {
        to {
          transform: rotate(360deg);
        }
      }
    </style>
  </head>
  <body>
    <div class="loading-container">
      <div class="loading-text">Espere um pouco!</div>
      <div class="loading-spinner"></div>
    </div>

    <script>
      // Define o tempo de espera em milissegundos (5 segundos, neste caso)
      const tempoDeEspera = 3000;

      // Define o link para redirecionar após o tempo de espera
      const link = "../voltar-membro-fund.php";

      // Função para redirecionar o usuário para o link após o tempo de espera
      function redirecionarParaLink() {
        window.location.href = link;
      }

      // Chama a função de redirecionamento após o tempo de espera
      setTimeout(redirecionarParaLink, tempoDeEspera);
    </script>
  </body>
</html>
