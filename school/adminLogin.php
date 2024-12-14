<?php
include("admin/Connection.php");

session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 

	  $conec = new Connection();
	  $con = $conec->Open();
	  if ($con) {
	  $selectQuery= "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
	  $stmt = $con->prepare($selectQuery);
	  $stmt->execute();
	  $count=$stmt->rowCount();
	  $data=$stmt->fetch(PDO::FETCH_OBJ);
	  
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['uid']=$data->username;   
         header("location: admin/adminActivityPage");
      }else {
         echo '<script>alert("Please Check Your Username and Password !!");</script>';
      }
   }
   }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sunrise International Public School</title>

        <meta charset="utf-8">
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.2/css/font-awesome.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/sips_logo.ico" />
        <meta name="theme-color" content="#2874A6">
        <style>
            .floating-form { /*contact form wrapper*/
                max-width: 300px;
                padding: 30px 30px 10px 30px;
                margin-top: 180px;
                border: 1px solid #ddd;
                right: 10px;
                background-color: #fff;
                position: fixed; /*Form position fixed*/
            }
            .contact-opener { /*opener button*/
                position: absolute;
                left: -53px;
                top: 100px;
                padding: 9px;
                color: #2222;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.43);
                cursor: pointer;
                border-radius: 5px 5px 0px 0px;
            }

        </style>

        <script>
            $(window).load(function () {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");
                ;
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {

                $(window).scroll(function () {

                    console.log($(window).scrollTop())
                    if ($(window).scrollTop() > 280) {
                        $('#subNavBar').addClass('navbar-fixed');
                    }
                    if ($(window).scrollTop() < 281) {
                        $('#subNavBar').removeClass('navbar-fixed');
                    }
                });
            });

        </script>
        <script>

            $(document).ready(function () {
                var _scroll = true, _timer = false, _floatbox = $("#contact_form"), _floatbox_opener = $(".contact-opener");
                _floatbox.css("right", "-300px"); //initial contact form position

                //Contact form Opener button
                _floatbox_opener.click(function () {
                    if (_floatbox.hasClass('visiable')) {
                        _floatbox.animate({"right": "-300px"}, {duration: 300}).removeClass('visiable');
                    } else {
                        _floatbox.animate({"right": "0px"}, {duration: 300}).addClass('visiable');
                    }
                });

                //Effect on Scroll
                $(window).scroll(function () {
                    if (_scroll) {
                        _floatbox.animate({"top": "30px"}, {duration: 300});
                        _scroll = false;
                    }
                    if (_timer !== false) {
                        clearTimeout(_timer);
                    }
                    _timer = setTimeout(function () {
                        _scroll = true;
                        _floatbox.animate({"top": "10px"}, {easing: "linear"}, {duration: 500});
                    }, 400);
                });

            });



        </script>

    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="60">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="topLevelMenu container-fluid ">
                <div class="contact">
                    <p><b>Contact Us : +91-98285 12821&nbsp; |&nbsp; sunrise.school33@gmail.com</b></p>        
                </div>
                <div class="social">
                    <ul class="list-inline">
					 <li><a href="#">Administrator</a></li>
                        <li> | </li>
                        <li><a href="#footer">Quick Links</a></li>
                        <li> | </li>
                        <li><a href="career.php">Career</a></li>
                        <li> | </li>
                        <li><a href="https://www.google.com/maps/place/Sunrise+International+Public+School/@27.624006,74.756454,15z/data=!4m5!3m4!1s0x0:0x6ccf70cd70a06601!8m2!3d27.6221585!4d74.756454?hl=en-US" target="blank">Location</i></a></li>
                        <li><a href="https://www.facebook.com/sunrisenechhwa/" target="_blank"><i class="fa fa-lg fa-facebook "></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-linkedin"></i></a></li>
                    </ul>
                </div>   
            </div>  
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <div class="logoDiv">
                    <a href="#"><span><img src="images/sips_logo_edited_2.png" class="img-responsive" title="Sunrise International Public School" id="logo" width="370px;"/></span></a>					
                </div>
            </div>
            <div class="collapse navbar-collapse main" id="myNavbar">
                <ul class="nav navbar-nav navbar-right" style="padding-top : 25px;">
                    <li class="active"><a href="home.php"><span>Home</span></a></li>
                    <li> <a href="#about"><span>About Us</span></a>

                    </li>
                    <li class="dropdown"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Admission Information<b class="caret"></span></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="admission"><span>Admission Cell</span></a></li>
                            <li><a href="onlineform"><span>Online Registration</span></a></li>
                            <li><a href="admissionprocess"><span>Admission Process</span></a></li>
                            <li><a href="guidelines"><span>Criteria/Guidelines</span></a></li>
                            <li><a href="admissionprocess"><span>Admission Form pdf</span></a></li>
                            <li><a href="reqdocuments"><span>Documents Required </span></a></li>
                            <li><a href="feestructure"><span>Fee Structure</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Info Corner<b class="caret"></span></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="infocorner"><span>Guidelines For Parents</span></a></li>
                            <li><a href="schoolrules"><span>School Rules</span></a></li>
                            <li><a href="schooltimming"><span>School Timming</span></a></li>		  
                            <li class="dropdown-submenu"><a href="#"  class="dropdown-toggle" data-toggle="dropdown"><span>School Houses<b class="caret"></span></b></a>
                                <ul class="dropdown-menu" style="top:100px; left:130px; width:200px;">
                                    <li><a href="#">APJ Abdul Kalam House</a></li>
                                    <li><a href="#">Sunita Williams House</a></li>
                                    <li><a href="#">C. V. Raman House</a></li>
                                    <li><a href="#">Kalpana Chawla House</a></li>                                
                                </ul>	
                            </li>
                            <li><a href="http://epathshala.nic.in/e-pathshala-4/flipbook/" target="_blank"><span>E-Books</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Activities<b class="caret"></span></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="sports.php"><span>Sports</span></a></li>
                            <li><a href="gallery.php"><span>Gallery</span></a></li>
                            <li><a href="educationaltour.php"><span>Educational Tours</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Communities<b class="caret"></span></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="feedbackform.php"><span>Feedback Form</span></a></li>
                            <li><a href="alumini.php"><span>Alumini</span></a></li>

                        </ul>
                    </li>		   
                    <li> <a href="career.php"><span>Career</span></a></li>
                    <li><a href="contactus.php"><span>Contact Us</span></a></li>		  
                </ul>
            </div>
        </nav>
      
 <div id="about">    
        <h3 class="section-title">Welcome !</h3>
        <div class="section-title-divider"></div>
        <br>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
			<div class="container-fluid text-center">
                <h3>Please Login To Continue</h3>
				<form class="adminForm" method = "post">
				  <div class="form-group">
					<input type="text" class="form-control" id="userid" name="username" placeholder="Username" style="height:50px;">
				  </div>
				  <div class="form-group">
					<input type="password" class="form-control" id="pwd" name="password" placeholder="Password" style="height:50px;">
				  </div>
				  <button type="submit" class="btn btn-success" style="height:50px; width:100%;">Submit</button>
				</form>
			</div>
            </div>
        </div>
    </div>	  
	
	
    <br><br>
    <!--footer -->

    <div class="footer" id="footer">
        <div class="row" style="background-color:#2C3E50;">
            <div class="col-sm-5">			
                <div id="map" style="width:100%;height:300px;"></div>
            </div>
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-7">
                        <h3 class="section-title" style="padding-top:15px; color:#FFFFFF; font-size:20px;">Quick Links</h3>
                        <div class="section-title-divider" style="width: 200px;"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul style="list-style: none;">
                                    <li><a href="aboutus.php"><span>About School</span></a></li>
                                    <li><a href="admission.php"><span>Sunrise Admission Cell</span></a></li>
                                    <li><a href="onlineform.php"><span>Online Registration</span></a></li>
									<li><a href="sports.php"><span>Sports</span></a></li>
                                                                  										
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul style="list-style: none;">                                 
                                    <li><a href="gallery.php"><span>Gallery</span></a></li>
                                    <li><a href="feedbackform.php"><span>Parent's Feedback</span></a></li>
                                    <li><a href="careerOpportunities.php"><span>Career Oppurtunities</span></a></li>
                                    <li><a href="alumini.php"><span>Alumni</span></a></li>										
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center">
                        <h3 class="section-title" style="padding-top:15px; color:#FFFFFF; font-size:20px;">Contact Us</h3>
                        <div class="section-title-divider" style="width: 200px;"></div>						
                        <a href="https://www.google.com/maps/place/Sunrise+International+Public+School/@27.624006,74.756454,15z/data=!4m5!3m4!1s0x0:0x6ccf70cd70a06601!8m2!3d27.6221585!4d74.756454?hl=en-US" target="blank"><p><span class="glyphicon glyphicon-map-marker"></span>&nbsp;Salasar Main Rd, Nechhwa, <br>Sikar, Rajasthan - 332026, India</p></a>					
                        <p style="color:#FFFFFF;"> <span class="glyphicon glyphicon-phone-alt"></span>&nbsp;+91-98285 12821</p>
                        <p style="color:#FFFFFF;"> <span class="glyphicon glyphicon-envelope"></span>
                            &nbsp;sunrise.school33@gmail.com</p>	

                        <ul class="list-inline">					 
                            <li><a href="https://www.facebook.com/sunrisenechhwa/" target="blank"><i class="fa fa-facebook "></i></a></li>                    
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>	
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="background-color:#17202A;">
            <div class="container-fluid text-center" style="padding-top:5px; color:#FFFFFF; font-size:15px;">
                Copyright&nbsp;&copy;&nbsp;2017&nbsp;Sunrise International Public School. &nbsp;Created by <a href="http://www.koof.in" target="blank">koof</a>
            </div>
        </div>
    </div>
	 <!-- contact form Starts -->
     <form class="form-inline" action="email/enquirymail.php" method="POST">`
    <div class="floating-form" id="contact_form">
        <div class="contact-opener"><img src="images/contact.png" alt="Smiley face" height="150" width="42"></div>
        <div class="floating-form-heading" style="color:black;"><b>Feel free to contact Us</b></div>
        <br>
        <div id="contact_results"></div>
        <div id="contact_body">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label class="control-label" for="name" style="color:black;">Name:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="contactUsName"  placeholder="Enter name" name="contactUsName" style="border-color:black;" required="true">
                    </div>
                </div>
				<br>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label class="control-label" for="email" style="color:black;">Email:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="contactUsGmail" placeholder="Enter email" name="contactUsGmail" style="border-color:black;" required="true">
                    </div>
                </div>
				<br>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label class="control-label" for="mobile" style="color:black;">Mobile:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="contactUsMobile" placeholder="Enter mobile" name="contactUsMobile" style="border-color:black;" required="true">
                    </div>
					
                </div>
				<br>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label class="control-label" for="name" style="color:black;">Enquiry:</label>
                    </div>
                    <div class="col-sm-9">
                        <textarea name="contactUsMessage" class="form-control" id="contactUsMessage"  class="textarea-field" required="true" style="border-color:black;"></textarea>
                    </div>
                </div>
				<br>
            </div>
            <div class="form-group" style="text-align:center;">
                <label>

                    <span>&nbsp;</span><input type="submit" class="form-control btn btn-primary center-block" id="contactUsEmail" name="contactUsEmail" value="Submit" style="">
                </label>
            </div>
        </div>
    </div>
    </form>
    <!-- contact form end -->
	
    <script>
        function initMap() {
            var latLong = {lat: 27.622159, lng: 74.756454};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: latLong,
                mapTypeId: 'roadmap'
            });
            var marker = new google.maps.Marker({
                position: latLong,
                map: map
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSEA1XPr2UHOIqK0sgQgUvNF9DvMuiDUg&callback=initMap"></script>
    <script>
        $(document).ready(function () {
            // Add smooth scrolling to all links in navbar + footer link
            $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function () {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });

        })
    </script>
</body>
</html>

