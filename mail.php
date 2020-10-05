<?php

$to = 'sauravgarg001@gmail.com';
$name = "Saurav Garg";
$email = "sauravgarg001@gmail.com";
$text = "Hello";



$headers = 'MIME-Version: 1.0' . "\r\n";
$header = "From:$email \r\n";
$header .= "Cc:afgh@somedomain.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$message = '<table style="width:100%">
        <tr>
            <td>' . $name . '</td>
        </tr>
        <tr><td>Email: ' . $email . '</td></tr>
        <tr><td>Text: ' . $text . '</td></tr>

    </table>';

if (@mail($to, $email, $message, $headers)) {
    echo 'The message has been sent.';
} else {
    echo 'failed';
}

?>
