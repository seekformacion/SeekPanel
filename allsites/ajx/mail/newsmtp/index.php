<?php
$to="user@gmail.com";
$fn="Fisrt Name";
$ln="Last Name";
$name=$fn.' '.$ln;
$from="support@website.com";
$subject = "Welcome to Website";
$message = "Dear $name, 


Your Welcome Message.


Thanks
www.website.com
";
include('smtpwork.php');

?>