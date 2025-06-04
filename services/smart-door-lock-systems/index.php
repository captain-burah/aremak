

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
$page_title = "Smart Door Lock Systems | Aremak Systems Trading";
$og_url = "https://www.aremak.com/services/smart-door-lock-systems";

include "../header.php";
?>


<body>

<?php
        include('../navbar.php');
    ?>



    <main>

        <!-- HEADER -->
        <section class="bg-image d-flex align-items-center"
            style="background-image: url('../images/services/6.webp'); height: 100vh; background-size: cover; background-position: center;">
            <div class="mask w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.7);">
                <div class="container text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="hero-heading">Smart Door Lock Systems</h1>
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

        <!-- Introduction Section -->
        <section class="text-left bg-white py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
                            Upgrade your entry security with our advanced Smart Door Lock Systems. Designed for
                            residential and commercial use, our smart locks offer keyless access, remote control, and
                            enhanced protection against unauthorized entry.
                        </p>

                        <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
                            We offer comprehensive services including <strong>Smart Lock Installation</strong> and
                            <strong>System Maintenance & Troubleshooting</strong>. Our systems support fingerprint,
                            RFID, PIN code, mobile app, and Bluetooth access, providing you full control over who enters
                            your premises — anytime, anywhere.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <?php
                        include('../form.php');
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="text-left py-4" style="background-color: #f1f1f1;">
            <div class="container">
                <div class="row px-3">
                    <h2 class="text-primary">Why Choose Us?</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li><strong>Expert Technicians</strong> <br>We install and configure smart locks from
                                leading brands with precision and care.</li>
                            <li><strong>Regulation-Compliant Security</strong> <br>Our solutions meet all local safety
                                and data privacy requirements.</li>
                            <li><strong>Multi-Access Options</strong> <br>Choose from fingerprint, mobile app, RFID,
                                PIN, or mechanical key access.</li>
                            <li><strong>Responsive Support</strong> <br>We offer fast remote diagnostics and onsite
                                repairs for any lock issues.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li><strong>High-Quality Devices</strong> <br>We supply tested, durable locks suitable for
                                both wooden and metal doors.</li>
                            <li><strong>End-to-End Service</strong> <br>From site assessment to installation and
                                training, we manage it all.</li>
                            <li><strong>Transparent Pricing</strong> <br>Clear, upfront pricing with no hidden charges
                                or unexpected fees.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!-- Our Services Include Section -->
        <section class="text-left bg-white py-4">
            <div class="container">
                <div class="row px-3">
                    <h2 class="text-primary">Our Services Include:</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li class="py-2"><strong>Smart Lock Installation</strong> <br>Professional installation of
                                fingerprint, digital, and Wi-Fi enabled locks on new or existing doors.</li>
                            <li class="py-2"><strong>System Configuration</strong> <br>Set up access permissions,
                                time-based entry, and mobile notifications for maximum control.</li>
                            <li class="py-2"><strong>Compatibility Checks</strong> <br>Ensure the selected smart lock
                                fits your door and integrates with existing systems like intercoms or alarms.</li>
                            <li class="py-2"><strong>Mobile App Setup</strong> <br>Connect and configure your smart lock
                                with smartphone apps for real-time access management.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li class="py-2"><strong>Regular Maintenance</strong> <br>Routine firmware updates, battery
                                replacements, and function checks to ensure seamless operation.</li>
                            <li class="py-2"><strong>Emergency Unlock Services</strong> <br>Fast response in case of
                                lockouts, system errors, or forgotten access codes.</li>
                            <li class="py-2"><strong>Remote Management & Monitoring</strong> <br>Monitor door status,
                                entry logs, and user activity from anywhere through your mobile device.</li>
                            <li class="py-2"><strong>System Upgrades</strong> <br>Upgrade older models to smarter, more
                                secure versions with added connectivity and features.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </main>




    
    
    <?php
        include('../footer.php');
    ?>

<script src="/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      const text = "Security meets convenience with intelligent door locking systems";
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