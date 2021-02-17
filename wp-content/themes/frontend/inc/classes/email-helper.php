<?php

require get_template_directory() . '/inc/libs/PHPMailer/PHPMailerAutoload.php';

class EmailHelper
{
    function __construct($email_from_address, $email_to_address)
    {
        $this->mail = new PHPMailer(TRUE);
        $this->mail->CharSet = 'UTF-8';

        $this->set_emails($email_from_address, $email_to_address);
    }

    function set_emails($email_from_address, $email_to_address)
    {
        /* Set the mail sender. */
        $this->mail->setFrom($email_from_address, 'Автозайм');

        /* Add a recipient. */
        $this->mail->addAddress($email_to_address, 'MAIL');
    }

    function attach_file($data, $name)
    {
        $this->sendBase64File($data, $name);
    }

    function attach_files($request_data)
    {

        if (count($request_data) > 0) {
            for ($i = 0; $i < count($request_data); $i++) {
                $this->attach_file($request_data[$i]['data'], $request_data[$i]['name']);
            }
        }
    }

    function sendBase64File($base64_data, $filename)
    {
        $data = substr($base64_data, strpos($base64_data, ","));
        $pos  = strpos($base64_data, ';');
        $type = explode(':', substr($base64_data, 0, $pos))[1];
        $encoding = "base64";
        $this->mail->AddStringAttachment(base64_decode($data), $filename, $encoding, $type);
    }

    function send_letter($title_letter, $body_letter)
    {
        /* Open the try/catch block. */
        try {
            /* Set the subject. */
            $this->mail->Subject = $title_letter;

            /* Set the mail message body. */
            $this->mail->Body = $body_letter;

            /* Finally send the mail. */
            $this->mail->send();
        } catch (Exception $e) {
            /* PHPMailer exception. */
            echo $e->errorMessage();
        } catch (\Exception $e) {
            /* PHP exception (note the backslash to select the global namespace Exception class). */
            echo $e->getMessage();
        }
    }
}
