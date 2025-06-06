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
if (empty($name))
    $empty[] = "Name";
if (empty($email))
    $empty[] = "Email";
if (empty($phone))
    $empty[] = "Phone Number";
if (empty($message))
    $empty[] = "Message";

//RECTIFY THE INPUTS FOR SQL/PYTHON INJECTION
$forbiddenWords = '/\b(select|update|eval|delete|insert|drop|alter|truncate)\b/i'; // Regular expression for keywords (case-insensitive)
if (preg_match($forbiddenWords, $name . $message . $phone)) {
    $empty[] = urlencode("Suspicious input detected.");
}

//RECTIFY THE INPUTS BASED ON LENGHT
if (strlen($name) > 25) {
    $empty[] = urlencode("Invalid name length");
}
if (strlen($phone) > 15) {
    $empty[] = urlencode("Invalid phone number length");
}
if (strlen($message) > 200) {
    $empty[] = urlencode("Message too long");
}

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

        // --- Log Submission to a File ---
        // Prepare data to store
        $dt = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $timestamp = $dt->format('Y-m-d H:i:s');
        
        $csvData = [
            $timestamp,
            $name,
            $email,
            $phone,
            $message,
            $field_ip
        ];

        // File path (put outside public folder in real hosting)
        $file = __DIR__ . '/submissions.csv';

        // Check if file exists to write headers
        $writeHeader = !file_exists($file);

        // Open file for appending
        $fp = fopen($file, 'a');

        if ($fp) {
            if ($writeHeader) {
                fputcsv($fp, ['Date', 'Name', 'Email', 'Phone', 'Message', 'IP']);
            }
            fputcsv($fp, $csvData); // Write the submission
            fclose($fp);
        } else {
            error_log("⚠️ Could not open file to write CSV: $file");
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