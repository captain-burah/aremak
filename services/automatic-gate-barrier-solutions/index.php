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
$page_title = "Automatic Gate Barrier Solutions Dubai | Vehicle Access Control";
$og_url = "https://www.aremak.com/services/automatic-gate-barrier-solutions";

include "../header.php";
?>

<body>
    <?php
    include('../navbar.php');
    ?>



    <main>

        <!-- HEADER -->
        <section class="bg-image d-flex align-items-center"
            style="background-image: url('../images/services/2.webp'); height: 100vh; background-size: cover; background-position: center;">
            <div class="mask w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.7);">
                <div class="container text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="hero-heading">Automatice Gate Barrier Systems</h1>
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
                            Control vehicle access with precision and efficiency using our Automatic Gate Barrier
                            Solutions. Whether for residential communities, commercial buildings, or industrial
                            compounds, our systems are engineered to enhance security and streamline traffic flow at all
                            access points.
                        </p>

                        <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
                            We specialize in two key service areas — <strong>Gate Barrier Installation</strong> for new
                            projects, and <strong>Gate Barrier Rectification</strong> to repair or upgrade
                            malfunctioning or outdated systems. Our SIRA-compliant solutions ensure durability, fast
                            operation, and seamless integration with access control systems, license plate recognition,
                            RFID readers, and more.
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
                            <li><strong>Experienced Technicians</strong> <br>Our team is trained in gate barrier systems
                                from leading global manufacturers.</li>
                            <li><strong>SIRA-Compliant Installations</strong> <br>We deliver services that meet Dubai’s
                                safety and security guidelines.</li>
                            <li><strong>Custom Integration</strong> <br>Seamlessly integrate with RFID access, license
                                plate
                                recognition, CCTV, and intercom systems.</li>
                            <li><strong>Fast & Reliable Support</strong> <br>We provide prompt troubleshooting,
                                replacement,
                                and emergency repairs.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li><strong>Quality Equipment</strong> <br>Only durable, weather-resistant motors and booms
                                tested for long-term use.</li>
                            <li><strong>Full Project Management</strong> <br>From site survey to system testing, we
                                handle
                                every phase with precision.</li>
                            <li><strong>Competitive Pricing</strong> <br>Transparent pricing and value-driven packages
                                tailored to your requirements.</li>
                        </ul>
                    </div>

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
                            <li class="py-2"><strong>Gate Barrier Installation</strong> <br>End-to-end installation of
                                automatic gate barriers including boom gates, road blockers, and arm barriers for
                                controlled vehicle entry.</li>
                            <li class="py-2"><strong>Gate Barrier Rectification</strong> <br>Troubleshooting, repair, or
                                complete replacement of faulty, outdated, or improperly installed barrier systems.</li>
                            <li class="py-2"><strong>Site Inspection & Feasibility Study</strong> <br>On-site survey to
                                determine optimal gate location, type, and access integration based on traffic and
                                layout.</li>
                            <li class="py-2"><strong>Barrier Control System Integration</strong> <br>Link barriers with
                                RFID, biometric systems, remote controls, and number plate recognition technology.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li class="py-2"><strong>Routine Maintenance & Servicing</strong> <br>Scheduled checks,
                                mechanical adjustments, and software updates to prevent breakdowns and extend system
                                life.</li>
                            <li class="py-2"><strong>Emergency Repair Service</strong> <br>On-demand repairs to restore
                                barrier functionality quickly with minimal downtime.</li>
                            <li class="py-2"><strong>Remote Management & Monitoring</strong> <br>Control and track gate
                                activity remotely via cloud or local management platforms.</li>
                            <li class="py-2"><strong>Upgrades & System Enhancements</strong> <br>Modernize older systems
                                with faster motors, advanced safety sensors, and improved access logic.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- /MAIN -->

    <?php
    include('../footer.php');
    ?>

    <script src="/js/bootstrap.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
      const text = "Open with ease. Close with confidence. Total gate control, automated";
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