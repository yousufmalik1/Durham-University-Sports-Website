<?php
/**
 * Created by Visual Studio Code.
 * User: ZHENG CHENGLONG
 * Date: 2019-05-12
 * Time: 17: 20
 */

/*发送邮件方法
 *@param $to：接收者 $title：标题 $content：邮件内容
 *@return bool true:发送成功 false:发送失败
 */

function sendMail($to,$title,$content){

    require_once("phpmailer/class.phpmailer.php"); 
    require_once("phpmailer/class.smtp.php");

    $mail = new PHPMailer();
    $mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->SMTPAuth=true;
    $mail->Host = 'smtp.qq.com';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->Hostname = 'http://www.lsgogroup.com';
    $mail->CharSet = 'UTF-8';
    
    $mail->FromName = 'DUS-Team1';
    
    $mail->Username ='1403823902@qq.com';    
    $mail->Password = 'kipwmjngdjshhdeb';
    $mail->From = '1403823902@qq.com';
    
    $mail->isHTML(true); 
    $mail->addAddress($to,'Your Booking');
    $mail->Subject = $title;
    $mail->Body = $content;
    // $mail->addAttachment('./d.jpg','mm.jpg');
    
    $status = $mail->send();
    
    if($status) {
        return true;
    }else{
        return false;
    }
}

?>