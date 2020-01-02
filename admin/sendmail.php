<?php
$to = "$mail";
$subject = "Send Email from Localhost";
$message="Đường link kích hoạt : \r\n";
$message.="hello a ton\r\n";
$message.="http://localhost/PHP/baithi/admin/active.php?passkey=$code"; 
$headers = "From: nguyenton12345678900@gmail.com";  

$mail  = mail($to,$subject,$message,$headers);
if($mail)
{
    echo "Link đã được gửi vào mail bạn";
}
else
{
    echo "dell đc ms vl";   
}

?>
