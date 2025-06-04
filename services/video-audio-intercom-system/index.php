
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
$page_title = "Video & Audio Intercom Systems Dubai | Secure Visitor Communication";
$og_url = "https://www.aremak.com/services/vide-audio-intercom-system";

include "../header.php";
?>
<body>

    <?php
    include('../navbar.php');
    ?>



    <main>

        <!-- HEADER -->
        <section class="bg-image d-flex align-items-center"
            style="background-image: url('../images/services/9.webp'); height: 100vh; background-size: cover; background-position: center;">
            <div class="mask w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.7);">
                <div class="container text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="hero-heading">Video Audio Intercom System</h1>
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
                            Improve communication and enhance security with our reliable Video & Audio Intercom Systems.
                            Ideal for residential buildings, commercial complexes, and gated facilities, our intercom
                            solutions offer seamless access control and real-time communication between visitors and
                            residents or staff.
                        </p>

                        <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
                            We provide full-service solutions including design, installation, and maintenance of both
                            wired and wireless intercom systems. Our systems are compatible with door entry units, CCTV
                            integration, and mobile device connectivity — allowing you to see, hear, and speak with
                            visitors before granting access.
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
                            <li><strong>Certified Installers</strong> <br>Our experts are trained to install intercom
                                systems from leading international brands.</li>
                            <li><strong>High-Definition Video & Clear Audio</strong> <br>We use modern equipment to
                                ensure crystal-clear communication and surveillance.</li>
                            <li><strong>Flexible System Options</strong> <br>Choose from audio-only, video-enabled,
                                wired, or wireless systems based on your site requirements.</li>
                            <li><strong>Remote Access Integration</strong> <br>Enable mobile control through smartphone
                                apps and cloud-based platforms.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li><strong>SIRA-Compliant Solutions</strong> <br>We follow all relevant security and
                                communication standards in Dubai and across the UAE.</li>
                            <li><strong>Custom Design & Layout</strong> <br>Tailored system designs suited for homes,
                                apartments, offices, and large facilities.</li>
                            <li><strong>End-to-End Support</strong> <br>From consultation to after-sales service, we
                                offer full lifecycle support for your intercom system.</li>
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
                            <li class="py-2"><strong>System Consultation & Design</strong> <br>Professional assessment
                                to determine optimal intercom configuration and placement.</li>
                            <li class="py-2"><strong>Video Intercom Installation</strong> <br>Set up of door entry
                                systems with live video monitoring and two-way communication.</li>
                            <li class="py-2"><strong>Audio Intercom Installation</strong> <br>Reliable and
                                cost-effective communication for internal use or visitor screening.</li>
                            <li class="py-2"><strong>IP & Cloud-Based Intercoms</strong> <br>Advanced systems with
                                mobile integration and remote management capabilities.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li class="py-2"><strong>Wireless Intercom Solutions</strong> <br>Flexible systems that
                                require minimal wiring, ideal for retrofit applications.</li>
                            <li class="py-2"><strong>System Upgrades & Replacements</strong> <br>Upgrade your legacy
                                intercom to a modern system with smart features.</li>
                            <li class="py-2"><strong>Maintenance & Repairs</strong> <br>Routine checks, cleaning, and
                                repairs to ensure long-term system performance.</li>
                            <li class="py-2"><strong>Integration with CCTV & Access Control</strong> <br>Unified
                                security system that connects intercoms with cameras and door locks.</li>
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
            const text = "Two-way communication meets crystal-clear visuals for total entry control";
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