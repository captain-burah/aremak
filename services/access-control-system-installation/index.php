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
$page_title = "Access Control System Installation Dubai | Smart Entry Solutions";
$og_url = "https://www.aremak.com/services/access-control-system-installation";

include "../header.php";
?>


<body>

  <?php
  include('../navbar.php');
  ?>



  <!-- MAIN -->
  <main>

    <!-- HEADER -->
    <section class="bg-image d-flex align-items-center"
      style="background-image: url('../images/services/1.webp'); height: 100vh; background-size: cover; background-position: center;">
      <div class="mask w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="container text-white">
          <div class="row">
            <div class="col-md-6">
              <h1 class="hero-heading">Access Control Systems</h1>
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
    <section class=" bg-white py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
              Secure your premises with advanced Access Control Systems tailored for commercial, industrial, and
              residential environments. Our solutions give you full control over who enters your building, when, and how
              — using technology that enhances both safety and operational efficiency.
            </p>

            <p class="text-dark mx-auto text-justify" style="font-size: 16px;">
              From biometric access and RFID card readers to mobile credentialing and cloud-based systems, we offer
              fully scalable installations. All systems are SIRA-compliant and can be integrated with CCTV, intercoms,
              and alarm monitoring platforms to form a unified security ecosystem.
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
              <li><strong>Certified Technicians</strong> <br>Our professionals are experienced in deploying access
                systems that comply with SIRA and international standards.</li>
              <li><strong>Flexible Authentication Methods</strong> <br>We support fingerprint, facial recognition, RFID
                cards, PIN codes, and mobile access.</li>
              <li><strong>Custom Access Rules</strong> <br>Define entry permissions by user, department, zone, or time
                schedules.</li>
              <li><strong>Seamless Integration</strong> <br>Access control works in sync with your CCTV, alarm, or
                visitor management systems.</li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="text-dark">
              <li><strong>Cloud & On-Premise Options</strong> <br>Choose centralized cloud control or local server
                management based on your preference.</li>
              <li><strong>Audit Trails & Reports</strong> <br>Track entry logs, generate usage reports, and monitor
                activity in real-time.</li>
              <li><strong>Maintenance & Support</strong> <br>We provide regular system updates, health checks, and
                rapid-response service when needed.</li>
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
              <li class="py-2"><strong>Site Survey & System Design</strong> <br>We analyze your facility layout and
                security goals to design an efficient access control solution.</li>
              <li class="py-2"><strong>RFID & Key Card Access</strong> <br>Install contactless access readers and
                programmable ID cards for staff and visitors.</li>
              <li class="py-2"><strong>Biometric Access Systems</strong> <br>Fingerprint and facial recognition
                terminals for enhanced identity verification.</li>
              <li class="py-2"><strong>PIN & Keypad Access</strong> <br>Secure, easy-to-use solutions for controlled
                areas or backup entry options.</li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="text-dark">
              <li class="py-2"><strong>Mobile Credentialing</strong> <br>Let users unlock doors using smartphones via
                Bluetooth, NFC, or QR codes.</li>
              <li class="py-2"><strong>Centralized Access Management</strong> <br>Admin control panels to manage users,
                monitor logs, and adjust permissions remotely.</li>
              <li class="py-2"><strong>Door Controller Installation</strong> <br>High-quality magnetic locks, electric
                strikes, and multi-door controllers for secure operation.</li>
              <li class="py-2"><strong>Annual Maintenance Contracts</strong> <br>Ongoing servicing, software upgrades,
                and priority support to ensure system reliability.</li>
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
      const text = "Control who enters, when, and where — with cutting-edge access technology that puts you in charge";
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