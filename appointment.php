<?php
require_once'login.php';
$connect=new mysqli($hn,$un,$pw,$db);

if($connect->connect_error)die($connect->connect_error);


if( isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['users']) &&
    isset($_POST['email']) &&
    isset($_POST['password']))
    {
    $firstname   = get_post($connect, 'firstname');
    $lastname   = get_post($connect, 'lastname');
    $email    = get_post($connect, 'email');
    $password     = get_post($connect, 'password');


    $users = get_post($connect,'users');

$query  = "SELECT * FROM users";
 $result = $connect->query($query);
 if (!$result) die ("Database access failed: " . $connect->error);

 $rows = $result->num_rows;

 $email_exist ="false";

 for ($j = 0 ; $j < $rows ; ++$j)
 {
   $result->data_seek($j);
   $row = $result->fetch_array(MYSQLI_NUM);
   if($row[3]==$email){
  $email_exist="true"; }
}

if($email_exist=="false"){

    $query = "insert into users(fname,lname,utype,email,psd)values('$firstname','$lastname','$users','$email','$password')";
    $result = $connect->query($query);


    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
else if(result)
echo "Insertion Successful";}
else{
echo "Enter a different email !! This email has been registered !!";

$email_exits="false";
}

}

echo <<<_END

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mediplus | Appointments</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  	<div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+1 226 235 5998</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">malik11y@uwindsor.ca</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><a href="signup.php" class="mr-3">Sign Up</a><a href="login_users.php">Sign In</a></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Mediplus</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="index.php#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="index.php#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="index.php#department-section" class="nav-link"><span>Department</span></a></li>
	          <li class="nav-item"><a href="index.php#doctor-section" class="nav-link"><span>Doctors</span></a></li>
	          <li class="nav-item"><a href="index.php#blog-section" class="nav-link"><span>Blog</span></a></li>
	          <li class="nav-item"><a href="index.php#contact-section" class="nav-link"><span>Contact</span></a></li>
	          <li class="nav-item cta mr-md-2"><a href="appointment.php" class="nav-link">Appointment</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	  
	  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-4">
            <h1 class="mb-3 bread">Appointment</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Appointment <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-5 d-flex">
    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(images/about.jpg);">
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-7 pl-lg-5 py-md-5">
    				<div class="py-md-5">
	    				<div class="row justify-content-start pb-3">
			          <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
			            <h2 class="mb-4">We Are <span>Mediplus</span> A Medical Clinic</h2>
			            <p>With awarded winning research in auto immune deficiency and tubular contraction. We pair the greatest minds in the world with our state of the art campus and resources. Offering for a great, and hopeful experience at a trying time.</p>
			            <p><a href="#" class="btn btn-primary py-3 px-4">Make an appointment</a> <a href="index.php#contact-section" class="btn btn-secondary py-3 px-4">Contact us</a></p>
			          </div>
			        </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light">
			<div class="container">
        <div class="row d-flex">
	        <div class="col-md-7 py-5">
	        	<div class="py-lg-5">
		        	<div class="row justify-content-center pb-5">
			          <div class="col-md-12 heading-section ftco-animate">
			            <h2 class="mb-3">Our Services</h2>
			          </div>
			        </div>
			        <div class="row">
			        	<div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-ambulance"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">Emergency Services</h3>
			                <p>Our location allows for immediate emergency pickup anywhere in the Windsor area, with a maximum waiting time of 30 minutes.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-doctor"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">Qualified Doctors</h3>
			                <p>Our campus boasts some of the smartest minds in the medical profession. With research awards in Auto Immune Deficiency, and Tubular Contraction; we offer a world renowned staff.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-stethoscope"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">Outdoors Checkup</h3>
			                <p>You can now ask for outdoor or homecare assistance.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-24-hours"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">24 Hours Service</h3>
			                <p>The emergence ward of the hospital functions 24/7, weekdays and weekends. Allowing for immediate and reliant access to your services.</p>
			              </div>
			            </div>      
			          </div>
			        </div>
			      </div>
		      </div>
		      <div class="col-md-5 d-flex">
	        	<div class="appointment-wrap bg-white p-5 d-flex align-items-center">
		        	<form action="#" class="appointment-form ftco-animate">
		        		<h3>Free Consultation</h3>
		    				<form action="scheduledapp.php" class="appointment-form ftco-animate" method="post">

<label>First name  </label><input type="text" name="firstname" id="firstname" /><br /><br>
<label>Last name  </label><input type="text" name="lastname" id="lastname" /><br /><br>
<label>User Type  </label><select name="users">
    <option value="1">guest</option>
    <option value="2">admin</option>
    </select><br /><br>
<label>E-mail  </label><input type="text" name="email" id="email" required/><br /><br>
<label>Password  </label><input type="text" name="password" id="password" required/><br /><br>
<input value="Submit" type="submit" />

</form>
			              </div>
			    				</div>
		    					
		</section>

		<section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Get Every Single Update Here</h2>
            <p>Our staff write weekly blogs, to keep you updated on the fast moving medical industry</p>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 13, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing Is You Don’t Get Enough Sleep</a></h3>
                <p>Researchers believe the average adult gets 5 total hours of sleep a night, the recommended daily amount is 8-9.</p>
                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Researchers are working on the future</a></h3>
                <p>Researchers in our campus, have been working on an anti secreding genome to allow for quick recovery of joints.</p>
                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 8, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 2</a></div>
                </div>
                <h3 class="heading"><a href="#">Children are pushing the Medical Field Forward</a></h3>
                <p>Many pediatricians are now going to there young patients, for help in observations.</p>
                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>
        </div>
      </div>
    </section>


    <footer class="ftco-footer ftco-section img" style="background-image: url(images/footer-bg.jpg);">
    	<div class="overlay"></div>
      <div class="container-fluid px-md-5">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Mediplus</h2>
              <p>We are here, for you!</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Departments</h2>
              <ul class="list-unstyled">
                <li><a href="index.html#department-section"><span class="icon-long-arrow-right mr-2"></span>Neurology</a></li>
                <li><a href="index.html#department-section"><span class="icon-long-arrow-right mr-2"></span>Opthalmology</a></li>
                <li><a href="index.html#department-section"><span class="icon-long-arrow-right mr-2"></span>Nuclear Magnetic</a></li>
                <li><a href="index.html#department-section"><span class="icon-long-arrow-right mr-2"></span>Surgical</a></li>
                <li><a href="index.html#department-section"><span class="icon-long-arrow-right mr-2"></span>Cardiology</a></li>
                <li><a href="index.html#department-section"><span class="icon-long-arrow-right mr-2"></span>Dental</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.html#home-section"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="index.html#about-section"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="index.html#department-section"><span class="icon-long-arrow-right mr-2"></span>Departments</a></li>
                <li><a href="index.html#doctor-section"><span class="icon-long-arrow-right mr-2"></span>Doctors</a></li>
                <li><a href="index.html#blog-section"><span class="icon-long-arrow-right mr-2"></span>Blog</a></li>
                <li><a href="#pricing-section"><span class="icon-long-arrow-right mr-2"></span>Pricing</a></li>
                <li><a href="index.html#contact-section"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#about-section"><span class="icon-long-arrow-right mr-2"></span>Emergency Services</a></li>
                <li><a href="#about-section"><span class="icon-long-arrow-right mr-2"></span>Qualified Doctors</a></li>
                <li><a href="#about-section"><span class="icon-long-arrow-right mr-2"></span>Outdoors Checkup</a></li>
                <li><a href="#about-section"><span class="icon-long-arrow-right mr-2"></span>24 Hours Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">198 West Wyandotte Street, Windsor, Ontario, Canada</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+1 226 235 5998</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">malik11y@uwindsor.ca</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
	
            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>
_END;




$result->close();
$connect->close();
function get_post($connect, $var)  {
   return $connect->real_escape_string($_POST[$var]); }



?>
