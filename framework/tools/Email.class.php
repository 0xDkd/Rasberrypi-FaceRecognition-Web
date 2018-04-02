<?php

namespace framework\tools;

use framework\vendor\PHPMailer\PHPMailer;

/*
 * Use PHPMailer to send Email
 */

class Email
{
    /**
     * SEND FUNCTION
     * @param $title Email title
     * @param $content Email Content
     * @param $getter Email destination
     * @return bool|string
     * @throws \framework\vendor\PHPMailer\phpmailerException
     */
    public static function send($title, $content, $getter)
    {
        $mail = new PHPMailer();

        //3.Set Param
        $mail->IsSMTP();            //Use SMTP
        $mail->SMTPAuth = true;        //Use SMTP
        $mail->Host = $GLOBALS['config']['email_host'];    //SET host
        $mail->SMTPSecure = $GLOBALS['config']['email_safe'];
        $mail->Port = $GLOBALS['config']['Port'];       //Port
        $mail->From = $GLOBALS['config']['sender'];    //Set email sender
        $mail->FromName = $GLOBALS['config']['E_nickname'];    //nickname
        $mail->Username = $GLOBALS['config']['account'];    //SMTP ACOUNT ID
        $mail->Password = $GLOBALS['config']['token'];    //SMTP ACOUNT PassWord

        //编辑发送的邮件内容
        $mail->IsHTML(true);        //Content Use HTML
        $mail->CharSet = 'utf-8';        //Content charset
        $mail->Subject = $title;       //Email title
        $mail->MsgHTML($content); //Content
        //destination
        $mail->AddAddress($getter);
        //do sent
        $result = $mail->Send();
        if ($result) {
            return true;
        } else {
            return $mail->ErrorInfo;
        }
    }
}