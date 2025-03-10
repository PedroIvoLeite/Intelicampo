<?php

// Importa as classes necessárias do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclui os arquivos necessários do PHPMailer
require '../assets/PHPMailer/src/Exception.php';  // Arquivo para tratamento de exceções
require '../assets/PHPMailer/src/PHPMailer.php';  // Arquivo principal do PHPMailer
require '../assets/PHPMailer/src/SMTP.php';      // Arquivo para configuração do SMTP

// Função para enviar e-mails
function enviarEmail($destinatarioEmail, $destinatarioNome, $assunto, $mensagem) {
    try {
        // Configurações do servidor SMTP
        $mail = new PHPMailer(true); // Cria uma nova instância do PHPMailer com tratamento de exceções ativado
        $mail->isSMTP();             // Define que o PHPMailer usará SMTP para enviar o e-mail
        $mail->Host       = 'smtp.gmail.com'; // Define o servidor SMTP do Gmail
        $mail->SMTPAuth   = true;             // Habilita autenticação SMTP
        $mail->Username   = 'pedro.leite53@gmail.com'; // E-mail do remetente (Gmail)
        $mail->Password   = 'jikv pysb excd solc'; // Senha do e-mail ou senha de aplicativo
        $mail->SMTPSecure = 'ssl';             // Habilita criptografia SSL
        $mail->Port       = 465;               // Porta SMTP do Gmail para SSL

        // Configurações do e-mail
        $mail->setFrom('pedro.leite53@gmail.com', 'Intelicampo'); // Define o remetente (e-mail e nome)
        $mail->addAddress($destinatarioEmail, $destinatarioNome); // Adiciona o destinatário (e-mail e nome)
        $mail->isHTML(true); // Define que o corpo do e-mail será em formato HTML
        $mail->CharSet = 'UTF-8'; // Define o charset como UTF-8
        $mail->Subject = $assunto; // Define o assunto do e-mail
        $mail->Body    = $mensagem; // Define o corpo do e-mail (pode ser HTML)

        // Envia o e-mail
        $mail->send(); // Tenta enviar o e-mail
        return true; // Retorna true se o e-mail for enviado com sucesso
    } catch (Exception $e) {
        // Captura exceções e retorna uma mensagem de erro
        return "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $tipoPropriedade = $_POST['tipo'];
    $tamanhoRebanho = $_POST['tamanho'];
    $mensagem = $_POST['mensagem'];

    // Monta o assunto do e-mail
    $assunto = "Nova Solicitação de Informações - Intelicampo";

    // Monta o corpo do e-mail em HTML
    $corpoEmail = "
        <h2>Nova Solicitação de Informações</h2>
        <p><strong>Nome:</strong> $nome</p>
        <p><strong>E-mail:</strong> $email</p>
        <p><strong>Telefone:</strong> $telefone</p>
        <p><strong>Tipo de Propriedade:</strong> $tipoPropriedade</p>
        <p><strong>Tamanho do Rebanho:</strong> $tamanhoRebanho</p>
        <p><strong>Mensagem:</strong> $mensagem</p>
    ";

    // Define o destinatário (pode ser o e-mail da empresa ou do administrador)
    $destinatarioEmail = 'pedro.leite53@gmail.com';// Deve ser alterado
    $destinatarioNome = 'Equipe Intelicampo';

    // Tenta enviar o e-mail
    $resultado = enviarEmail($destinatarioEmail, $destinatarioNome, $assunto, $corpoEmail);

    // Retorna uma resposta para o frontend (AJAX)
    if ($resultado === true) {
        echo json_encode(['success' => true, 'message' => 'Solicitação enviada com sucesso!']);
    } else {
        echo json_encode(['success' => false, 'message' => $resultado]);
    }
} else {
    // Se o método de requisição não for POST, retorna um erro
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}

?>