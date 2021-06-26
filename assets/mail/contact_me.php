<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$subject = "\"Website Contact Form: \"".$name;
$body = "\"You sent a message from Atsushi's portfolio website contact form. Please wait for contact\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message\"";

$cmd = "export LC_CTYPE=ja_JP.UTF-8;echo ".$body." | mail -s ".$subject." -b norwayforest3345@gmail.com"." ".$email;
exec($cmd);
?>