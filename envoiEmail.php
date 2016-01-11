<?php
    
   require_once "Mail.php";

    $from = "<q.hertereau@gmail.com>";
    $to = "<quentin.hertereau@hotmail.fr>";
    $subject = "Hi!";
    $body = "Hi,\n\nHow are you?";

    $host = "ssl://smtp.gmail.com";
    $port = "465";
    $username = "<q.hertereau@gmail.com>";
    $password = "kentin2512";

    $headers = array ('From' => $from,
      'To' => $to,
      'Subject' => $subject);
    $smtp =& Mail::factory('smtp',
      array ('host' => $host,
        'port' => $port,
        'auth' => true,
        'username' => $username,
        'password' => $password));

    $mail = $smtp->send($to, $headers, $body);
    if (PEAR::isError($mail)) {
      echo("<p>" . $mail->getMessage() . "</p>");
    } else {
      echo("<p>Message successfully sent!</p>");
    }
    
    /*$nom = utf8_encode($_GET["nom"]);
    $prenom = $_GET["prenom"];
    $object = $_GET["object"];
    $text = utf8_decode($_GET["text"]);
    $tel = $_GET["tel"];
    $email = $_GET["email"];
    
    if ($tel=="")
        $tel = "non renseigner";
    $corp =$nom." ".$prenom."<br/>".$text."<br/>Tel: ".$tel."<br/>Email: ".$email;
   
    if( mail('quentin.hertereau@hotmail.fr', $object, $corp))
        echo"envoyer";
    else 
        echo "pb envoi";*/
    
?>
