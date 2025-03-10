

 // Máscara para o campo de telefone
 const telefoneInput = document.getElementById('telefone');
 telefoneInput.addEventListener('input', function (e) {
     let value = e.target.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
     if (value.length > 11) {
         value = value.slice(0, 11); // Limita a 11 dígitos
     }
     value = value.replace(/^(\d{2})(\d)/g, '($1) $2'); // Adiciona parênteses nos dois primeiros dígitos
     value = value.replace(/(\d{5})(\d)/, '$1-$2'); // Adiciona hífen após o quinto dígito
     e.target.value = value;
 });

 // Envio de formulario email
 document.getElementById('form-contato').addEventListener('submit', function (event) {
 event.preventDefault(); // Impede o envio padrão do formulário

 // Desativa o botão de submit
 const submitButton = document.getElementById('button_submit');
 submitButton.disabled = true;
 submitButton.textContent = 'Enviando...'; // Altera o texto do botão

 // Coleta os dados do formulário
 const formData = new FormData(this);

 // Envia os dados via Fetch API
 fetch('../Api/email.php', {
     method: 'POST',
     body: formData
 })
 .then(response => response.json())
 .then(data => {
     if (data.success) {
         // Exibe um alerta de sucesso com SweetAlert2
         Swal.fire({
             icon: 'success',
             title: 'Sucesso!',
             text: 'Solicitação enviada com sucesso!',
             confirmButtonText: 'OK'
         });
         document.getElementById('form-contato').reset(); // Limpa o formulário
     } else {
         // Exibe um alerta de erro com SweetAlert2
         Swal.fire({
             icon: 'error',
             title: 'Erro!',
             text: data.message || 'Erro ao enviar a solicitação. Tente novamente.',
             confirmButtonText: 'OK'
         });
     }
 })
 .catch(error => {
     console.error('Erro:', error);
     // Exibe um alerta de erro com SweetAlert2
     Swal.fire({
         icon: 'error',
         title: 'Erro!',
         text: 'Erro ao enviar a solicitação. Tente novamente.',
         confirmButtonText: 'OK'
     });
 })
 .finally(() => {
     // Reativa o botão de submit, independentemente do resultado
     submitButton.disabled = false;
     submitButton.textContent = 'Enviar Solicitação'; // Restaura o texto original do botão
 });
});