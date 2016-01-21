<?php
 
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("phpmailer/class.phpmailer.php");
require("phpmailer/PHPMailerAutoload.php");
 
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.ppm.art.br"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
$mail->Username = 'ppm@ppm.art.br'; // Usuário do servidor SMTP (endereço de email)
$mail->Password = 'grv123'; // Senha do servidor SMTP (senha do email usado)
 
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "iago.pereira@kinghost.com.br"; // Seu e-mail
$mail->Sender = "iago.pereira@kinghost.com.br"; // Seu e-mail
$mail->FromName = "iago"; // Seu nome
 
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('DESTINATÁRIO_1', 'NOME_DESTINATÁRIO_1');
$mail->AddAddress('DESTINATÁRIO_2');
$mail->AddCC('testeiseuemail@gmail.com', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
 
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Mensagem Teste"; // Assunto da mensagem
$mail->Body = 'Este é o corpo da mensagem de teste, em HTML! 
<IMG src="http://seudomínio.com.br/imagem.jpg" alt=":)"   class="wp-smiley"> ';
$mail->AltBody = 'Este é o corpo da mensagem de teste, em Texto Plano! \r\n 
<IMG src="http://seudomínio.com.br/imagem.jpg" alt=":)"  class="wp-smiley"> ';
 
// Define os anexos (opcional)
//$mail->AddAttachment("/home/login/documento.pdf", "novo_nome.pdf");  // Insere um anexo
 
// Envia o e-mail
$enviado = $mail->Send();
 
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
 
// Exibe uma mensagem de resultado
if ($enviado) {
echo "E-mail enviado com sucesso!";
} else {
echo "Não foi possível enviar o e-mail.
 
";
echo "Informações do erro: 
" . $mail->ErrorInfo;
}
 
?>
