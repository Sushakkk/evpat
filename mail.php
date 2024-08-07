<?php
// Включаем логирование ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// Получаем данные из формы
$name = $_POST['user_name'] ?? '';
$phone = $_POST['user_phone'] ?? '';
$email = $_POST['user_email'] ?? '';

// Настройки SMTP
$mail->isSMTP();
$mail->Host = 'smtp.yandex.ru';
$mail->SMTPAuth = true;
$mail->Username = 'zheskarkarpov@yandex.ru';
$mail->Password = 'qljqdbatmwfgfqup';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Настройки отправителя и получателя
$mail->setFrom('zheskarkarpov@yandex.ru', 'Заявка с сайта');
$mail->addAddress('ksenia.karpova.4@mail.ru');

// Настройки письма
$mail->isHTML(true);
$mail->Subject = 'Заявка с тестового сайта';
$mail->Body = '' . $name . ' оставил заявку, его телефон ' . $phone . '<br>Почта этого пользователя: ' . $email;
$mail->AltBody = '';

if (!$mail->send()) {
    echo 'Ошибка при отправке сообщения: ' . $mail->ErrorInfo;
} else {
    header('Location: thank-you.html');
}
?>
