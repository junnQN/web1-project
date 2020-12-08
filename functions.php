<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sum($a, $b)
{
    return $a + $b;
}
// đọc file
/* $members = array();
$file = './data.txt';
if (file_exists($file)) {
    $r = fopen($file, "r");
    while (!feof($r)) {
        $row = fgets($r);
        if (!empty($row)) {
            $members[] = explode('|', $row);
        }
    }
} */
function activateUser($id)
{
    global $db;
    $stmt = $db->prepare("UPDATE users set code = NULL WHERE id = ?");
    $stmt->execute(array($id));
}

function findUserById($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users where id=?");
    $stmt->execute(array($id));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findTrangThaiById($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM trangthai where userId=?");
    $stmt->execute(array($id));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findUserByEmail($email)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users where email=?");
    $stmt->execute(array($email));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createUser($email, $password, $code)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO users (email, `password`, code) VALUES (?, ?, ?)");
    $stmt->execute(array($email, $password, $code));
    return findUserById($db->lastInsertId());
}
function createTrangThaiUser($content, $userId)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO trangthai (content, userId) VALUES (?, ?)");
    $stmt->execute(array($content, $userId));
    return findUserById($db->lastInsertId());
}

function changePassword($newPassword, $id)
{
    global $db;
    $sql = ("UPDATE users set password = '$newPassword' where id = '$id'");
    $db->exec($sql);
}
function resetPassword($code, $id)
{
    global $db;
    $sql = ("UPDATE users set code = '$code' where id = '$id'");
    $db->exec($sql);
}
function getCurrentuser()
{
    if (isset($_SESSION['userId'])) {
        return findUserById($_SESSION['userId']);
    }
    return null;
}
function resizeImage($filename, $max_width, $max_height)
{
    list($orig_width, $orig_height) = getimagesize($filename);

    $width = $orig_width;
    $height = $orig_height;

    # taller
    if ($height > $max_height) {
        $width = ($max_height / $height) * $width;
        $height = $max_height;
    }

    # wider
    if ($width > $max_width) {
        $height = ($max_width / $width) * $height;
        $width = $max_width;
    }

    $image_p = imagecreatetruecolor($width, $height);

    $image = imagecreatefromjpeg($filename);

    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

    return $image_p;
}

function requireLoggedIn()
{
    global $currentUser;
    if (!$currentUser) {
        header("Location: login.php");
        exit();
    }
}
function sendEmail($to, $subject, $content)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'dinhkhoi19071999@gmail.com';                     // SMTP username
        $mail->Password   = 'Dinhkhoi19071999.';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('mkgketban123@gmail.com', 'mkgketban123');
        $mail->addAddress($to);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
