
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
$page_title = "Public Address & Sound Systems Dubai | Audio Broadcasting Solutions";
$og_url = "https://www.aremak.com/services/public-address-sound-systems";

include "../header.php";
?>

<body>
<?php
        include('../navbar.php');
    ?>


    <main>

        <!-- HEADER -->
        <section class="bg-image d-flex align-items-center"
            style="background-image: url('../images/services/5.webp'); height: 100vh; background-size: cover; background-position: center;">
            <div class="mask w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.7);">
                <div class="container text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="hero-heading">Public Address Sound Systems</h1>
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
                            Deliver clear, effective communication across your facility with our professional Public
                            Address (PA) Sound Systems. Perfect for schools, offices, malls, industrial sites, and more
                            — our systems ensure messages are heard promptly and precisely.
                        </p>

                        <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
                            We specialize in both <strong>New PA System Installations</strong> and <strong>System
                                Upgrades & Maintenance</strong>. Whether you're installing a new system or enhancing an
                            existing one, our solutions are designed for intelligibility, coverage, and integration with
                            emergency protocols, background music, and paging controls.
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
                            <li><strong>Skilled Audio Engineers</strong> <br>Our team designs and installs PA systems to
                                suit all acoustic environments and space types.</li>
                            <li><strong>Regulation-Compliant Systems</strong> <br>We follow safety and public address
                                standards for educational, healthcare, and commercial installations.</li>
                            <li><strong>Integrated Communication</strong> <br>Our solutions integrate with fire alarms,
                                emergency alerts, and building automation systems.</li>
                            <li><strong>Quick & Professional Support</strong> <br>Rapid deployment, fault diagnostics,
                                and emergency service whenever you need us.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li><strong>Top-Quality Equipment</strong> <br>We use industry-leading speakers, amplifiers,
                                and microphones for long-lasting clarity and performance.</li>
                            <li><strong>Turnkey Project Execution</strong> <br>From site assessment to system
                                commissioning, we manage everything for you.</li>
                            <li><strong>Fair Pricing</strong> <br>Transparent, flexible pricing tailored to your size
                                and sound coverage needs.</li>
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
                            <li class="py-2"><strong>New PA System Installation</strong> <br>Complete setup of
                                loudspeakers, amplifiers, and control units for clear and wide audio coverage.</li>
                            <li class="py-2"><strong>PA System Upgrade</strong> <br>Replacement or modernization of
                                outdated systems with improved audio quality and advanced features.</li>
                            <li class="py-2"><strong>Site Assessment & Acoustic Planning</strong> <br>On-site surveys
                                and sound mapping to optimize speaker placement and zoning.</li>
                            <li class="py-2"><strong>System Integration</strong> <br>Connect your PA system with
                                emergency alert systems, paging consoles, and background music sources.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li class="py-2"><strong>Scheduled Maintenance</strong> <br>Routine checks, sound
                                calibration, and updates to keep your system reliable year-round.</li>
                            <li class="py-2"><strong>On-Demand Repairs</strong> <br>Quick repairs to restore
                                functionality with minimal disruption to your operations.</li>
                            <li class="py-2"><strong>Remote Control & Monitoring</strong> <br>Manage announcements and
                                zones remotely through modern interfaces and cloud-based tools.</li>
                            <li class="py-2"><strong>Custom Audio Solutions</strong> <br>Tailored system enhancements
                                including multi-zone control, timed announcements, and multilingual support.</li>
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
      const text = "Make every word count — loud, clear, and everywhere it needs to be";
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