<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once("php/PHPMailer.php");
require_once("php/Exception.php");
require_once("php/POP3.php");
require_once("php/SMTP.php");
require_once("email.php");
class email
{
    public static function send($head,$html,$text,$addr,
                                $mail_host,
                                $mail_user,
                                $mail_pass,
                                $mail_port,
                                $mail_from,
                                $mail_name,
                                $mail_dbug)
    {
        $mail = new PHPMailer(true);
        try {
            echo $mail_pass; 
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->isSMTP();                                     
            $mail->Host       = $mail_host;             
            $mail->SMTPAuth   = true;                            
            $mail->Username   = $mail_user;             
            $mail->Password   = $mail_pass;                       
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
            $mail->Port       = $mail_port;                             
            $mail->setFrom($mail_from,$mail_name);
            $mail->addAddress($addr);
            //-----------------------------------------------------
            //$mail->addAddress('joe@example.net', 'Joe User');
            //$mail->addAddress('ellen@example.com'); 
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
            //$mail->addAttachment('/var/tmp/file.tar.gz');
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 
            //-----------------------------------------------------
            $mail->isHTML(true);
            $mail->Subject = $head;
            $mail->Body    = $html;
            $mail->AltBody = $text;
            $mail->send();
            echo '<br />['.$mail_dbug.']????????????????????????'.$addr;
            return '['.$mail_dbug.']????????????????????????'.$addr;
        } 
        catch (Exception $e) {
            echo '<br />['.$mail_dbug.']????????????????????????'.$addr;
            echo '<br />['.$mail_dbug.']???????????????'.$mail->ErrorInfo;
            return '['.$mail_dbug.']????????????????????????'.$addr;
        }
    }
}
if($_POST['name']== '' )
{
    echo "<script>alert('???????????????')</script>";
    echo "<script>history.go(-1);</script>";  
}
elseif ( $_POST['pnum'] == '') {
    echo "<script>alert('???????????????')</script>";
    echo "<script>history.go(-1);</script>";   
}
elseif ( $_POST['mail'] == '') {
    echo "<script>alert('???????????????')</script>";
    echo "<script>history.go(-1);</script>";   
}
elseif ( $_POST['qqid'] == '') {
    echo "<script>alert('?????????qq???')</script>";
    echo "<script>history.go(-1);</script>";   
}
elseif ( $_POST['text'] == '') {
    echo "<script>alert('???????????????')</script>";
    echo "<script>history.go(-1);</script>";   
}
else{
    $title = "??????????????????????????????????????????????????????????????????";
    $htmls = "<h1>?????????????????????".$_POST['name']."???????????????</h1>"
             ."<br />?????????".$_POST['name']
             ."<br />?????????".$_POST['pnum']
             ."<br />?????????".$_POST['mail']
             ."<br />QQ??????".$_POST['qqid']
             ."<br />?????????".$_POST['selt']
             ."<br />?????????".$_POST['text'];
    $plain = "";
        if($_POST['selt']=='?????????')$email = $selt_wxbm;
    elseif($_POST['selt']=='?????????')$email = $selt_yfbm;
    elseif($_POST['selt']=='?????????')$email = $selt_xzbm;
    elseif($_POST['selt']=='?????????')$email = $selt_sjbm;
    elseif($_POST['selt']=='?????????')$email = $selt_bjbm;
    else                            $email = $selt_alls;
    $posts = email::send($title,
                         $htmls,
                         $plain,
                         $email,
                         $mail_host,
                         $mail_user,
                         $mail_pass,
                         $mail_port,
                         $mail_from,
                         $mail_name,
                         $mail_dbug);
    echo "<script>alert('???????????????')</script>";
    echo "<script>history.go(-1);</script>";
}

?>