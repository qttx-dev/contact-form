<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mailserver = '';
$username = '';
$password = '';
$mailport = 465;
$from_mail = '';
$from_name = '';
$to_mail = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $attachments = $_FILES['attachments'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $mailserver;
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;

        $mail->Port = $mailport;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        $mail->setFrom($from_mail, $from_name);
        $mail->addReplyTo($email, $name);
        $mail->addAddress($to_mail); // Empfängeradresse

        // Anhänge hinzufügen, wenn vorhanden
        if (!empty($attachments['name'][0])) {
            for ($i = 0; $i < count($attachments['name']); $i++) {
                if ($attachments['size'][$i] > 10485760) {
                    die("Eine der Dateien ist zu groß. Maximal 10 MB erlaubt.");
                }

                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'xlsx', '7z', 'csv', 'txt'];
                $fileExtension = strtolower(pathinfo($attachments['name'][$i], PATHINFO_EXTENSION));

                if (!in_array($fileExtension, $allowedExtensions)) {
                    die("Ungültiges Dateiformat: " . $attachments['name'][$i]);
                }

                if ($attachments['size'][$i] > 0) {
                    $mail->addAttachment($attachments['tmp_name'][$i], $attachments['name'][$i]);
                }
            }
        }

        // E-Mail-Inhalt
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br($message);

        $mail->send();
        echo 'Nachricht wurde gesendet';
    } catch (Exception $e) {
        echo "Nachricht konnte nicht gesendet werden. Fehler: {$mail->ErrorInfo}";
    }
}
?>