<?php
session_start();
include_once 'header.php';
 
if(isset($_POST['email'])) {
 
 
    $email_to = "jua4@cornell.edu";
 
 
    $name = $_POST['name']; 
    
    $email_subject= $_POST['subject'];
    
    $email_from = $_POST['email']; 
 
    $phoneNumber = $_POST['phoneNumber']; 
 
    $body = $_POST['body'];

 
    $email_message = "Sent from online.\n";
 
    $email_message .= "Name: ".$name."\n";
 
    $email_message .= "Email: ".$email_from."\n";
 
    $email_message .= "Phone Number: ".$phoneNumber."\n";
 
    $email_message .= "Message Body: ".$body."\n";
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  

echo "Thanks for the email!";

}

?>
</div>
</body>
</html>