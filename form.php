<?php
isset($_POST['email']) ? $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : exit();
isset($_POST['subject']) ? $subject = htmlspecialchars($_POST['subject']) : exit();
isset($_POST['text']) ? $text = htmlspecialchars($_POST['text']) : exit();

$addres = "info@amma.vc";
$subject = "Message from site amma.vc";
 
$send = mail(
    $addres,
    htmlspecialchars_decode($subject),
    htmlspecialchars_decode($text),
    "Content-type:text/plain; charset = utf-8",
);

ini_set('short_open_tag', 'On');
header('Refresh: 100; URL=index.html');

if ($addres && $subject && $text && $send) {
    $_SESSION['card'] = [
        'style' => 'success',
        'title' => 'Well done!',
        'head_p' => 'Aww yeah, you successfully send your message for owner of site amma.vc to info@amma.vc. Your message will be reviewed shortly and you will be contacted to clarify all the details.',
        'footer_p' => 'Thanks for your message!',
    ];
}
else {
    $_SESSION['card'] = [
        'style' => 'danger',
        'title' => 'Error',
        'head_p' => "We're sorry, but your message was not delivered because an error occurred while processing it. Try to send the message again, if the error persists please contact us by another means of communication.",
        'footer_p' => 'We are very sorry for that...',
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_SESSION['card']['title']?></title>
    <style>
        .alert {
            position: relative;
            padding: 1rem 1rem;
            margin: 0 auto;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            max-width: 500px;
        }
        .alert-success {
            color: #0f5132;
            background-color: #d1e7dd;
            border-color: #badbcc;
        }
        .alert-danger {
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
        }
        h4 {
            margin-block-start: .5rem;
            font-size: 3rem;
        }
        p {
            font-size: 1.5rem;
            line-height: 2rem;
        }
        hr:not([size]) {
            height: 2px;
        }
        .mb-0 {
            margin-bottom: 0!important;
            font-size: 2rem;
            line-height: 2.5rem;
        }
    </style>
</head>
<body>
    <div class="alert alert-<?=$_SESSION['card']['style']?>" role="alert">
        <h4 class="alert-heading"><?=$_SESSION['card']['title']?></h4>
        <p><?=$_SESSION['card']['head_p']?></p>
        <hr>
        <p class="mb-0"><?=$_SESSION['card']['footer_p']?></p>
    </div>
</body>
</html>