<?php
  // Set defaults if not provided
  $page_title = $page_title ?? "IT & Security Services in Dubai | Aremak Networking Systems";
  $og_url = $og_url ?? "https://www.aremak.com";
?>


<head>
  <!-- META -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="reiGj5fzzdJrr5w8ipkOZUYNtNR7geEUInIysUzf" />  
  <meta name="robots" content="index, follow">

  <!-- FAVICON AND MANIFEST -->
  <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="/images/favicon/site.webmanifest">

  <!-- TITLE & DESCRIPTION -->
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="Explore Aremak's certified IT and security services in Dubai, including CCTV, access control, structured cabling, and smart systems tailored for homes and businesses.">
  <meta name="author" content="Aremak">

  <!-- ESSENTIAL OG TAGS -->
  <meta property="og:title" content="IT & Security Services in Dubai | Aremak Networking Systems">
  <meta property="og:description" content="Explore Aremak's certified IT and security services in Dubai, including CCTV, access control, structured cabling, and smart systems tailored for homes and businesses.">
  <meta property="og:image" content="https://www.aremak.com/images/images/aremak-networking-systems-dubai.jpg">
  <meta property="og:url" content="https://aremakuae.com">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Aremak Networking Systems">
  <meta property="og:locale" content="en_US">

  <!-- TWITTER CARD -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="IT & Security Services in Dubai | Aremak Networking Systems">
  <meta name="twitter:description" content="Explore Aremak's certified IT and security services in Dubai, including CCTV, access control, structured cabling, and smart systems tailored for homes and businesses.">
  <meta name="twitter:image" content="https://www.aremak.com/images/images/aremak-networking-systems-dubai.jpg">

  <!-- CANONICAL -->
  <link rel="canonical" href="<?= htmlspecialchars($og_url) ?>">

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- CUSTOM CSS -->
  <style>
        html,
        body {
            overflow-x: hidden !important;
            margin: 0 !important;
            padding: 0 !important;
        }

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
            width: 100% !important;
        }

        .hero-paragraph {
            font-family: "Montserrat", sans-serif !important;
            color: #ffffff !important;
            font-weight: 400 !important;
            letter-spacing: 0px !important;
            text-transform: none !important;
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
            /* font-size: 4rem; */
            line-height: 1.2;
        }

        .footer-icons{
            color: #ffffff !important;
        }

        li, p {
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
                /* font-size: 3rem; */
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

        #typewriter-text {
  display: inline;
  border-right: 2px solid white;
  white-space: pre-wrap;
  animation: blinkCaret 0.75s step-end infinite;
}

@keyframes blinkCaret {
  0%, 100% { border-color: transparent; }
  50% { border-color: white; }
}

    </style>
</head>
