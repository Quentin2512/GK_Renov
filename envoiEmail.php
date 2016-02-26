<?php
    
   require_once "Mail.php";

    $from = "<q.hertereau@gmail.com>";
    $to = "<quentin.hertereau@hotmail.fr>";
    
    $nom = utf8_encode($_GET["nom"]);
    $prenom = $_GET["prenom"];
    $object = $_GET["object"];
    $text = utf8_decode($_GET["text"]);
    $tel = $_GET["tel"];
    $email = $_GET["email"];
    

    $host = "ssl://smtp.gmail.com";
    $port = "465";
    $username = "q.hertereau@gmail.com";
    $password = "kentin12";

    $headers = array ('From' => $from,
      'To' => $to,
      'Subject' => $object);
    $smtp = @Mail::factory('smtp',
      array ('host' => $host,
        'port' => $port,
        'auth' => true,
        'username' => $username,
        'password' => $password));

    
    if ($tel=="")
        $tel = "Non Renseigné";
    $corp =$nom." ".$prenom."\n\n".$text."\n\nTel: ".utf8_decode($tel)."\nEmail: ".$email;
   
    $mail = @$smtp->send($to, $headers, $corp);
    if (PEAR::isError($mail)) {
      echo("<p>" . $mail->getMessage() . "</p>");
    } else {
      echo("<p>Message successfully sent!</p>");
    }
      