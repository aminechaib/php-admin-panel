<?php 
require_once('../database.php');
  require_once('../admin/scripts/CategoryManager.php');

  $categoryManager= new CategoryManager($conn);
  $categories = $categoryManager->get();

 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	 
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">0555 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">email@email.com</span>
					    </div>
					   
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Badwa</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			  <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
			  <li class="nav-item active"><a href="javascript:void(0);" onclick="scrollToSection('about')" class="nav-link">à propos</a></li>
			  <li class="nav-item active"><a href="javascript:void(0);" onclick="scrollToSection('featured-products')" class="nav-link">nos Products</a></li>
			  <li class="nav-item active"><a href="javascript:void(0);" onclick="scrollToSection('google-maps')" class="nav-link">Adresse</a></li>
			  <li class="nav-item active"><a href="javascript:void(0);" onclick="scrollToSection('contact')" class="nav-link">contact</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services justify-content-center">
       
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate ">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
									<div class="text text-center">
										<h2>Badwa</h2>
										<p>Protège la santé de chaque maison</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-1.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Fruits</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-2.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Vegetables</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-3.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Juices</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-4.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Dried</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section img " id="about" style="background-image: url(images/bg_3.jpg);">
			<div class="container">
					<div class="row justify-content-end">
			  <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
				<h2 class="mb-4 subheading">Badwa</h2>
				<h2 class="mb-4 subheading">Notre histoire</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			<div>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos sequi, accusamus 
					ducimus voluptatibus quaerat quo minima animi illum et repellat voluptate officiis aliquam 
					quibusdam expedita nisi natus qui repudiandae. Aut.</p>
			</div>
			  </div>
			</div>   		
			</div>
		</section>


		<section id="featured-products" class="ftco-section testimony-section">
			<div class="container">
			  <div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate text-center">
					<span class="subheading">Badwa</span>
				  <h2 class="mb-4">Nos produits</h2>
				  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
				</div>
			  </div>
			  <div class="row ftco-animate">
				<div class="col-md-12">
				  <div class="carousel-testimony owl-carousel">
			
          <?php
        if(!empty($categories)) {
           
        $sn = 1;
       foreach($categories as $data){
		//  var_dump($data);
        ?>
					<div class="item">
					  <div class="testimony-wrap p-4 pb-5">
						<div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
						</div>
						<div class="text text-center">
						  <p class="name"><?= $data['categoryName']; ?></p>
              <p class="mb-5 pl-4 line"><?=$data['discreption'] ?></p>
						 
						  <span class="position"><?= $data['prix']; ?> DZD</span>
						</div>
					  </div>
					</div>
          <?php 
        $sn++; }
        } 
       ?>

				  </div>
				</div>
			  </div>
			</div>
		  </section>


	<section id="google-maps" class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate text-center">
					<span class="subheading">Location</span>
					<h2 class="mb-4">Our Office Location</h2>
					<p>Visit us at our office. Here's our location on the map:</p>
				</div>
			</div>
			<div class="row ftco-animate">
				<div class="col-md-12 text-center">
					<div class="map-container">
						<!-- Replace the existing iframe code with your Google Maps iframe code -->
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d6390.172075107102!2d3.0480712946607555!3d36.792487488996954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s10%20boulevard%20abderrahmane%20mira%3B%20Commune%20%3A%20Bab%20el%20oued%20maps!5e0!3m2!1sfr!2sdz!4v1706538677229!5m2!1sfr!2sdz" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>					</div>
				</div>
			</div>
		</div>
	</section>
	


		<section id="contact" class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Badwa</h2>
              <p>Far far away, behind the word mountains, <br> far from the countries Vokalia and Consonantia.</p>
            </div>
          </div>
		
		 
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li><br>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
			
            </div>
          </div>
        </div>

		<div class="col-md-12 text-center">
			<div class="d-felx justify-content-center align-items-center">
				<ul class="ftco-footer-social list-unstyled">
					<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
					<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
				  </ul>
			  </div>
			</div>

        <div class="row">
          <div class="col-md-12 text-center">
			

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with by BC
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/nav.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>

  
    
  </body>
</html>