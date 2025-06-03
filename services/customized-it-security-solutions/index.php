

<?php
//START SESSION
session_start();
require_once __DIR__ . '/../../config.php';

//CHECK FOR SESSION MESSAGES
if (isset($_SESSION["ack_message"])) {
    if ($_SESSION["ack_message"] == 'success') {
        $ack_message = "success";
    } else {
        $ack_message = $_SESSION["ack_message"];
    }

    //UNSET IT AFTER ASSIGNING TO VARIABLE
    // unset($_SESSION["ack_message"]);
} else {
    $ack_message = "";
}

$form_disabled = ($ack_message !== "") ? 'disabled' : '';
?>


<!doctype html>

<html lang="en">

<?php
$page_title = "Custom IT & Security Solutions Dubai | Tailored Technology Integration";
$og_url = "https://www.aremak.com/services/customized-it-security-solutions";

include "../header.php";
?>

<body>

    <?php
    include('../navbar.php');
    ?>

    <!-- HEADER -->
    <section class="bg-image d-flex align-items-center"
            style="background-image: url('../images/services/4.webp'); height: 100vh; background-size: cover; background-position: center;">
            <div class="mask w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.7);">
                <div class="container text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="hero-heading">Customized IT Security Solutions</h1>
                        </div>
                        <div class="col-md-6 my-auto">
                            <p class="hero-paragraph">
                                <span id="typewriter-text"></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- HEADER -->

    <!-- INTRO -->
    <section class="bg-white py-5">
        <div class="container">
            <p>
                At Aremak, we understand that each organization has unique security challenges. That’s why we offer
                customized IT security solutions to meet the specific needs of businesses across Dubai and the UAE.
            </p>
            <p>
                From small enterprises to government projects, our certified experts design, implement, and maintain
                multi-layered cybersecurity systems that defend against modern threats.
            </p>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <h2 class="text-primary">Our IT Security Services</h2>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li><strong>Network Security Assessments</strong><br>Comprehensive audits to identify
                            vulnerabilities and recommend solutions.</li>
                        <li><strong>Firewall Configuration & Management</strong><br>Setup and ongoing monitoring of
                            secure firewall systems.</li>
                        <li><strong>Intrusion Detection & Prevention Systems (IDPS)</strong><br>Real-time monitoring to
                            detect and block suspicious activity.</li>
                        <li><strong>Endpoint Security Solutions</strong><br>Antivirus, malware protection, and policy
                            enforcement for devices.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li><strong>Email Security & Anti-Phishing</strong><br>Spam filtering, encryption, and threat
                            detection for corporate emails.</li>
                        <li><strong>Remote Access & VPN</strong><br>Secure remote connectivity for distributed teams and
                            offices.</li>
                        <li><strong>SIEM & Log Management</strong><br>Centralized monitoring and analytics for security
                            events.</li>
                        <li><strong>Compliance Audits</strong><br>Support for ISO 27001, GDPR, and local regulatory
                            standards.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="bg-white py-5">
        <div class="container">
            <?php
            include('../form.php');
            ?>
        </div>
    </section>

    <?php
    include('../footer.php');
    ?>

    <script src="../../js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const text = "Tailored IT security that fits your business like a digital glove";
            const target = document.getElementById("typewriter-text");
            let i = 0;

            function typeWriter() {
                if (i < text.length) {
                    target.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(typeWriter, 30); // adjust speed here
                }
            }

            typeWriter();
        });
    </script>
</body>

</html>