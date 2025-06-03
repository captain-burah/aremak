
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
$page_title = "Structured Cabling Installation Dubai | High-Speed Network Setup";
$og_url = "https://www.aremak.com/services/structured-cabling-installation";

include "../header.php";
?>

<body>
<?php
        include('../navbar.php');
    ?>




    <main>

        <!-- HEADER -->
        <section class="bg-image d-flex align-items-center"
            style="background-image: url('../images/services/8.webp'); height: 100vh; background-size: cover; background-position: center;">
            <div class="mask w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.7);">
                <div class="container text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="hero-heading">Structured Cabling Installation</h1>
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
                            Ensure reliable and scalable connectivity with our expert Structured Cabling Installation
                            services. Whether you're setting up a new office, upgrading your network, or integrating
                            multiple systems, our structured cabling solutions provide a robust foundation for seamless
                            communication and data transfer.
                        </p>

                        <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
                            We specialize in the design, installation, testing, and certification of copper and fiber
                            optic cabling systems. From small businesses to enterprise networks, we deliver solutions
                            that support your IT infrastructure, enhance performance, and comply with industry
                            standards.
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
                            <li><strong>Certified Cabling Experts</strong> <br>Our team is trained in industry best
                                practices and uses certified materials for all installations.</li>
                            <li><strong>End-to-End Solutions</strong> <br>From planning and layout to post-installation
                                testing, we handle every phase of your project.</li>
                            <li><strong>High-Performance Cabling</strong> <br>We use Cat6, Cat6A, Cat7, and fiber optics
                                to ensure high-speed, interference-free transmission.</li>
                            <li><strong>Minimal Downtime</strong> <br>Efficient project execution ensures your network
                                is up and running quickly.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li><strong>Custom Network Designs</strong> <br>Solutions tailored to your building layout,
                                device needs, and future expansion plans.</li>
                            <li><strong>Standards-Compliant Work</strong> <br>We follow ANSI/TIA, ISO/IEC, and local
                                regulations for structured cabling systems.</li>
                            <li><strong>Transparent Pricing</strong> <br>No surprises — clear quotes with competitive
                                rates for long-term value.</li>
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
                            <li class="py-2"><strong>Site Survey & Network Planning</strong> <br>Detailed assessment of
                                your premises to determine optimal cabling routes and infrastructure needs.</li>
                            <li class="py-2"><strong>Data Cabling Installation</strong> <br>Installation of Cat5e, Cat6,
                                Cat6A, and Cat7 cables for reliable voice and data communication.</li>
                            <li class="py-2"><strong>Fiber Optic Cabling</strong> <br>Single-mode and multi-mode fiber
                                installations for high-speed, long-distance communication.</li>
                            <li class="py-2"><strong>Patch Panel Termination</strong> <br>Professional rack and panel
                                setup for organized and accessible network management.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-dark">
                            <li class="py-2"><strong>Cable Testing & Certification</strong> <br>Full testing of cable
                                performance and compliance with international standards.</li>
                            <li class="py-2"><strong>Network Room Setup</strong> <br>Design and implementation of server
                                rooms, switch panels, and cable management systems.</li>
                            <li class="py-2"><strong>Maintenance & Troubleshooting</strong> <br>Ongoing support to
                                ensure your cabling infrastructure continues to perform optimally.</li>
                            <li class="py-2"><strong>Scalability for Growth</strong> <br>Solutions designed to expand
                                easily with your business without rewiring.</li>
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
      const text = "Organized, efficient, and future-ready cabling for seamless connectivity";
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