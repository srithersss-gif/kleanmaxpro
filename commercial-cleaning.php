<?php
ob_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Commercial Cleaning Services in Chennai | Kleanmax Pro</title>
    <meta name="description" content="Kleanmax Pro provides professional commercial cleaning services in Chennai for offices, retail stores, corporate buildings, IT parks & institutions using eco-friendly methods.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="commercial cleaning services chennai, commercial cleaners chennai, corporate cleaning services, retail cleaning chennai, building cleaning services chennai">

    <link rel="shortcut icon" href="assets/klean-favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/custom-animation.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/klean-premium.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
        .tp-main-menu-two ul li a:after { display:none; }
        
        /* Premium Service Sidebar */
        .tp-service-widget {
            background: #001224;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        .tp-service-widget-title {
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
        }
        .tp-service-widget-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #FED10C;
        }
        .tp-service-widget-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .tp-service-widget-list ul li {
            margin-bottom: 15px;
        }
        .tp-service-widget-list ul li a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: rgba(255,255,255,0.7);
            font-size: 16px;
            font-weight: 500;
            background: rgba(255,255,255,0.05);
            padding: 15px 20px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .tp-service-widget-list ul li a:hover, .tp-service-widget-list ul li a.active {
            background: #FED10C;
            color: #001224;
            transform: translateX(5px);
        }
        
        .tp-service-quote-box {
            background: linear-gradient(135deg, #FED10C 0%, #ffdf40 100%);
            border-radius: 16px;
            padding: 30px;
            text-align: center;
        }
        .tp-service-quote-box h4 {
            font-size: 24px;
            font-weight: 800;
            color: #001224;
            margin-bottom: 15px;
        }
        
        /* Main Content Styling */
        .service-details-content h2 {
            font-size: 36px;
            font-weight: 800;
            color: #001224;
            margin-bottom: 25px;
            margin-top: 30px;
        }
        .service-details-content h3 {
            font-size: 26px;
            font-weight: 700;
            color: #001224;
            margin-bottom: 20px;
            margin-top: 40px;
            position: relative;
            padding-bottom: 10px;
        }
        .service-details-content p {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 25px;
        }
        
        /* Enhanced Feature Lists */
        .premium-check-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .premium-check-list li {
            position: relative;
            padding-left: 35px;
            margin-bottom: 15px;
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }
        .premium-check-list li::before {
            content: '\f058';
            font-family: 'Font Awesome 5 Pro';
            position: absolute;
            left: 0;
            top: 2px;
            color: #FED10C;
            font-size: 20px;
        }
        
        /* Modern Process Cards */
        .tp-service-feature-card {
            background: #fff;
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.03);
            height: 100%;
        }
        .tp-service-feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,18,36,0.1);
            border-color: #FED10C;
        }
        .tp-service-feature-card i {
            font-size: 40px;
            color: #FED10C;
            margin-bottom: 20px;
        }
        .tp-service-feature-card h5 {
            font-weight: 700;
            color: #001224;
            margin-bottom: 10px;
        }
        
        /* FAQ Styling */
        .premium-faq .accordion-item {
            border: 1px solid #f0f0f0;
            border-radius: 12px !important;
            margin-bottom: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        }
        .premium-faq .accordion-button {
            background-color: #fff;
            color: #001224;
            font-weight: 600;
            font-size: 18px;
            padding: 20px 25px;
            box-shadow: none !important;
        }
        .premium-faq .accordion-button:not(.collapsed) {
            background-color: #f8faff;
            color: #001224;
        }
        .premium-faq .accordion-button::after {
            background-image: none;
            content: '\f067'; /* Plus */
            font-family: 'Font Awesome 5 Pro';
            font-size: 16px;
            color: #FED10C;
            text-align: center;
            transition: all 0.3s;
        }
        .premium-faq .accordion-button:not(.collapsed)::after {
            content: '\f068'; /* Minus */
            transform: rotate(180deg);
        }
        .premium-faq .accordion-body {
            background-color: #fff;
            padding: 20px 25px;
            color: #555;
            border-top: 1px solid #f0f0f0;
        }
    </style>

    <!-- SERVICE SCHEMA -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Service",
      "serviceType": "Commercial Cleaning Services",
      "provider": {
        "@type": "LocalBusiness",
        "name": "Kleanmax Pro",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "Chennai",
          "addressRegion": "TN",
          "addressCountry": "IN"
        }
      },
      "areaServed": "Chennai",
      "description": "Professional commercial cleaning services in Chennai for offices, retail stores, IT parks and corporate buildings."
    }
    </script>
</head>

<body>

<?php if (file_exists('header.php')) include 'header.php'; ?>

<main>

<!-- breadcrumb area start -->
<div class="tp-page-title-area pt-180 pb-70 position-relative fix" data-background="assets/img/slider/breadcrumb-6.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tp-page-title z-index">
                    <h2 class="breadcrumb-title">Commercial <span style="color: #FED10C;">Cleaning</span></h2>
                    <div class="breadcrumb-menu">
                        <nav class="breadcrumb-trail breadcrumbs">
                            <ul class="trail-items">
                                <li class="trail-item trail-begin"><a href="index">Home</a></li>
                                <li class="trail-item"><a href="#">Services</a></li>
                                <li class="trail-item trail-end"><span>Commercial Cleaning</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<section class="tp-service-details-area pt-100 pb-100">
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <aside class="col-lg-4 mb-5">
                <div class="tp-service-widget wow fadeInUp" data-wow-delay=".2s">
                    <h4 class="tp-service-widget-title">Our Services</h4>
                    <div class="tp-service-widget-list">
                        <ul>
                            <li><a href="office-cleaning">Office Cleaning <i class="fas fa-angle-right"></i></a></li>
                            <li><a href="commercial-cleaning" class="active">Commercial Cleaning <i class="fas fa-angle-right"></i></a></li>
                            <li><a href="factory-cleaning">Factory Cleaning <i class="fas fa-angle-right"></i></a></li>
                            <li><a href="industrial-cleaning">Industrial Cleaning <i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="tp-service-quote-box wow fadeInUp" data-wow-delay=".4s">
                    <h4>Need a Cleaning Quote?</h4>
                    <p style="color: #001224; font-weight: 500; margin-bottom: 20px;">Contact us today for a customized commercial cleaning plan in Chennai.</p>
                    <a href="contact" class="theme-btn text-center w-100" style="background:#001224; color:#fff;">Get Free Estimate</a>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="service-details-content wow fadeInUp" data-wow-delay=".4s">
                    
                    <img src="assets/img/service/premium-commercial-service.png" alt="Commercial Cleaning Services Chennai" class="img-fluid rounded mb-4 shadow-sm" style="width:100%; max-height:450px; object-fit:cover;">
                    
                    <h2>Trusted Commercial Cleaning Company in Chennai</h2>
                    <p>
                        Maintaining a clean commercial space is essential for brand image, employee productivity, and customer trust. <strong>Kleanmax Pro</strong> delivers industry-grade <strong>commercial cleaning services in Chennai</strong> for large-scale offices, retail outlets, corporate buildings, IT parks, and educational institutions.
                    </p>
                    <p>
                        With over 15 years of expertise, advanced heavy-duty machinery, and eco-friendly chemicals, we ensure hygienic, well-maintained commercial environments across Chennai including OMR, Guindy, T Nagar, Anna Nagar, and Velachery. First impressions matter, and a spotless commercial facility speaks volumes about your business's commitment to quality.
                    </p>

                    <h3>Comprehensive Retail & Corporate Solutions</h3>
                    <p>
                        Commercial cleaning goes far beyond traditional housekeeping. High foot-traffic areas such as retail showrooms, mall corridors, and corporate lobbies require rigorous maintenance to prevent the rapid spread of germs and dirt buildup. We deploy trained janitorial staff who specialize in preserving the aesthetics and hygiene of large spaces, ensuring your property remains spotless around the clock.
                    </p>

                    <div class="row mt-5 mb-4">
                        <div class="col-md-6 mb-4">
                            <h4 style="font-size: 20px; font-weight: 700; color: #001224; margin-bottom: 15px;">What's Included in Our Plan?</h4>
                            <ul class="premium-check-list">
                                <li>Office & commercial floor scrubbing</li>
                                <li>Restroom deep cleaning & sanitization</li>
                                <li>Glass, façade & high partition cleaning</li>
                                <li>Retail & showroom maintenance</li>
                                <li>Carpet & upholstery vacuuming</li>
                                <li>Post-construction commercial cleaning</li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h4 style="font-size: 20px; font-weight: 700; color: #001224; margin-bottom: 15px;">Facilities We Manage</h4>
                            <ul class="premium-check-list">
                                <li>Shopping Malls & Retail Stores</li>
                                <li>Corporate Office Buildings</li>
                                <li>Educational Institutions</li>
                                <li>Hospitals & Clinics</li>
                                <li>Restaurants & Cafes</li>
                                <li>Event Venues & Centers</li>
                            </ul>
                        </div>
                    </div>

                    <h3>Comprehensive Commercial Building Maintenance in Chennai</h3>
                    <p>Retail stores, malls, and commercial complexes experience high foot traffic that quickly wears down floors and accumulates dirt. Our specialized <strong>commercial cleaning services in Chennai</strong> are designed to handle these demanding environments. We provide flexible cleaning schedules—including after-hours and weekend services—to ensure zero disruption to your daily operations. From sparkling shopfront windows to meticulously sanitized restrooms, our commercial health standard compliance guarantees an inviting atmosphere for your customers.</p>

                    <h3>Why Kleanmax Pro is Chennai's First Choice</h3>
                    <div class="row text-center mt-4 mb-5">
                        <div class="col-md-4 mb-3">
                            <div class="tp-service-feature-card">
                                <i class="fas fa-user-shield"></i>
                                <h5>Verified Staff</h5>
                                <p class="small" style="margin-bottom:0;">Background-checked and rigorously trained professionals.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tp-service-feature-card">
                                <i class="fas fa-leaf"></i>
                                <h5>Eco-Solutions</h5>
                                <p class="small" style="margin-bottom:0;">Non-toxic chemicals for a safer environment.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tp-service-feature-card">
                                <i class="fas fa-clock"></i>
                                <h5>Flexible Timing</h5>
                                <p class="small" style="margin-bottom:0;">After-hours or weekend cleaning to avoid disruption.</p>
                            </div>
                        </div>
                    </div>

                    <h3>Frequently Asked Questions</h3>
                    <div class="accordion premium-faq mt-4" id="cleaningFaq">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Do you offer contract-based commercial cleaning?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#cleaningFaq">
                                <div class="accordion-body">
                                    Yes, we offer comprehensive daily, weekly, monthly, and annual commercial cleaning contracts across Chennai tailored exactly to your facility's footfall and operational needs.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Are your cleaning chemicals safe for retail environments?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#cleaningFaq">
                                <div class="accordion-body">
                                    Absolutely. We use eco-friendly, non-toxic, and industry-approved cleaning solutions that eliminate germs without leaving behind harmful residues or strong odors that could bother customers.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Can commercial cleaning be done after business hours?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#cleaningFaq">
                                <div class="accordion-body">
                                    Yes, we understand the importance of not disrupting your business operations. We provide early morning, late-night, and weekend cleaning schedules to suit your specific requirements.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

</main>

<?php if (file_exists('footer.php')) include 'footer.php'; ?>

<!-- JS here -->
<script src="assets/js/vendor/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/swiper-bundle.js"></script>
<script src="assets/js/venobox.min.js"></script>
<script src="assets/js/backToTop.js"></script>
<script src="assets/js/jquery.meanmenu.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/ajax-form.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>
