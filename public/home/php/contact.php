<?php
session_start(); 
$site_name = "EXCPTION Template";
if($_POST){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $message=$_POST['message'];
 
if(isset($_POST['email'])) {
    $email_to = "email@your-domain.com";
    $email_subject = "Contact Us Email from : ".$site_name;
    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
    if(isset($_POST['captcha'])) {
        if( empty($_SESSION['captcha']['code'] ) || strcasecmp($_SESSION['captcha']['code'], $_POST['captcha_input']) != 0 ){
            died(' The captcha code does not match! ');
        } 
    }
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $message = $_POST['message']; // required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
  if(strlen($message) < 2) {
    $error_message .= 'The message you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    //$email_message = '<html><body><div>';
    $email_message = "Contact us message details below: \n\n";
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "phone: ".clean_string($phone)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
    //$email_message .='</div></body></html>';
    // email header
    $_header = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, '=?UTF-8?B?'.base64_encode($email_subject).'?=', $email_message, $_header . $headers);  
    $result=1;

    if($result){
        echo "Thanks ".clean_string($name)." We'll get back to you soon.";
    }
}
   
exit();
}
?>