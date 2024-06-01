<?php
$to       = 'ankur@edunetfoundation.org';

$subject  = 'Mail from Ajit for testing purpose!';

$message  = 'This mail is from Ajit kumar by using the wamp server.';

$headers  = 'From:ajitme92@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
            
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";