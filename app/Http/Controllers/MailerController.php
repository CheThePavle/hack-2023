<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends Controller
{
    static public function send($email, $header, $body = '<h1>Информация</h1>') {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer();

        try {
            $mail->SMTPDebug = 0;
            $mail->CharSet = 'utf-8';
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            $mail->setFrom(env('MAIL_USERNAME'));
            $mail->addAddress($email);
            $mail->isHTML(true);

            $mail->Subject = $header;

            $mail->Body = $body;

            if(!$mail->send()) {
                return "Письмо не отправлено";
            } else {
                return "Письмо отправлено";
            }
        } catch (Exception $e) {
            return "Невозможно отправить письмо";
        }
    }
}
