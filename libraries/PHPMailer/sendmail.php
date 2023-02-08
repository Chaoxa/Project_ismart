<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//dường dẫn
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';//cấu hình server mail, search goolge tìm send email.google lya link                 //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'nghiatran101022@gmail.com';  //tk mail gửi mail                   //SMTP username
    $mail->Password   = 'welihrqtliyjuyru';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;  
    //dịch qua tiếng việt
    $mail->CharSet = 'UTF-8';                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nghiatran101022@gmail.com', 'Nghĩa');//thông điệp này gửi từ đâu
    $mail->addAddress('nghia101022@gmail.com', 'Trần minh nghĩa'); //người nhận    //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('nghiatran101022@gmail.com', 'Nghĩa'); //người nhận phản hồi lại gửi qua đâu
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    //đính kèm file gửi cho khách
    // $mail->addAttachment('/var/tmp/file.tar.gz');   //tên file      //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // new là đổi tên file   //Optional name

    //Content
    //hiển thị dàng html
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '[PHP MASTER]Nghĩa gửi';//tiêu đề gửi
    $mail->Body    = 'hello, xin chào.';//nội dung gửi
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Đã gửi thành công';//thông báo khi gửi ok
} catch (Exception $e) {
    echo "Email không được gửi: {$mail->ErrorInfo}";
}