<?php

if (isset($_POST['Email'])) {

   // EDIT THE 2 LINES BELOW AS REQUIRED
   $email_to = "nicolejeffries0118@gmail.com";
   $email_subject = "New form submissions";

   function problem($error)
   {
       echo "We are very sorry, but there were error(s) found with the form you submitted. ";
       echo "These errors appear below.<br><br>";
       echo $error . "<br><br>";
       echo "Please go back and fix these errors.<br><br>";
       die();
   }

   // validation expected data exists
   if (
       !isset($_POST['name']) ||
       !isset($_POST['type']) ||
       !isset($_POST['type2']) ||
       !isset($_POST['email']) ||
       !isset($_POST['number']) ||
       !isset($_POST['inputAddress']) ||
       !isset($_POST['city']) ||
       !isset($_POST['message'])
   ) {
       problem('We are sorry, but there appears to be a problem with the form you submitted.');
   }

   $name = $_POST['name']; // required
   $type = $_POST['type']; // required
   $type2 = $_POST['type2']; // required
   $email = $_POST['email']; // required
   $number = $_POST['number']; // required
   $inputAddress = $_POST['inputAddress']; // required
   $city = $_POST['city']; // required
   $message = $_POST['message']; // required

   $error_message = "";
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

   if (!preg_match($email_exp, $email)) {
       $error_message .= 'The Email address you entered does not appear to be valid.<br>';
   }

   $string_exp = "/^[A-Za-z .'-]+$/";

   if (!preg_match($string_exp, $name)) {
       $error_message .= 'The Name you entered does not appear to be valid.<br>';
   }

   if (strlen($message) < 2) {
       $error_message .= 'The Message you entered do not appear to be valid.<br>';
   }

   if (strlen($error_message) > 0) {
       problem($error_message);
   }

   $email_message = "Form details below.\n\n";

   function clean_string($string)
   {
       $bad = array("content-type", "bcc:", "to:", "cc:", "href");
       return str_replace($bad, "", $string);
   }

   $email_message .= "Name: " . clean_string($name) . "\n";
   $email_message .= "Email: " . clean_string($email) . "\n";
   $email_message .= "Message: " . clean_string($message) . "\n";

   // create email headers
   $headers = 'From: ' . $email . "\r\n" .
       'Reply-To: ' . $email . "\r\n" .
       'X-Mailer: PHP/' . phpversion();
   @mail($email_to, $email_subject, $email_message, $headers);


// Check for empty fields
// if(empty($_POST['name'])      ||
//    empty($_POST['email'])     ||
//    empty($_POST['phone'])     ||
//    empty($_POST['message'])   ||
//    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
//    {
//    echo "No arguments Provided!";
//    return false;
//    }
   
// $name = strip_tags(htmlspecialchars($_POST['name']));
// $type = strip_tags(htmlspecialchars($_POST['type']));
// $type2 = strip_tags(htmlspecialchars($_POST['type2']));
// $email_address = strip_tags(htmlspecialchars($_POST['email']));
// $phone = strip_tags(htmlspecialchars($_POST['phone']));
// $address = strip_tags(htmlspecialchars($_POST['address']));
// $city = strip_tags(htmlspecialchars($_POST['city']));
// $message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
// $to = 'nicolejeffries0118@gmail.com'; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
// $headers = "From: noreply@yourdomain.com"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";   
// mail($to,$email_subject,$email_body,$headers);
// return true;         
?>