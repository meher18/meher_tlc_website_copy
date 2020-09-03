<?php
error_reporting(-1);
$to=$_POST['to'];
$subject=$_POST['subject'];

// the message
$msg = $_POST['message'];


// $msg = str_replace("\n.", "\n..", $msg);
$headers = "From: mehersairamtangudu@gmail.com" . "\r\n" .
"CC: $to";
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

$email = str_replace("@","%40",$to);

// send email
if(mail($email,$subject,$msg))
{
echo $to.$subject.$msg;
};



?>