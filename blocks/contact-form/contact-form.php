<?php
 
    // Collect the data from the form.
    $full_name = htmlspecialchars($_POST["name-input"]);
    $email = htmlspecialchars($_POST["email-input"]);
    $subject = htmlspecialchars($_POST["subject-input"]);
    $message = htmlspecialchars($_POST["message-input"]);

    // Paste your mail here.
    $myemail = "appsdev@indianic.com";
 
    // Setting a content type.
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8";
   
    // The message title which will be displayed in your mail box.
    $mail_subject = "New message from VSApp!";

    // Get the HTML template
    $html_template = file_get_contents('../../mail-template.html');


    // Injecting variables in the HTML template
    $html_template = str_replace('<% fullName %>', $full_name, $html_template);
    $html_template = str_replace('<% email %>', $email, $html_template);
    $html_template = str_replace('<% subject %>', $subject, $html_template);
    $html_template = str_replace('<% message %>', $message, $html_template);
   
    // Send the mail.
    mail($myemail, $mail_subject, $html_template, $headers);

?>