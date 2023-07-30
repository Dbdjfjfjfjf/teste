// Carregue a API do Gmail
gapi.load('client:auth2', () => {
    gapi.client.init({
      apiKey: 'AIzaSyDw3cZlWNZoorc9_5NzrTp9mxYbWHcaIJ0',
      clientId: '65927039172-372ojvbfvd4j5vn64pjuii75gsenm2qo.apps.googleusercontent.com',
      discoveryDocs: ['https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest'],
      scope: 'https://www.googleapis.com/auth/gmail.compose'
    });
  
    // Quando o formulário é enviado, envie o e-mail
    const form = document.getElementById('email-form');
    form.addEventListener('submit', event => {
      event.preventDefault();
  
      const to = form.elements.to.value;
      const subject = form.elements.subject.value;
      const body = form.elements.body.value;
  
      sendMail(to, subject, body);
    });
  });
  
  // Envie o e-mail
  async function sendMail(to, subject, body) {
    try {
      // Obtenha a credencial de autorização do usuário
      const { access_token } = await gapi.auth2.getAuthInstance().currentUser.get().getAuthResponse();
  
      // Crie um cliente da API do Gmail
      const gmail = gapi.client.gmail;
  
      // Crie a mensagem
      const message = [
        'To: ' + to,
        'Subject: ' + subject,
        'Content-Type: text/html; charset=utf-8',
        '',
        body
      ].join('\n');
  
      // Codifique a mensagem em base64
      const encodedMessage = btoa(message)
        .replace(/\+/g, '-')
        .replace(/\//g, '_')
        .replace(/=+$/, '');
  
      // Envie a mensagem
      const res = await gmail.users.messages.send({
        userId: 'me',
        requestBody: {
          raw: encodedMessage
        },
        headers: {
          Authorization: `Bearer ${access_token}`
        }
      });
  
      console.log('Mensagem enviada com sucesso!', res.data);
    } catch (err) {
      console.error('Ocorreu um erro ao enviar a mensagem:', err);
    }
  }