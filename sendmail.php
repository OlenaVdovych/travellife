<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    required 'phpmailer/phpmailer-6.2.0/src/Exception.php';
    required 'phpmailer/phpmailer-6.2.0/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('en', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setForm('infotravellife5@gmail.com');
    $mail->addAddress('travellife515@gmail.com');
    $mail->Subject = 'Hello! It`s your letter!';

    $body = '<h1>Meet the super letter</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Name:</strong> '.$_PoST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>E-mail::</strong> '.$_PoST['email'].'</p>';
    }
    if(trim(!empty($_POST['subject']))){
        $body.='<p><strong>Subject:</strong> '.$_PoST['subject'].'</p>';
    }
    if(trim(!empty($_POST['message']))){
        $body.='<p><strong>Message:</strong> '.$_PoST['message'].'</p>';
    }

    if(!empty($_FILES['image']['tmp_name'])){
        $filePath = __DIR__ . "/files/" . $_FILES['image']['name'];

        if (copy($_FILES['image']['tmp_name'], $filePath)){
            $fileAttach = $filePath;
            $body.='<p><strong>Photo in app</strong></p>';
            $mail->addAttachment($fileAttach);
        }
    }

    $mail->BODY = $body;

    if (!$mail->send()) {
        $message = 'Error';
    } else {
        $message = 'Data sent';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
    ?>