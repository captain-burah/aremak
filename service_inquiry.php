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
$page_url = htmlspecialchars(trim($_POST["page_url"]), ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars(trim($_POST["phone"]), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars(trim($_POST["message"]), ENT_QUOTES, 'UTF-8');
$field_ip = $_SERVER['REMOTE_ADDR'];


$empty = [];

// Basic validation
if (empty($name))
    $empty[] = "Name";
if (empty($page_url))
    $empty[] = "page_url";
if (empty($email))
    $empty[] = "Email";
if (empty($phone))
    $empty[] = "Phone Number";
if (empty($message))
    $empty[] = "Message";

//RECTIFY THE INPUTS FOR SQL/PYTHON INJECTION
$forbiddenWords = '/\b(select|update|eval|delete|insert|drop|alter|truncate)\b/i'; // Regular expression for keywords (case-insensitive)
if (preg_match($forbiddenWords, $name . $message . $phone . $page_url)) {
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

            $mail->addAddress("info@aremakuae.com", "Aremak Notifications");


            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Aremak Notifications';

            $mail->Body = '
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
                    <h2 style="color: #003366; border-bottom: 2px solid #ffcc00; padding-bottom: 10px;">📩 Aremak Website Contact Inquiry</h2>
                    <p style="font-size: 16px; color: #333;"><strong>✨ New inquiry received via the contact form!</strong></p>

                    <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                        <tr>
                            <td style="padding: 8px; font-weight: bold; color: #003366;">Name:</td>
                            <td style="padding: 8px; color: #333;">' . htmlspecialchars($name) . '</td>
                        </tr>
                        <tr style="background-color: #f1f1f1;">
                            <td style="padding: 8px; font-weight: bold; color: #003366;">Phone:</td>
                            <td style="padding: 8px; color: #333;">' . htmlspecialchars($phone) . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px; font-weight: bold; color: #003366;">Email:</td>
                            <td style="padding: 8px; color: #333;">' . htmlspecialchars($email) . '</td>
                        </tr>
                        <tr style="background-color: #f1f1f1;">
                            <td style="padding: 8px; font-weight: bold; color: #003366;">IP Address:</td>
                            <td style="padding: 8px; color: #333;">' . htmlspecialchars($field_ip) . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px; font-weight: bold; color: #003366;">Inquiry Page:</td>
                            <td style="padding: 8px; color: #333;">' . htmlspecialchars($page_url) . '</td>
                        </tr>
                        <tr style="background-color: #f1f1f1;">
                            <td style="padding: 8px; font-weight: bold; color: #003366; vertical-align: top;">Message:</td>
                            <td style="padding: 8px; color: #333;">' . nl2br(htmlspecialchars($message)) . '</td>
                        </tr>
                    </table>

                    <p style="margin-top: 20px; font-size: 14px; color: #999;">This message was sent from your website contact form. Please do not reply directly to this email.</p>
                </div>
            ';

            $mail->AltBody = "Aremak Website Contact Page Inquiry\n\n" .
                "Name: $name\n" .
                "Phone: $phone\n" .
                "Email: $email\n" .
                "IP Address: $field_ip\n" .
                "Inquiry Page: $page_url\n" .
                "Message: $message";


            $response = $mail->send();

            //RETURN TO PAGE WITH SESSION STATUS
            $_SESSION["ack_message"] = "success";
            header("Location: " . $page_url);
            // header("Location: contact/index.php?ack_message=".urlencode("success"));
            // echo "Message has been sent";
            // Clear session and exit to prevent further processing
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