<?php
ob_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rental Service of Cleaning Equipment's| Cleaning Machine Rental In Chennai | Kleanmax Pro</title>
    <meta name="description" content="Cleaning Machine Rentals in Chennai, Kleanmax Pro Cleaning Equipment, Including Auto Scrubbers, Ride-On Sweepers, Vacuum Cleaners, And More. Flexible Plans, Reliable Service, And Well-Maintained Machines.">
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
        
        /* Premium Service Sidebar */
        .tp-service-widget {
            background: #001224;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            position: sticky;
            top: 100px;
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
            font-size: 20px;
            font-weight: 800;
            color: #001224;
            margin-bottom: 15px;
        }
        
        /* Premium Product Layout */
        .premium-product-card {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 40px;
            border: 1px solid #ebebeb;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
        }
        .premium-product-card:hover {
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            transform: translateY(-3px);
            border-color: #FED10C;
        }
        .premium-product-img {
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            padding: 15px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .premium-product-img img {
            max-height: 250px;
            object-fit: contain;
            transition: transform 0.5s ease;
        }
        .premium-product-card:hover .premium-product-img img {
            transform: scale(1.05);
        }
        .tp-service-details-subtitle {
            font-size: 26px;
            font-weight: 800;
            color: #001224;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 12px;
        }
        .tp-service-details-subtitle::after {
            content: '';
            width: 50px;
            height: 3px;
            background: #fed10c;
            position: absolute;
            bottom: 0;
            left: 0;
        }
        .kleanmax-subtitle {
            font-size: 22px;
            border-bottom: none;
            padding-bottom: 0;
        }
        .kleanmax-subtitle::after {
            display: none;
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
            color: #444;
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

        /* CTA */
        .cta-box {
            background: #001224;
            color: #fff;
            padding: 50px 40px;
            border-radius: 16px;
            margin-top: 50px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .btn-custom { background: #fed10c; color: #000; font-weight: 700; padding: 15px 35px; border-radius: 5px; text-decoration: none; transition: 0.3s; display: inline-block; }
        .btn-custom:hover { background: #fff; color: #000; transform: translateY(-2px); }
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
        <!-- breadcrumb area start -->
        <div class="tp-page-title-area pt-180 pb-70 position-relative fix" data-background="assets/img/slider/breadcrumb-9.jpg">
            <div class="tp-custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-page-title z-index">
                            <h2 class="breadcrumb-title"><span style="color:#fed10c;">Rental Service</span></h2>
                            <div class="breadcrumb-menu">
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin"><a href="index">Home</a>
                                        </li>
                                        <li class="trail-item trail-begin"><a href="cleaning-services">Other Services</a>
                                        </li>
                                        <li class="trail-item trail-end"><span>Rental Service</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- faq area start here -->
        <section class="tp-service-details-area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="tp-service-widget wow fadeInUp" data-wow-delay=".2s">
                            <h4 class="tp-service-widget-title">Other Services</h4>
                            <div class="tp-service-widget-list">
                                <ul>
                                    <li><a href="sales-service">Sales <i class="fas fa-angle-right"></i></a></li>
                                    <li><a href="klean-max-service">Service <i class="fas fa-angle-right"></i></a></li>
                                    <li><a href="rental-service" class="active">Rental <i class="fas fa-angle-right"></i></a></li>
                                </ul>
                            </div>

                            <div class="tp-service-quote-box mt-4">
                                <h4>Need to Rent?</h4>
                                <p style="color: #001224; font-weight: 500; margin-bottom: 20px; font-size: 14px;">Contact our rental team for customized machinery rental plans.</p>
                                <a href="contact" class="theme-btn text-center w-100" style="background:#001224; color:#fff;">Contact Rentals</a>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="col-xl-8 col-lg-8">
                        <div class="tp-service-details wow fadeInUp" data-wow-delay=".4s">
                            
                            <!-- Hero Images -->
                            <div class="row mb-30">
                                <div class="col-12">
                                    <div class="premium-product-img mb-30" style="padding: 0;">
                                        <img src="assets/img/service/premium-rental-banner.png" alt="Cleaning Equipments Rental Service" class="img-fluid rounded" style="max-height: 450px; width: 100%; object-fit: cover;">
                                    </div>
                                </div>
                            </div>

                            <h2 class="tp-section-title heading-color-black mb-20" style="font-size: 32px;">Cleaning Equipment's Rental Service in Chennai</h2>
                            <p class="mb-20" style="font-size: 16px; color: #555; line-height: 1.8;">Maximize your operational efficiency without the hefty capital investment by choosing our flexible multibrand cleaning equipment rental services in Chennai. We cater to domestic, commercial, and industrial cleaning requirements with a comprehensive range of premium scrubbers, sweepers, and industrial vacuums. Whether you need heavy-duty machinery for daily, weekly, or yearly leasing, our well-maintained rental equipment helps you achieve immaculate hygiene standards, eliminate maintenance costs, and effortlessly manage seasonal deep-cleaning projects.</p>
                            
                            <ul class="premium-check-list mb-40">
                                <li>No need for massive capital investment in uncertain markets.</li>
                                <li>Perfect for short period requirements or one-off tasks.</li>
                                <li>Simply save your money.</li>
                                <li>No need to spend on maintenance services & spares.</li>
                                <li>Excellent for construction project handing over cleaning.</li>
                                <li>Ideal for one-time cleaning service contractors.</li>
                                <li>Time-sensitive needs with a high sense of urgency.</li>
                            </ul>

                            <h3 class="tp-service-details-subtitle mb-40">Our Range of Products</h3>

                            <!-- Product 1: Auto Scrubber -->
                            <div class="premium-product-card">
                                <div class="row align-items-center">
                                    <div class="col-xl-5">
                                        <div class="premium-product-img">
                                            <img src="assets/img/service/auto-scrubber.jpg" alt="Auto Scrubber Machine">
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <h3 class="tp-service-details-subtitle kleanmax-subtitle">Auto Scrubber</h3>
                                        <p class="mb-10" style="color: #555;">Walk-behind machine that scrubs, cleans, and dries floors in a single pass. Ideal for commercial &amp; industrial spaces above 3,000 sqft.</p>
                                        <a href="product-auto-scrubber" class="btn-custom mt-3" style="padding: 10px 24px; font-size: 14px;">Learn More</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 2: Ride on Scrubber -->
                            <div class="premium-product-card">
                                <div class="row align-items-center flex-row-reverse">
                                    <div class="col-xl-5">
                                        <div class="premium-product-img">
                                            <img src="assets/img/service/floor-scrubber.jpg" alt="Ride on Scrubber Machine">
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <h3 class="tp-service-details-subtitle kleanmax-subtitle">Ride-On Scrubber</h3>
                                        <p class="mb-10" style="color: #555;">Operator-seated machine for massive floor coverage. Covers up to 8,000 m²/hr — ideal for warehouses, airports, and large manufacturing plants.</p>
                                        <a href="product-ride-on-scrubber" class="btn-custom mt-3" style="padding: 10px 24px; font-size: 14px;">Learn More</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 3: Ride on Sweeper -->
                            <div class="premium-product-card">
                                <div class="row align-items-center">
                                    <div class="col-xl-5">
                                        <div class="premium-product-img">
                                            <img src="assets/img/service/floor-sweepers.jpg" alt="Ride on Floor Sweeper">
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <h3 class="tp-service-details-subtitle kleanmax-subtitle">Ride-On Sweeper</h3>
                                        <p class="mb-10" style="color: #555;">Heavy-duty sweeper with dust-free filtration for large indoor &amp; outdoor areas. Perfect for construction sites, factory yards, and parking lots.</p>
                                        <a href="product-ride-on-sweeper" class="btn-custom mt-3" style="padding: 10px 24px; font-size: 14px;">Learn More</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 4: Single Disc Scrubber -->
                            <div class="premium-product-card">
                                <div class="row align-items-center flex-row-reverse">
                                    <div class="col-xl-5">
                                        <div class="premium-product-img">
                                            <img src="assets/img/service/single-disc-scrubbers.jpg" alt="Single Disc Scrubber Machine">
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <h3 class="tp-service-details-subtitle kleanmax-subtitle">Single Disc Scrubber</h3>
                                        <p class="mb-10" style="color: #555;">Versatile multi-purpose floor machine that scrubs, polishes, strips, and buffs. Works on marble, tile, vinyl, granite, and carpet.</p>
                                        <a href="product-single-disc-scrubber" class="btn-custom mt-3" style="padding: 10px 24px; font-size: 14px;">Learn More</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 5: Vacuum Cleaner -->
                            <div class="premium-product-card">
                                <div class="row align-items-center">
                                    <div class="col-xl-5">
                                        <div class="premium-product-img">
                                            <img src="assets/img/service/vacuum-cleaner.jpg" alt="Industrial Wet Dry Vacuum Cleaner">
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <h3 class="tp-service-details-subtitle kleanmax-subtitle">Industrial Vacuum Cleaner</h3>
                                        <p class="mb-10" style="color: #555;">Powerful wet &amp; dry industrial vacuum for post-construction cleanup, liquid spills, and deep carpet extraction. Available with optional HEPA filtration.</p>
                                        <a href="product-vacuum-cleaner" class="btn-custom mt-3" style="padding: 10px 24px; font-size: 14px;">Learn More</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 mb-4">
                                <h3 class="tp-service-details-subtitle">Trusted Cleaning Equipment Rental in Chennai</h3>
                                <p style="color: #555;">Renting industrial cleaning machines in Chennai is a smart, cost-effective way to keep your premises immaculate without the heavy upfront investment. From compact floor scrubbers for retail spaces in T-Nagar to massive ride-on sweepers for warehouses in Ambattur, we stock a comprehensive range of premium, well-maintained equipment. Our flexible rental plans are designed to accommodate daily, weekly, and monthly requirements—ensuring you always have the right machine exactly when you need it.</p>
                            </div>
                            
                            <h3 class="tp-service-details-subtitle mt-50">Why Rent from Klean Max Pro?</h3>
                            <div class="row text-center mt-4">
                                <div class="col-md-4 mb-3">
                                    <div class="tp-service-feature-card">
                                        <i class="fas fa-wallet"></i>
                                        <h5>Cost Effective</h5>
                                        <p class="small" style="margin-bottom:0;">No hefty initial investments. Rent what you need, when you need.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="tp-service-feature-card">
                                        <i class="fas fa-calendar-alt"></i>
                                        <h5>Flexible Terms</h5>
                                        <p class="small" style="margin-bottom:0;">Short-term, long-term, and even daily rentals available.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="tp-service-feature-card">
                                        <i class="fas fa-wrench"></i>
                                        <h5>Zero Maintenance</h5>
                                        <p class="small" style="margin-bottom:0;">Skip the repair and spares costs, we handle the upkeep.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="cta-box">
                                <h2 class="text-white mb-15">Ready to Rent Cleaning Machinery?</h2>
                                <p style="color: rgba(255,255,255,0.8); font-size: 18px;">Get premium machines tailored for your budget in Chennai.</p>
                                <div class="mt-4">
                                    <a href="contact" class="btn-custom">Request Rental Plan</a>
                                    <a href="tel:+919876543210" class="btn btn-outline-light ms-3" style="padding: 13px 35px; border-radius: 5px; font-weight: 700;">Call Us Now</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq area end here -->
    
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
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
<?php ob_end_flush(); ?>
