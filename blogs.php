<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog | Kleanmax Pro - Industrial Cleaning Insights</title>
    <meta name="description" content="Read the latest insights and guides on commercial and industrial cleaning equipment by Kleanmax Pro.">
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
        .blog-card-premium {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0,0,0,0.06);
            transition: all 0.4s ease;
            border: 1px solid #f0f0f0;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .blog-card-premium:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0,34,68,0.12);
        }
        .blog-img-wrapper {
            position: relative;
            overflow: hidden;
            padding-top: 60%; /* 16:9 aspect ratio roughly */
        }
        .blog-img-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .blog-card-premium:hover .blog-img-wrapper img {
            transform: scale(1.08);
        }
        .blog-content {
            padding: 35px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .blog-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            font-size: 14px;
            font-weight: 600;
            color: #FED10C;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .blog-meta span i {
            margin-right: 5px;
        }
        .blog-title {
            font-size: 24px;
            font-weight: 800;
            color: #001224;
            margin-bottom: 15px;
            line-height: 1.4;
        }
        .blog-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s;
        }
        .blog-title a:hover {
            color: #FED10C;
        }
        .blog-excerpt {
            color: #666;
            margin-bottom: 25px;
            line-height: 1.7;
            flex-grow: 1;
        }
        .read-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            color: #001224;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        .read-more-btn i {
            font-size: 14px;
            transition: transform 0.3s;
        }
        .read-more-btn:hover {
            color: #FED10C;
        }
        .read-more-btn:hover i {
            transform: translateX(5px);
        }
    </style>
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
        <div class="tp-page-title-area pt-180 pb-70 position-relative fix" data-background="assets/img/slider/breadcrumb-3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-page-title z-index">
                            <h2 class="breadcrumb-title">Our <span style="color: #FED10C;">Blog</span></h2>
                            <div class="breadcrumb-menu">
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin"><a href="index">Home</a></li>
                                        <li class="trail-item trail-end"><span>Blog</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- blog list area start -->
        <section class="tp-blog-area pt-100 pb-100" style="background-color: #fcfcfc;">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-60 wow fadeInUp" data-wow-delay=".2s">
                        <h2 class="tp-section-title heading-color-black">News & Articles</h2>
                    </div>
                </div>
                <div class="row g-5">
                    
                    <!-- Blog Item 1 -->
                    <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay=".4s">
                        <div class="blog-card-premium">
                            <div class="blog-img-wrapper">
                                <a href="blog-1">
                                    <!-- Using placeholder image from existing assets for the blog -->
                                    <img src="assets/img/service/blog-1-banner.png" alt="Industrial Floor Scrubbers">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span><i class="far fa-calendar-alt"></i> September 14, 2022</span>
                                    <span><i class="far fa-tag"></i> Equipment Guide</span>
                                </div>
                                <h3 class="blog-title"><a href="blog-1">The Importance of Industrial Floor Scrubbers for Warehouse Safety</a></h3>
                                <p class="blog-excerpt">Maintaining a clean warehouse isn't just about aesthetics; it's a critical component of workplace safety and operational efficiency. Discover how investing in the right industrial floor scrubber can prevent accidents, reduce labor costs, and protect your inventory.</p>
                                <div>
                                    <a href="blog-1" class="read-more-btn">Read Article <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Item 2 -->
                    <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay=".6s">
                        <div class="blog-card-premium">
                            <div class="blog-img-wrapper">
                                <a href="blog-2">
                                    <img src="assets/img/service/blog-2-banner.png" alt="Renting Commercial Cleaning Equipment">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span><i class="far fa-calendar-alt"></i> March 22, 2025</span>
                                    <span><i class="far fa-tag"></i> Buying Advice</span>
                                </div>
                                <h3 class="blog-title"><a href="blog-2">Buying vs. Renting Commercial Cleaning Equipment: What's Best?</a></h3>
                                <p class="blog-excerpt">Choosing between purchasing or renting commercial cleaning equipment depends heavily on your facility's size, budget, and long-term goals. We break down the pros and cons to help you make an informed decision for your business's bottom line.</p>
                                <div>
                                    <a href="blog-2" class="read-more-btn">Read Article <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- blog list area end -->

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
