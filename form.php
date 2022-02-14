<?php
isset($_POST['email']) ? $email = htmlspecialchars($_POST['email']) : exit();
isset($_POST['subject']) ? $subject = htmlspecialchars($_POST['subject']) : exit();
isset($_POST['text']) ? $text = htmlspecialchars($_POST['text']) : exit();

$addres = "info@amma.vc";
 
$mes = "Message from site AMMA\nFrom: $email\nSubject: $subject\nText: $text";
 
$send = mail ($addres,$mes,"Content-type:text/plain; charset = utf-8");

ini_set('short_open_tag', 'On');
header('Refresh: 3; URL=index.html');
?>