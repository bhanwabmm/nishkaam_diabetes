<?php
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

// Validate required fields
if (empty($name) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
    echo "<script>window.location.href='index.html?status=error';</script>";
    exit;
}

$email_message = "
Name: $name
Email: $email
Phone: $phone
Subject: $subject
Message: $message
";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email and redirect with status
if (mail("pseemachawla@gmail.com", "Message from Nishkaam Website", $email_message, $headers)) {
    echo "<script>window.location.href='index.html?status=success';</script>";
} else {
    echo "<script>window.location.href='index.html?status=error';</script>";
}
?>
