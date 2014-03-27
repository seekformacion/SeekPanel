<?php

require_once "Mail.php";


 $from = "yo <contenidos@seekformacion.com>";
 $to = "Eduardo Buenadicha <e.b.moya@gmail.com>";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";
 
 $host = "mrpotato.theservercluster.com";
 $username = "contenidos@seekformacion.com";
 $password = "seek2014";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }


?>