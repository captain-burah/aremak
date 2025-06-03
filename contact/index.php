<!doctype html>
<?php
//START SESSION
session_start();
require_once __DIR__ . '/../config.php';

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
<html lang="en">

<head>
  <!-- META -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="reiGj5fzzdJrr5w8ipkOZUYNtNR7geEUInIysUzf" />
  <meta name="robots" content="index, follow">

  <!-- FAVICON AND MANIFEST -->
  <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
  <link rel="manifest" href="images/favicon/site.webmanifest">

  <!--TITLE & DESCRIPTIONS-->
  <title lang="en-us">Contact Us | Aremak Systems Trading - Dubai</title>
  <meta name="description"
    content="Certified provider of CCTV, access control, structured cabling, and smart security systems across Dubai and the UAE.">
  <meta name="author" content="Aremak">

  <!-- ESSENTIAL OG TAGS -->
  <meta property="og:title" content="Aremak Networking Systems – Dubai’s Trusted IT & Security Partner">
  <meta property="og:description"
    content="We deliver certified CCTV, access control, structured cabling, and smart security systems across the UAE.">
  <meta property="og:image" content="http://devhub.aremakuae.com/images/favicon/aremak-networking-systems-dubai.jpg">
  <meta property="og:url" content="http://devhub.aremakuae.com">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_US">

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Aremak Networking Systems – Dubai’s Trusted IT & Security Partner">
  <meta name="twitter:description"
    content="We deliver certified CCTV, access control, structured cabling, and smart security systems across the UAE.">
  <meta name="twitter:image" content="http://devhub.aremakuae.com/images/favicon/aremak-networking-systems-dubai.jpg">

  <!--CANONICAL LINKS-->
  <link rel="canonical" href="https://aremakuae.com/contact" hreflang="en">

  <!--GOOGLE FONTS-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

  <!--CSS-->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!--CUSTOM CSS-->
  <style>
    .montserrat-<uniquifier> {
      font-family: "Montserrat", sans-serif !important;
      font-optical-sizing: auto;
      font-weight: <weight>;
      font-style: normal;
    }


    html,
    body {
      font-family: "Montserrat", sans-serif !important;
      color: #fff !important;
      background-color: #fff !important;
    }

    .hero-heading {
      font-family: "Oswald", sans-serif !important;
      font-size: 3rem !important;
      font-weight: 400 !important;
      letter-spacing: 0px !important;
      text-transform: none !important;
      line-height: 1.2 !important;
      color: #ffffff !important;
      width: 50% !important;
    }

    .hero-paragraph {
      font-family: "Montserrat", sans-serif !important;
      color: #ffffff !important;
      font-weight: 400 !important;
      letter-spacing: 0px !important;
      text-transform: none !important;
      width: 50% !important;
    }

    .card-title {
      font-family: "Montserrat", sans-serif !important;
      font-weight: 500 !important;
      font-size: 1.5rem !important;
    }

    /* h1{
        font-size: 3rem !important;
        font-weight: 400 !important;
        letter-spacing: 0px !important;
        text-transform: none !important;
      } */

    h1,
    h2,
    h3,
    h4,
    h5 {
      font-family: "Oswald", sans-serif !important;
    }

    h2 {
      font-weight: 400;
      font-size: 4rem;
      line-height: 1.2;
    }

    h2,
    h3,
    h4,
    h5,
    h5 {
      color: #18345D !important;
    }

    p {
      font-size: 14px !important;
      color: #1c1c1c !important;
      font-weight: 400 !important;
      letter-spacing: 0px !important;
      text-transform: none !important;
    }

    .swiper {
      width: 600px;
      height: 300px;
    }

    .footer-icons {
      color: #ffffff !important;
    }

    @media only screen and (max-width:500px) {
      /* For mobile phones: */

      .hero-heading {
        font-family: "Oswald", sans-serif !important;
        font-size: 1.5rem !important;
        font-weight: 400 !important;
        letter-spacing: 0px !important;
        text-transform: none !important;
        line-height: 1.2 !important;
        color: #ffffff !important;
        width: 100% !important;
      }

      .hero-paragraph {
        font-family: "Montserrat", sans-serif !important;
        color: #ffffff !important;
        font-weight: 400 !important;
        letter-spacing: 0px !important;
        text-transform: none !important;
        width: 100% !important;
      }

      h2 {
        font-weight: 400;
        font-size: 3rem;
        line-height: 1.2;
      }

      .desktop_view {
        display: none;
      }

      .mobile_view {
        display: block !important;
      }

      .swiper {
        height: 200px;
      }
    }

    .mobile_view {
      display: none;
    }
  </style>

</head>

<body>


  <?php
  include('../services/navbar.php');
  ?>



  <main id="main">

    <!-- HEADER -->
    <section style="padding-top: 7vh !important; box-shadow: inset 0 -8px 10px rgba(0, 0, 0, 0.1);">
      <header class="desktop_view">
        <img src="/images/desktop_map.webp" alt="" style="width: 100%">
      </header>

      <header class="mobile_view">
        <img src="/images/mobile_map.webp" alt="">
      </header>
    </section>
    <!-- HEADER -->


    <!-- ABOUT SECTION -->
    <section class="jumbotron text-left bg-white text-center py-3">
      <h2 class="text-primary" style="font-weight: 600; font-size: 3rem;">Contact Us</h2>

      <style>
        .custom-width {
          width: 100%;
        }

        @media (min-width: 992px) {
          .custom-width {
            width: 75%;
          }
        }
      </style>

      <div class="row gy-4 custom-width mx-auto my-3">
        <div class="col-lg-12">
          <div class="info-item  d-flex flex-column justify-content-center align-items-center border shadow-sm">
            <h4>Address</h4>
            <p class="px-3 text-center">
              13th Floor, Al Saqer Business Tower, Sheikh Zayed Road, Dubai, UAE - PO Box 76054
            </p>
          </div>
        </div><!-- End Info Item -->
      </div>

      <div class="row gy-4 custom-width mx-auto ">

        <div class="col-lg-6 col-md-6 mb-3">
          <div class="info-item d-flex flex-column justify-content-center align-items-center border shadow-sm">
            <h4>Email</h4>
            <p>info@aremakuae.com</p>
          </div>
        </div><!-- End Info Item -->

        <div class="col-lg-6 col-md-6 mb-3">
          <div class="info-item  d-flex flex-column justify-content-center align-items-center border shadow-sm">
            <h4>Phone</h4>
            <p>+971 56 856 5377</p>
          </div>
        </div><!-- End Info Item -->
      </div>



      <!-- ====PHP VALIDATION==== -->
      <?php if ($ack_message != "") { ?>
        <div class="row gy-4 custom-width mx-auto mb-3">
          <div class="col-lg-12 col-md-12">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <?php if ($ack_message == 'success') { ?>
                <div class="text-white py-2 px-4 rounded-pill bg-success">
                  Your inquiry was submitted! Thank You!
                </div>
              <?php } else { ?>
                <div class="text-white p-2 rounded- bg-warning">
                  ERROR! Required:
                  <?php
                  echo $ack_message;
                  ?>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php } ?>


      <div class="row gy-4 custom-width mx-auto mb-3">
        <div class="col-md-12 mx-auto">
          <div class="info-item d-flex flex-column justify-content-center align-items-center mx-auto text-center">

            <form class="w-100" action="../contact.php" method="POST" id="contact-form-desktop">
              <div class="form-group">
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
                  placeholder="Full Name" required <?php echo $form_disabled; ?>>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="email" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Email" required <?php echo $form_disabled; ?>>
              </div>

              <div class="row">
                <div class="col-md-12 ">
                  <div class="form-group email">
                    <input type="text" name="phone" id="number" class="form-control rounded-0" style="color: #000;"
                      placeholder="Phone" required="" <?php echo $form_disabled; ?>>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message" required <?php echo $form_disabled; ?>></textarea>
              </div>

              <button type="button" id="submit-button" <?php echo $form_disabled; ?>
                class="btn btn-warning rounded-pill text-dark w-50 border border-primary"
                onclick="handleRecaptchaSubmit()">
                <span class="btn-text">SUBMIT</span>
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
              </button>

            </form>
          </div>
        </div><!-- End Info Item -->
      </div>

      </div>
    </section>
    <!-- /ABOUT SECTION -->

  </main>


  <?php
  //FOOTER
  include("../services/footer.php");
  ?>
  <!-- /FOOTER -->


  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://www.google.com/recaptcha/api.js?render=6LcVuUorAAAAAD-TjUj5VYEQNxjopmxCgRSb_Rgq"></script>
  <!-- <script>
    function onSubmit(token) {
      console.log('fhdkslaa');
      var button = document.createElement('input');
      button.type = 'hidden';
      button.name = 'recaptcha_token';
      button.value = token;

      var form = document.getElementById("contact-form-desktop");
      form.appendChild(button);
      form.submit();
    }

  </script> -->
  <script>
    function handleRecaptchaSubmit() {
      const button = document.getElementById('submit-button');
      const btnText = button.querySelector('.btn-text');
      const spinner = button.querySelector('.spinner-border');

      // Show loading
      button.disabled = true;
      btnText.textContent = "Submitting...";
      spinner.classList.remove('d-none');

      // Run reCAPTCHA
      grecaptcha.ready(function () {
        grecaptcha.execute('<?php echo Config::GOOGLE_RECAPTCHA_SITE_KEY; ?>', { action: 'submit' })
          .then(function (token) {
            // Append token and submit form
            const form = document.getElementById("contact-form-desktop");
            const input = document.createElement("input");
            input.type = "hidden";
            input.name = "recaptcha_token";
            input.value = token;
            form.appendChild(input);
            form.submit();
          })
          .catch(function (error) {
            console.error("reCAPTCHA error:", error);

            // Reset UI if error
            button.disabled = false;
            btnText.textContent = "SUBMIT";
            spinner.classList.add('d-none');
          });
      });
    }
  </script>




  <script>
    var swiper = new Swiper(".mySwiper", {
      // slidesPerView: "1",
      // centeredSlides: s,
      // spaceBetween: 30,
      // initialSlide: 1,
    });

    var swiperMobile = new Swiper(".mySwiperMobile", {
      slidesPerView: "1",
      // centeredSlides: s,
      spaceBetween: 30,
      // initialSlide: 1,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
</body>

</html>