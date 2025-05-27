<?php
session_start();
clearstatcache();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//GET GLOBAL VARIABLES
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';



//READ THE POST REQUESTS
$reCaptchaToken = $_POST['recaptcha_token'];
$name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars(trim($_POST["phone"]), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars(trim($_POST["message"]), ENT_QUOTES, 'UTF-8');
$field_ip = $_SERVER['REMOTE_ADDR'];


$empty = [];

// Basic validation
if (empty($name))     $empty[] = "Name";
if (empty($email))    $empty[] = "Email";
if (empty($phone))    $empty[] = "Phone Number";
if (empty($message))  $empty[] = "Message";

//RECTIFY THE INPUTS FOR SQL/PYTHON INJECTION
$forbiddenWords = '/\b(select|update|eval|delete|insert|drop|alter|truncate)\b/i'; // Regular expression for keywords (case-insensitive)
if (preg_match($forbiddenWords, $name . $message . $phone)) {
    $empty[] = urlencode("Suspicious input detected.");
}

//RECTIFY THE INPUTS BASED ON LENGHT
if(strlen($name) > 25){$empty[] = urlencode("Invalid name length");}
if(strlen($phone) > 15){$empty[] = urlencode("Invalid phone number length");}
if(strlen($message) > 200){$empty[] = urlencode("Message too long");}

//RETURN ANY INVALIDATION
if (!empty($empty)) {
    $output = json_encode(implode(", ", $empty));
    header("Location: /index.php");
    // header("Location: contact/index.php?ack_message=".urlencode($output));      
    exit;

} else {

    //PRE-CONFIGURE RECAPTCHA VALIDATION
    $postArray = array(
        'secret' => Config::GOOGLE_RECAPTCHA_SECRET_KEY,
        'response' => $reCaptchaToken
    );
    $postJSON = http_build_query($postArray);

    //VERIFY THE RECAPTCHA
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);
    $response = curl_exec($curl);
    curl_close($curl);

    //GET RESPONSE AND VALIDATE THE RESPONSE
    $curlResponseArray = json_decode($response, true);



    if ($curlResponseArray["success"] == true && $curlResponseArray["score"] >= 0.5) {

        //OPEN THE MAILER FUNCTION
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = false;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'box2370.bluehost.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'notifications@devhub.aremakuae.com';                     //SMTP username
            $mail->Password = 'notifications_2025';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;

            //Recipients
            $mail->From = "notifications@devhub.aremakuae.com";
            $mail->FromName = "Aremak Notifications";

            $mail->addAddress("cptburah@gmail.com", "Captain Burah");


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Aremak Notifications';
            $mail->Body = ' <b>Aremak Website Contact Page Inquiry </b> 
                <br><br> Name: ' . $name . ' 
                <br><br> Phone: ' . $phone . ' 
                <br><br> Email: ' . $email . '
                <br><br> IP Address: ' . $field_ip . '
                <br><br> Inquiry Message: ' . $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $response = $mail->send();

            //RETURN TO PAGE WITH SESSION STATUS
            $_SESSION["ack_message"] = "success";
            // header("Location: thank-you");      
            header("Location: /thank-you");
            exit;

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        $output = "success";

    } else {
        $output = "Invalid request";
    }

    //RETURN TO PAGE WITH SESSION STATUS
    // $_SESSION["ack_message"] = $output;
    // header("Location: contact/");
}
?>