<?php ob_start(); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cleaning Equipment Sales, Rental & Service Locations | Chennai, Coimbatore, Bangalore, Hyderabad | Kleanmax Pro</title>
    <meta name="description" content="Kleanmax Pro serves Chennai, Coimbatore, Bangalore, and Hyderabad with premium industrial cleaning equipment sales, rental, and service. Find your nearest location.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/klean-favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/custom-animation.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/venobox.min.css">
    <link rel="stylesheet" href="assets/css/backToTop.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/klean-premium.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
        .tp-main-menu-two ul li a:after { display:none; }

        /* Location Hero */
        .loc-hero {
            background: linear-gradient(135deg, #001224 0%, #002a55 100%);
            padding: 160px 0 80px;
            position: relative;
            overflow: hidden;
        }
        .loc-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(254,209,12,0.08) 0%, transparent 70%);
            border-radius: 50%;
        }
        .loc-hero h1 {
            font-size: 48px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 20px;
            line-height: 1.15;
        }
        .loc-hero h1 span { color: #FED10C; }
        .loc-hero p {
            font-size: 18px;
            color: rgba(255,255,255,0.75);
            max-width: 600px;
        }

        /* City Cards */
        .city-section {
            padding: 80px 0;
            background: #f8f9fa;
        }
        .city-section:nth-child(even) {
            background: #fff;
        }
        .city-anchor-bar {
            background: #001224;
            padding: 18px 0;
            position: sticky;
            top: 80px;
            z-index: 100;
        }
        .city-anchor-bar a {
            color: rgba(255,255,255,0.7);
            font-weight: 600;
            font-size: 15px;
            margin: 0 20px;
            text-decoration: none;
            transition: color 0.3s;
            letter-spacing: 0.5px;
        }
        .city-anchor-bar a:hover { color: #FED10C; }

        /* City Card */
        .city-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.06);
            border: 1px solid #ebebeb;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        .city-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0,18,36,0.12);
            border-color: #FED10C;
        }
        .city-card-header {
            background: linear-gradient(135deg, #001224 0%, #002a55 100%);
            padding: 30px 30px 25px;
            position: relative;
            overflow: hidden;
        }
        .city-card-header::after {
            content: '';
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 120px;
            height: 120px;
            background: rgba(254,209,12,0.08);
            border-radius: 50%;
        }
        .city-card-header .city-icon {
            font-size: 36px;
            color: #FED10C;
            margin-bottom: 12px;
        }
        .city-card-header h3 {
            font-size: 26px;
            font-weight: 800;
            color: #fff;
            margin: 0;
        }
        .city-card-header .city-tag {
            font-size: 13px;
            color: rgba(255,255,255,0.6);
            margin-top: 5px;
        }
        .city-card-body {
            padding: 30px;
        }
        .city-service-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            background: #f8f9fa;
            border-radius: 10px;
            margin-bottom: 12px;
            color: #001224;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            border: 1px solid #ebebeb;
            transition: all 0.3s;
        }
        .city-service-link:hover {
            background: #001224;
            color: #FED10C;
            border-color: #001224;
            transform: translateX(5px);
        }
        .city-service-link i { font-size: 18px; }
        .city-badge {
            display: inline-block;
            background: #FED10C;
            color: #001224;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-left: 8px;
        }

        /* Section header */
        .loc-section-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .loc-section-header .label {
            display: inline-block;
            background: rgba(254,209,12,0.15);
            color: #001224;
            font-size: 13px;
            font-weight: 700;
            padding: 6px 18px;
            border-radius: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }
        .loc-section-header h2 {
            font-size: 38px;
            font-weight: 800;
            color: #001224;
            margin-bottom: 15px;
        }
        .loc-section-header h2 span { color: #FED10C; }
        .loc-section-header p {
            font-size: 16px;
            color: #666;
            max-width: 580px;
            margin: 0 auto;
        }

        /* CTA */
        .loc-cta {
            background: linear-gradient(135deg, #001224 0%, #002a55 100%);
            padding: 80px 0;
            text-align: center;
        }
        .loc-cta h2 { font-size: 36px; font-weight: 800; color: #fff; margin-bottom: 15px; }
        .loc-cta p { color: rgba(255,255,255,0.75); font-size: 17px; margin-bottom: 30px; }
        .btn-yellow { background: #FED10C; color: #001224; font-weight: 700; padding: 15px 40px; border-radius: 50px; text-decoration: none; display: inline-block; transition: 0.3s; }
        .btn-yellow:hover { background: #fff; color: #001224; transform: translateY(-2px); }
    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HXGSEGYXYD"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-HXGSEGYXYD');
    </script>
</head>

<body>
<!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->

    <?php include_once ('header.php') ?>

    <main>
        <!-- Hero -->
        <div class="loc-hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb-menu mb-20">
                            <nav class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items" style="padding:0; list-style:none; display:flex; gap:8px; color:rgba(255,255,255,0.5); font-size:14px;">
                                    <li class="trail-item"><a href="index" style="color:rgba(255,255,255,0.6);">Home</a></li>
                                    <li style="color:rgba(255,255,255,0.4);">/</li>
                                    <li style="color:#FED10C;">Locations</li>
                                </ul>
                            </nav>
                        </div>
                        <h1>Our <span>Service Locations</span><br>Across South India</h1>
                        <p>Kleanmax Pro delivers premium industrial cleaning equipment — sales, rental & service — across four major cities in South India. Find your city below and explore our offerings.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Anchor Bar -->
        <div class="city-anchor-bar">
            <div class="container text-center">
                <a href="#chennai"><i class="fas fa-map-marker-alt me-1"></i> Chennai</a>
                <a href="#coimbatore"><i class="fas fa-map-marker-alt me-1"></i> Coimbatore</a>
                <a href="#bangalore"><i class="fas fa-map-marker-alt me-1"></i> Bangalore</a>
                <a href="#hyderabad"><i class="fas fa-map-marker-alt me-1"></i> Hyderabad</a>
            </div>
        </div>

        <!-- All Cities Section -->
        <section class="py-80 pt-80 pb-80" style="background:#f8f9fa; padding: 80px 0;">
            <div class="container">
                <div class="loc-section-header">
                    <span class="label">Our Presence</span>
                    <h2>Cleaning Equipment Solutions in <span>4 Cities</span></h2>
                    <p>We provide genuine sales, flexible rental plans, and professional servicing of all major cleaning machine brands.</p>
                </div>

                <div class="row g-4">

                    <!-- Chennai -->
                    <div class="col-lg-6" id="chennai">
                        <div class="city-card wow fadeInUp" data-wow-delay=".1s">
                            <div class="city-card-header">
                                <div class="city-icon"><i class="fas fa-city"></i></div>
                                <h3>Chennai <span class="city-badge">HQ</span></h3>
                                <div class="city-tag"><i class="fas fa-map-marker-alt me-1"></i> Tamil Nadu</div>
                            </div>
                            <div class="city-card-body">
                                <p style="color:#666; margin-bottom:20px; font-size:15px;">Our headquarters city. Serving all major industrial zones — Oragadam, Guindy, Ambattur, Manali, and more.</p>
                                <a href="sales-service" class="city-service-link">
                                    <span><i class="fas fa-shopping-cart me-2" style="color:#FED10C;"></i> Cleaning Equipment Sales</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <a href="klean-max-service" class="city-service-link">
                                    <span><i class="fas fa-tools me-2" style="color:#FED10C;"></i> Cleaning Equipment Service</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <a href="rental-service" class="city-service-link">
                                    <span><i class="fas fa-handshake me-2" style="color:#FED10C;"></i> Cleaning Equipment Rental</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Coimbatore -->
                    <div class="col-lg-6" id="coimbatore">
                        <div class="city-card wow fadeInUp" data-wow-delay=".2s">
                            <div class="city-card-header">
                                <div class="city-icon"><i class="fas fa-industry"></i></div>
                                <h3>Coimbatore</h3>
                                <div class="city-tag"><i class="fas fa-map-marker-alt me-1"></i> Tamil Nadu</div>
                            </div>
                            <div class="city-card-body">
                                <p style="color:#666; margin-bottom:20px; font-size:15px;">Serving Coimbatore's thriving textile mills, engineering firms, and commercial complexes with top-grade cleaning solutions.</p>
                                <a href="sales-service-coimbatore" class="city-service-link">
                                    <span><i class="fas fa-shopping-cart me-2" style="color:#FED10C;"></i> Cleaning Equipment Sales</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <a href="klean-max-service-coimbatore" class="city-service-link">
                                    <span><i class="fas fa-tools me-2" style="color:#FED10C;"></i> Cleaning Equipment Service</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <a href="rental-service-coimbatore" class="city-service-link">
                                    <span><i class="fas fa-handshake me-2" style="color:#FED10C;"></i> Cleaning Equipment Rental</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Bangalore -->
                    <div class="col-lg-6" id="bangalore">
                        <div class="city-card wow fadeInUp" data-wow-delay=".3s">
                            <div class="city-card-header">
                                <div class="city-icon"><i class="fas fa-microchip"></i></div>
                                <h3>Bangalore</h3>
                                <div class="city-tag"><i class="fas fa-map-marker-alt me-1"></i> Karnataka</div>
                            </div>
                            <div class="city-card-body">
                                <p style="color:#666; margin-bottom:20px; font-size:15px;">Catering to Bangalore's IT parks, manufacturing hubs, and large commercial facilities in Whitefield, Electronic City, and beyond.</p>
                                <a href="sales-service-bangalore" class="city-service-link">
                                    <span><i class="fas fa-shopping-cart me-2" style="color:#FED10C;"></i> Cleaning Equipment Sales</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <a href="klean-max-service-bangalore" class="city-service-link">
                                    <span><i class="fas fa-tools me-2" style="color:#FED10C;"></i> Cleaning Equipment Service</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <a href="rental-service-bangalore" class="city-service-link">
                                    <span><i class="fas fa-handshake me-2" style="color:#FED10C;"></i> Cleaning Equipment Rental</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Hyderabad -->
                    <div class="col-lg-6" id="hyderabad">
                        <div class="city-card wow fadeInUp" data-wow-delay=".4s">
                            <div class="city-card-header">
                                <div class="city-icon"><i class="fas fa-landmark"></i></div>
                                <h3>Hyderabad</h3>
                                <div class="city-tag"><i class="fas fa-map-marker-alt me-1"></i> Telangana</div>
                            </div>
                            <div class="city-card-body">
                                <p style="color:#666; margin-bottom:20px; font-size:15px;">Serving Hyderabad's pharmaceutical plants, IT corridors, and warehouse complexes in HITEC City, Gachibowli, and Patancheru.</p>
                                <a href="sales-service-hyderabad" class="city-service-link">
                                    <span><i class="fas fa-shopping-cart me-2" style="color:#FED10C;"></i> Cleaning Equipment Sales</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <a href="klean-max-service-hyderabad" class="city-service-link">
                                    <span><i class="fas fa-tools me-2" style="color:#FED10C;"></i> Cleaning Equipment Service</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <a href="rental-service-hyderabad" class="city-service-link">
                                    <span><i class="fas fa-handshake me-2" style="color:#FED10C;"></i> Cleaning Equipment Rental</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="loc-cta">
            <div class="container">
                <h2>Not Sure Which Location Serves You?</h2>
                <p>Call us and our team will connect you with the right city representative instantly.</p>
                <a href="contact" class="btn-yellow me-3">Enquire Now</a>
                <a href="tel:+917338882034" class="btn btn-outline-light" style="padding: 14px 38px; border-radius: 50px; font-weight: 700;">Call: +91 73388 82034</a>
            </div>
        </section>

    </main>

    <?php include_once ('footer.php') ?>

    <!-- JS here -->
    <script src="assets/js/vendor/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.js"></script>
    <script src="assets/js/venobox.min.js"></script>
    <script src="assets/js/backToTop.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
<?php ob_end_flush(); ?>
