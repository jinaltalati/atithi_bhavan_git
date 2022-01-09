<?php
function sendEmail($email, $subject, $message, $attachments='', $attachFileDirPath='') {    
    $email = 'sandip79patel@gmail.com';
    $mail = null;
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    try {
        $mail->Host = "smtp.gmail.com"; // SMTP server
        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        // sets the SMTP server
        $mail->Port = 587;                    // set the SMTP port for the GMAIL server
        $mail->Username = "csf2fsurvey@gmail.com"; // SMTP account username
        $mail->Password = "Ccp@1234";        // SMTP account password

        if (is_array($email)) {
            foreach ($email as $key => $val) {
                $mail->AddBCC($val);
            }
        } else {
            $mail->AddAddress($email);
        }
        if (!empty($attachFileDirPath) && $attachments != "") {
            $mail->AddAttachment($attachFileDirPath . '/' . $attachments, $attachments);
        }

        $mail->SetFrom('csf2fsurvey@gmail.com', 'Survey');
        $mail->Subject = $subject;
//                $mail->AddEmbeddedImage('uploads/'.$res['user_img'], 'prf');
//                                <img height='100' width='100' style='border 5px solid gray;' src='cid:prf' alt='' />
        $mail->MsgHTML($message);
        echo $mail->Send();
    } catch (Eception $e) {
        echo $e;
    }
    $mail->ClearAllRecipients();
}

?>