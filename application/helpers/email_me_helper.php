<?php

function send_html_email($email, $subject,$email_body) {
//    echo $email_body;
//    $email='developersnepal@gmail.com';

//$headers = "From: " . strip_tags("noreply@pmmax.net") . " \r\n";
//$headers .= "Reply-To: ". strip_tags("noreply@pmmax.net")  . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
//$headers .= "MIME-Version: 1.0\r\n";
//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html\r\n";
    // Additional headers
    $headers .= 'To:' . "\r\n";
    $headers .= 'From: Admin <info@pmmax.net>' . "\r\n";
    mail($email, $subject, $email_body, $headers);
}
