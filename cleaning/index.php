<?php require_once 'common-for-all.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    


	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 

	<title>Klean Max - Professional Office and Home Cleaning Services in Chennai </title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Klean Max is one of the reputed Company in Chennai for House Cleaning Services in Chennai and Professional Deep Cleaning Services for Office & Commercial Space.">
	<meta name="keywords" content="House Cleaning Services in Chennai, Office Cleaning Services in Chennai, Deep Cleaning Services in Chennai, Facade Cleaning Services in Chennai">
	<meta name="author" content="Klean Max">

	<!-- FAVICON -->
	<link rel="shortcut icon" href="images/favicon">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- ICONS -->
	<link rel="stylesheet" href="css/ilmosys-icons.css">
	<link rel="stylesheet" href="css/icons/fontawesome/css/style.css">
	<link rel="stylesheet" href="css/icons/style.css">
	<link rel="stylesheet" href="css/icons/icon2/style.css">
	<link rel="stylesheet" href="js/vendors/swipebox/css/swipebox.min.css">
    

	<!-- THEME / PLUGIN CSS -->
	<link rel="stylesheet" href="js/vendors/slick/slick.css">
	<link rel="stylesheet" href="css/style.css">
    
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->





<!-- Global site tag (gtag.js) - Google Ads: 608993356 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-608993356"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-608993356');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KVB649K');</script>
<!-- End Google Tag Manager -->

<style type="text/css">
		
		.call-me{
  position: fixed;
  bottom: 25px;
  right: 25px;
  z-index: 99999;
}

.call-me-right {
    right: 25px;
}

/*.call-me a{*/
/*  box-shadow: -3px 2px 6px #00000029;*/

/*}*/

i.fa.fa-whatsapp {
    font-size: 68px;
}

</style>


</head>
<body id="page-top"> 

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVB649K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="body">
	<!-- HEADER -->
	<header>
		<nav class="navbar-inverse navbar-lg navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="" class="navbar-brand brand"><img src="images/klean-logo.png" alt="logo"></a>
                </div>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right navbar-login">
						<li>
							<a href="tel:+91 97101 48218"> <i class="fa fa-phone"></i>+91 97101 48218 </a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						
						
						 <li class="dropdown mm-menu">
							<a class="page-scroll" href="#home">Home</a>
						</li>
						
							<li class="dropdown mm-menu">
							<a class="page-scroll" href="#service">Services</a>
						</li>
						
					   <li class="dropdown mm-menu">
							<a class="page-scroll" href="#reviews">Reviews</a>
						</li>
						
						<li class="dropdown mm-menu">
							<a class="page-scroll" href="#contact">Contact</a>
						</li>
												
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<!-- INTRO -->
	<div id="home" class="intro intro1">
		<div class="overlay"></div>
		<div class="container">
			<div class="row center-content">
				<div class="col-sm-5 col-md-4">
					<div class="intro-form">
						<h4>Best Cleaning Services in Chennai</h4>
						<form action="requestHandler.php" method="post" id="enquiry-form">
							<input name="form-type" value="contact" type="hidden">
							<fieldset>
								<input name="enquiry_name" placeholder="Your Name" required type="text">
                                <input name="enquiry_mobile" placeholder="Mobile No." required type="text" minlength="10" maxlength="10">
                                <input name="enquiry_email" placeholder="Email Address" required type="email">
                                <textarea name="enquiry_message" placeholder="Message"></textarea>
                                <button class="btn btn-block btn-lg btn-primary" name="enquire_submitter" type="submit">Book a cleaning</button>
							</fieldset>
						</form>
                        <?= $obj->logMessage(); ?>
					</div>
				</div>
				<div class="col-sm-7 col-md-push-1">
					<h2>Best Deep Cleaning Service in Chennai</h2>
					<div class="row">
						<div class="col-md-10">
							<div class="intro-box">
								<span class="icon-calendar"></span>
								<div>
									<h4>1. Book a Deep Cleaning from Klean Max</h4>
									<p>You can Call us at +91 97101 48218 and Schedule your Convenient Time for Offering Our Cleaning Services.</p>
								</div>
							</div>
							<div class="intro-box">
								<span class="icon-lock"></span>
								<div>
									<h4>2. Confirm Booking </h4>
									<p>Our Cleaning Experts will get all the requirement from you and confirm the booking.</p>
								</div>
							</div>
							<div class="intro-box">
								<span class="icon-home"></span>
								<div>
									<h4>3. Get Ready to Experience the Magic</h4>
									<p>We provide a unique, high- quality cleaning experience that are par with Five Star Facility and We are Happy to Serve you the Best.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
   
    
	
    <!-- ABOUT -->
    <div id="service" class="container">
	<div class="about-inline text-center">
		<div class="container">
        <p>- WHAT WE DO  -</p>
			<h3>Check out some of our professional<br> Cleaning Services! </h3>
		</div>
	</div>
    
	<!-- INFO CONTENT -->
	<div class="info-content">
		<div class="container">
			<div class="row center-content">
				<div class="col-md-4">
                <h3>Floor Cleaning Services</h3>
					<ul class="list">
					    <li><i class="icon-check"></i> Evaluating the Process and providing the Checklist to Client.</li>
						<li><i class="icon-check"></i> High-End Floor Cleaning</li>
						<li><i class="icon-check"></i> Grinding, Removing Stains and Polishing</li>
						<li><i class="icon-check"></i>Cleaning and Disinfection</li>
						<li><i class="icon-check"></i> Oil & Grease Removal</li>
						<li><i class="icon-check"></i> Stain Removing and Polishing</li>
						<li><i class="icon-check"></i> Protection against dirt, wear & tear</li>
						<li><i class="icon-check"></i> Powerful Deep-cleaning extraction</li>
						
					</ul>
					<div class="space30"></div>
					<a href="#" class="btn btn-lg btn-primary">Book a Cleaning <i class="icon-arrow-right"></i></a>
				</div>
				<div class="col-md-8 text-center">
					<img src="images/services/floor-cleaning.jpg" class="pull-right img-responsive" alt="">
				</div>
			</div>
		</div>
	</div>
	
	<br> <br><br>
	
	<!-- INFO CONTENT -->
	<div class="info-content">
		<div class="container">
			<div class="row center-content">
				<div class="col-md-8 text-center">
					<img src="images/services/carpet-shampooing.jpg" class="pull-right img-responsive" alt="">
				</div>
				<div class="col-md-4">
                <h3>Carpet Shampooing Services</h3>
					<ul class="list">
						<li><i class="icon-check"></i> We Provide Best professional Carpet Shampooing & Cleaning Services in Chennai
using most efficient vacuums and shampoos.</li>
						<li><i class="icon-check"></i>Our Expert Team will neatly relocate the furniture without troubling you.</li>
						<li><i class="icon-check"></i>We will take care of all stubborn stains and ingrained blemishes.</li>
						<li><i class="icon-check"></i>With our highly qualified team, we assure to clean all dirt and dust without leaving any.</li>
						<li><i class="icon-check"></i>We apply Scratch card stain protection that will greatly reduce carpet soiling in the future.</li>
					</ul>
					<div class="space30"></div>
					<a href="#" class="btn btn-lg btn-primary">Book a Cleaning <i class="icon-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	
	<br> <br><br>
	
	<!-- INFO CONTENT -->
	<div class="info-content">
		<div class="container">
			<div class="row center-content">
				<div class="col-md-4">
                <h3>Daily Office Cleaning</h3>
					<ul class="list">
						<li><i class="icon-check"></i> Entrance, reception area and foyer cleaning</li>
						<li><i class="icon-check"></i>  Stair and elevator cleaning</li>
						<li><i class="icon-check"></i>Sweeping and mopping of the floors</li>
						<li><i class="icon-check"></i> Kitchen and lounge area cleaning</li>
						<li><i class="icon-check"></i>Horizontal surface dusting, Floor dusting, wet mop and machine scrubbing</li>
						<li><i class="icon-check"></i>High dusting, Stripping and refinishing, Air condition vent cleaning</li>
						<li><i class="icon-check"></i>Restroom cleaning and disinfecting, Sanitizing all lavatory fixtures, sinks, partitions, walls</li>
						<li><i class="icon-check"></i>Vacuuming & cleaning of light fixtures, baseboards, etc</li>
					</ul>
					<div class="space30"></div>
					<a href="#" class="btn btn-lg btn-primary">Book a Cleaning <i class="icon-arrow-right"></i></a>
				</div>
				<div class="col-md-8 text-center">
					<img src="images/services/office-cleaning-services.jpg" class="pull-right img-responsive" alt="">
				</div>
			</div>
		</div>
	</div>
	
	<br> <br><br>
	
	<!-- INFO CONTENT -->
	<div class="info-content">
		<div class="container">
			<div class="row center-content">
				<div class="col-md-8 text-center">
					<img src="images/services/home-cleaning-services.jpg" class="pull-right img-responsive" alt="">
				</div>
				<div class="col-md-4">
                <h3>Home Cleaning Services</h3>
					<ul class="list">
						<li><i class="icon-check"></i>Dust ceiling fans, wall ornaments</li>
						<li><i class="icon-check"></i>Dust air vents & baseboards</li>
						<li><i class="icon-check"></i>Remove lime, soap, mildew from Grout & Corners</li>
						<li><i class="icon-check"></i>Clean glass shower doors inside & outside</li>
						<li><i class="icon-check"></i>Mirrors & chrome fixtures cleaned & shined</li>
						<li><i class="icon-check"></i>Scrub/disinfect & dry sinks, Scrub and disinfect toilet both inside & outside</li>
						<li><i class="icon-check"></i>Vacuum rugs & return when floor is dry</li>
						<li><i class="icon-check"></i>Empty trash & replace bag, Clean tissue holder & towel racks</li>
						<li><i class="icon-check"></i>Vacuum & scrub/disinfect floor, including corners</li>
					</ul>
					<div class="space30"></div>
					<a href="#" class="btn btn-lg btn-primary">Book a Cleaning <i class="icon-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	
	
</div>

	 <div class="space100"></div>
	 <!-- PARALLAX -->
	<section class="parallax-content parallax1 text-center" data-stellar-background-ratio="0.4">
		<div class="overlay"></div>
		<div class="container">
        <div class="row">
		<div class="col-md-8">
			<h4>Over 200+ companies have already experienced the Professional Cleaning Services of Klean Max.</h4>
		</div>
        <div class="row">
        <div class="col-md-4">
			<a href="#" class="btn btn-lg btn-primary">Book a Cleaning <i class="icon-arrow-right"></i></a>
		</div>
        </div>
        </div>
        </div>
	</section>
	
	
	
	<!-- TESTIMONIALS -->
	<div id="reviews" class="testimonials-white">
    
    <div class="container">
	<div class="about-inline text-center">
        <p>- CUSTOMER REVIEWS  -</p>
			<h3>Read what our past customers said  <br> about our deep cleaning services.  </h3>
	</div>
    
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="quote3">
						<div>
                        	<i class="icon2-Quote"></i>
							<p>"We are really happy with the Facade cleaning services provided. Not only our exterior looks clean, tidy and well managed but they gave a perfect tips to maintain without further damage in the future."</p>
							<span class="author">- Jaganathan-</span> <br />
                            <span class="author-job">Radical Stimulus</span>
						</div>
						<div>
                        	<i class="icon2-Quote"></i>
							<p>"We are highly satisfied with the office cleaning service offered by Klean Max. They are simply experts at work and there is no complaints and we would definitely hire them again"</p>
                            <span class="author">- Ravichandran-</span> <br />
                            <span class="author-job">Project Manager, SAS</span>
						</div>
						<div>
                        	<i class="icon2-Quote"></i>
							<p>"Absolutely recommend Klean Max for the quick turnaround and timely completion of the cleaning service as our property launch was planned on a tight schedule."</p>
                             <span class="author">- Poorna Prakash-</span> <br />
                            <span class="author-job">Fabrecal Infra</span>
						</div>
						<div>
                        	<i class="icon2-Quote"></i>
							<p>"If you are looking for Cleaning services in Chennai, there is no better team than Klean Max to do a Perfect Job for You. I am an highly satisfied customer because of their perfect service as well as the affordable budget."</p>
                             <span class="author">- Sindhu-</span> <br />
                            <span class="author-job">Admin, Dream Realities</span>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

	<!-- TESTIMONIALS -->
	
    
  
    
     <!-- SERVICES -->
	 <div class=" bg-light">
    <div class="container">
	<div class="about-inline text-center">
		<div class="container">
      
			<h3>Reasons to love Klean Max</h3>
			<p>We're different from your typical Office cleaning company. We're out to create magical experience for our Customers. The goal is to WOW you with outstanding cleaning experience.</p>
		</div>
	</div>
    
    <div class="service3 icon-box-square">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="text-center">
						<span><i class="fa fa-1x fa-magic"></i></span>
						<div class="services-content">
							<h2>Trusted & Qualified Cleaners</h2>
							<p style="text-align:justify">At Klean Max, you'll only find the best professionals. All our cleaners are carefully Selected by us and we'd be happy to have Served you to perfection.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="text-center">
						<span><i class="fa fa-1x fa-codepen"></i></span>
						<div class="services-content">
							<h2>Customer Recommended</h2>
							<p style="text-align:justify">Klean Max are continuously reviewed by our customers. Each and every Deep Cleaning Work is being monitored by experts at Klean Max inorder to Give you the Perfect finish.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="text-center">
						<span><i class="fa fa-1x fa-delicious"></i></span>
						<div class="services-content">
							<h2>Commitment to Trust & Safety</h2>
							<p style="text-align:justify">At Klean Max, we go above and beyond to create a more trusted and reliable experience through our highly professional approach.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
        
	 </div>
   </div>
 </div>
 </div>
 
 <!-- INFO CONTENT -->
	<div class="info-content2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Honesty is the best policy.</h3>
                    <div class="space10"></div>
					<p>We just speak honesty. We live by this word and hence No hidden fees, no surprises, no upsells! Only honest work and trustworthy staff.</p>
					
				</div>
			</div>
		</div>
	</div>

    <!-- Intro 1 -->
	<div class="intro intro-benifits2">
		<div class="container">
			<div class="row center-content">
				<div class="col-md-5">
					<h3>We're Chennai's most Reputed Professional Cleaning Service!</h3>
					<p style="text-align:justify">Klean Max is one of the Well known brand in Chennai for Professional Home & Office Cleaning Services. All our staffs are highly qualified professionals and use internationally certified machines, equipment and chemicals to provide a unique, high- quality cleaning experience that are par with Five Star Facility.</p>
					<a href="#home" class="btn btn-lg btn-primary space20 page-scroll">Book a Cleaning</a>
				</div>

				<div class="col-md-7">
					<img src="images/klean-max-about.jpg" class="pull-left img-responsive" alt=""/>
				</div>					
			</div>
		</div>
	</div>
	
	 <!-- Intro 2 -->
	<div class="intro intro-benifits2">
		<div class="container">
			<div class="row center-content">
				<div class="col-md-7">
					<img src="images/about-klean-max-services.jpg" class="pull-left img-responsive" alt=""/>
				</div>	
                 <div class="col-md-5">
					<h3>Why choose Klean Max for Your Commercial Cleaning?</h3>
					<p style="text-align:justify">We offer one stop solution for your house and office cleaning services by doing a detailed assessment of your requirement and provide clear cut cleaning solutions. Our Cleaning services in Chennai includes Deep Cleaning Services, Floor Cleaning Services, Carpet Shampooing Service, Office Cleaning & House Cleaning.</p>
					<a href="#home" class="btn btn-lg btn-primary space20 page-scroll">Book a Cleaning</a>
				</div>				
			</div>
		</div>
	</div>

	
		
     <div class="space100"></div>
	
    <!-- PARALLAX -->
	<section class="parallax-content parallax2 text-center" data-stellar-background-ratio="0.4">
		<div class="overlay"></div>
			<div class="container">
       			<div class="row">
				<div class="col-md-12 tc text-center ">
					<h4>Book Klean Max as your Cleaning Professional!</h4>
					<p>Our Cleaning professionals are trained to pay acute attention to perfection and detail while rendering our services, whether it’s executing housekeeping tasks or maintenance tasks.</p>
           			 <a href="#" class="btn btn-lg btn-primary">CONTACT US TODAY! </a>
				</div>
       		 </div>
        </div>
	</section>
   

   <!-- CONTACT US -->
    <div class="container" id="contact">
	<div class="about-inline text-center">
        <p>- CONTACT US -</p>
			<h3>Customer satisfaction is our top priority,  <br>  Don’t hesitate to contact us </h3>
		</div>
	</div>
	
	<!-- CONTACT INFO -->
	<div id="contact-info">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="c-info">
						<i class="icon-phone"></i>
						<h5><b>Call Us</b></h5>
						<p>+91 97101 48218</p>
					</div>
				</div>

				<div class="col-lg-3 col-sm-6">
					<div class="c-info">
						<i class="icon-envelope"></i>
						<h5><b>Email</b></h5>
						<p><a href="mailto:info@kleanmax.com">info@kleanmax.com</a></p>
					</div>
				</div>

				<div class="col-lg-3 col-sm-6">
					<div class="c-info">
						<i class="icon-map-marker"></i>
						<h5><b>Address</b></h5>
						<p>No. 6, Jayam Industrial Estate, Chettyar Agaram 1st Street, Opp to Ishwarya Appartment, Vanagaram, Chennai - 600095</p>
					</div>
				</div>
                
                <div class="col-lg-3 col-sm-6">
					<div class="c-info">
						<i class="icon-lifesaver"></i>
						<h5><b>WEBSITE</b></h5>
						<p><a href="http://kleanmax.com" >www.kleanmax.com</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- GOOGLE MAP -->
	<div class="google-map">
		<div class="container-fluid no-padding">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d971.7133065706205!2d80.14721182922545!3d13.045012999425493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDAyJzQyLjEiTiA4MMKwMDgnNTEuOSJF!5e0!3m2!1sen!2sin!4v1571223950252!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>		
	</div>
	

<div class="call-me call-me-right"><a href="https://wa.me/+917338882034/?text=Hi%21+KleanMax." class="btn1 btn1-success"><i class="fa fa-whatsapp"></i> </a></div>

	<!-- FOOTER -->
	<footer class="footer2" id="footer2">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<a href="" class="footer-logo"><img src="images/klean-logo.png" alt="logo"></a>
					<p style="text-align:justify">Klean Max is one of the reputed Company in Chennai for Professional Deep Cleaning Services for Office and Commercial Space.</p>
					<div class="space20"></div>
					
				</div>

				<div class="col-md-2 footerP">
					<h5>RELATED LINKS</h5><ul>
					<li><a href="#">Home</a></li>
                    <li><a href="#service"><p>Services</p></a></li>
                    <li><a href="#reviews"><p>Reviews</p></a></li>
                    <li><a href="#contact"><p>Contact Us</p></a></li></ul>
				</div>
                
                <div class="col-md-2 footerP">
					<h5>Main Services</h5><ul>
					<li><a href="#"><p>Commercial Cleaning</p></a></li>
                    <li><a href="#"><p>Facade Cleaning</p></a></li>
                    <li><a href="#"><p>Deep Cleaning</p></a></li>
                    <li><a href="#"><p>Window Cleaning</p></a></li></ul>
				</div>

				<div class="col-md-5">
                 	<h5>Main Services</h5><ul>
					<li><a href="#"><p>Coweb Management</p></a></li>
                    <li><a href="#"><p>Pest Control Services</p></a></li>
                    <li><a href="#"><p>Carpet Cleaning</p></a></li>
                    <li><a href="#"><p>Floor Cleaning</p></a></li></ul>
				</div>
			</div>
		</div>
	</footer>
	
	 	

	<!-- COPYRIGHT -->
	<div class="footer-copy">
		<div class="container">
			&copy; 2021. Klean Max. All rights reserved. Designed by <a href="http://binaryresonance.com/">Binary Tech Resonance</a>
	</div>
</div>



<!-- JAVASCRIPT =============================-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vendors/slick/slick.min.js"></script>
<script src="js/vendors/jquery.easing.min.js"></script>
<script src="js/vendors/stellar.js"></script>
<script src="js/vendors/isotope/isotope.pkgd.js"></script>
<script src="js/vendors/swipebox/js/jquery.swipebox.min.js"></script>
<script src="js/main.js"></script>
<script src="js/vendors/mc/jquery.ketchup.all.min.js"></script>
<script src="js/vendors/mc/main.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/vendors/gmap.js"></script>

<script>
    $(document).ready(function () {
        $('#enquiry-form').validate({
            rules: {
                enquiry_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 15
                },
                enquiry_mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                enquiry_email: {
                    required: true,
                    minlength: 10,
                    email: true
                }
            },
            messages: {
                enquiry_name: {
                    required: 'Enter your Name.',
                    minlength: 'Name should atleast contain 3 characters.',
                    maxlength: 'Name should only contain 15 characters.'
                },
                enquiry_mobile: {
                    required: 'Enter your Mobile number',
                    minlength: 'Mobile should only contain 10 digits. (without +91)',
                    maxlength: 'Mobile should only contain 10 digits. (without +91)',
                    number: 'Enter a valid Mobile number.'
                },
                enquiry_email: {
                    required: 'Enter your Email.',
                    minlength: 'Email address should atleast contain 10 characters.',
                    email: 'Enter a valid Email address to Proceed.'
                }
            }
        });
    })
</script>
</body>


</html>


