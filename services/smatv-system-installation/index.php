

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
$page_title = "SMATV System Installation Dubai | Centralized TV Distribution";
$og_url = "https://www.aremak.com/services/smatv-system-installation";

include "../header.php";
?>

<body>
<?php
        include('../navbar.php');
    ?>



    <main>

    <!-- HEADER -->
    <section class="bg-image d-flex align-items-center"
            style="background-image: url('../images/services/7.webp'); height: 100vh; background-size: cover; background-position: center;">
            <div class="mask w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.7);">
                <div class="container text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="hero-heading">SMATV System Installation</h1>
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
                        Our SMATV (Satellite Master Antenna Television) system installation service offers centralized television signal distribution for multi-dwelling units like hotels, residential buildings, and commercial complexes. Enjoy consistent and high-quality signal delivery from a single satellite feed.
                    </p>

                    <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
                        We design, install, and maintain scalable SMATV systems that reduce cabling clutter and ensure reliable viewing across all units. Our solutions are fully compliant with local regulations and tailored to meet the specific needs of each property.
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
                        <li><strong>Experienced Technicians</strong> <br>Professionally trained team with expertise in residential and commercial SMATV systems.</li>
                        <li><strong>Custom Design & Planning</strong> <br>Solutions engineered for optimal performance, signal clarity, and property requirements.</li>
                        <li><strong>High-Quality Equipment</strong> <br>We use branded splitters, amplifiers, and satellite receivers for long-term reliability.</li>
                        <li><strong>Regulatory Compliance</strong> <br>Installations follow industry standards and local building codes.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="text-dark">
                        <li><strong>Multi-Channel Distribution</strong> <br>Support for multiple satellites and channels over a unified system.</li>
                        <li><strong>Maintenance & Upgrades</strong> <br>Annual servicing and options to expand or modernize your existing setup.</li>
                        <li><strong>Scalable for Growth</strong> <br>Flexible design supports future expansion without major rewiring.</li>
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
                        <li class="py-2"><strong>Site Survey & Consultation</strong> <br>Evaluate your building's structure and user needs for tailored SMATV design.</li>
                        <li class="py-2"><strong>System Design & Planning</strong> <br>Blueprint development for headend equipment, cabling routes, and user terminals.</li>
                        <li class="py-2"><strong>Installation & Setup</strong> <br>Mounting of antennas, LNBs, amplifiers, and distribution panels with clean wiring.</li>
                        <li class="py-2"><strong>Signal Balancing</strong> <br>Testing and adjusting for consistent signal strength across all units.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="text-dark">
                        <li class="py-2"><strong>Channel Programming</strong> <br>Set up local and international channels based on tenant or guest preferences.</li>
                        <li class="py-2"><strong>Periodic Maintenance</strong> <br>System health checks, signal tests, and preventive servicing.</li>
                        <li class="py-2"><strong>System Expansion</strong> <br>Add new units or floors without major disruption.</li>
                        <li class="py-2"><strong>Integration with IPTV</strong> <br>Combine SMATV with IPTV or hospitality TV systems for hybrid solutions.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</main>





<?php
        include('../footer.php');
    ?>

<script src="../../js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      const text = "Centralized satellite systems for seamless multi-unit broadcasting";
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