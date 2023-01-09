<?php
    // PHPMailer
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    require '../PHPMailer/Exception.php';

    if ($_POST['name'] == '' || $_POST['email'] == '' || $_POST['message'] == '') {
        echo json_encode(
            array('nullError' => 'Please fill in all fields', )
        );
        
        http_response_code(500);
        return;
    } else {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
    
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only // 0 - off (for production use, No debug messages)
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587; // or 587
        $mail->IsHTML(true);
        $mail->Username = "lexicalpay@gmail.com";
        $mail->Password = "pziuutpnzsxzmlce";
        $mail->SetFrom($_POST['email'], $_POST['name']);
        $mail->Subject = $_POST['name'].' needs help';
        $mail->Body = '<div style="text-align: center;border: 3px solid #130999;border-radius: 15px;padding: 2% 5% 5% 5%;background-color: #ccc;"><b>Client Email Address:</b> '. $_POST['email'] . '<br><br><p style="font-size: 25px">' . $_POST['message'] . '</p></div>';
        $mail->AddAddress("lexicalpay@gmail.com", "Lexical Pay");
    
         if( !$mail->Send() ) {
            echo json_encode(
                array('networkError' => 'Network error, please try again.', )
            );
            
          http_response_code(500);
         } else {
          http_response_code(200);
         }
    }
