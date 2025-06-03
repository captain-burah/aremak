
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
$page_title = "CCTV Camera Installation & Maintenance in Dubai | SIRA-Compliant";
$og_url = "https://www.aremak.com/services/cctv-camera-installation-and-maintenance";

include "../header.php";
?>

<body>
<?php
        include('../navbar.php');
    ?>



  <main>

    <!-- HEADER -->
    <section class="bg-image d-flex align-items-center"
            style="background-image: url('../images/services/3.webp'); height: 100vh; background-size: cover; background-position: center;">
            <div class="mask w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.7);">
                <div class="container text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="hero-heading">CCTV Camera Installation & Maintenance</h1>
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
              Enhance the safety of your property with professional CCTV Camera Installation & Maintenance services. Our
              tailored solutions provide 24/7 surveillance using high-definition cameras and smart monitoring systems
              for homes, offices, retail spaces, and industrial sites.
            </p>

            <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
              From system design to ongoing support, we offer SIRA-compliant solutions that ensure comprehensive
              coverage, real-time monitoring, and secure footage storage. Our team handles everything from new
              installations to system upgrades and emergency repairs.
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
              <li><strong>Certified Engineers</strong> <br>Trained technicians with experience in SIRA-approved CCTV
                systems and smart security setups.</li>
              <li><strong>Latest Technology</strong> <br>We install HD, 4K, and IP-based cameras with night vision,
                motion detection, and remote access.</li>
              <li><strong>End-to-End Solutions</strong> <br>From consultation and design to installation and long-term
                maintenance.</li>
              <li><strong>Custom System Design</strong> <br>Solutions tailored for homes, offices, warehouses, malls,
                and government buildings.</li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="text-dark">
              <li><strong>24/7 Monitoring Options</strong> <br>Live monitoring setup via mobile apps or cloud systems.
              </li>
              <li><strong>Transparent Pricing</strong> <br>No hidden charges. Clear proposals with cost-effective
                packages.</li>
              <li><strong>Priority Maintenance Plans</strong> <br>Annual maintenance contracts with routine inspections
                and fast support.</li>
              <li><strong>SIRA-Compliant Services </strong> <br>We follow all local laws and security standards to
                ensure full regulatory compliance in Dubai.</li>
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
              <li class="py-2"><strong>Site Survey & Planning</strong> <br>Inspection of property layout for optimal
                camera placement and coverage.</li>
              <li class="py-2"><strong>CCTV System Installation</strong> <br>Installation of indoor/outdoor IP cameras,
                NVR/DVR units, and accessories.</li>
              <li class="py-2"><strong>Mobile & Remote Viewing</strong> <br>Setup of mobile and web apps for real-time
                surveillance and playback access.</li>
              <li class="py-2"><strong>Footage Backup & Retrieval</strong> <br>Secure recording configurations and data
                backup for evidence retrieval.</li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="text-dark">
              <li class="py-2"><strong>Maintenance & Troubleshooting</strong> <br>Periodic health checks, firmware
                updates, and camera performance tuning.</li>
              <li class="py-2"><strong>System Upgrades</strong> <br>Migrate from analog to HD/IP systems or add new
                zones and features.</li>
              <li class="py-2"><strong>Emergency Repairs</strong> <br>Rapid on-site support for system failures or
                damage.</li>
              <li class="py-2"><strong>Integration Services</strong> <br>Connect CCTV with access control, alarm, and
                intercom systems.</li>
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
    <script src="../../js/bootstrap.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
      const text = "Watch over what matters — we install and maintain with precision";
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