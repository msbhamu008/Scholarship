<?php
include("admin/Connection.php");
$user = new Connection();
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
	<style type="text/css">
		.notificationArea {  
			height:400px;
		 }
		.liclass { margin:0 auto; border-bottom:1px #808080 dashed; font-size:20px; font-family:Tahoma, Geneva, sans-serif; padding:15px;}
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script><script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

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
					    <li><a href="adminLogin">Administrator</a></li>
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
                    <li class="active"><a href="#main"><span>Home</span></a></li>
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
      <div class="jumbotron" id="main" style="background-color:white;">
		<div class="row" style="background-color:#ABEBC6;">
			<div class="col-sm-9">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="images/img17.jpg" alt="Los Angeles" style="width:100%; height:568px;">
                        <div class="carousel-caption">
                            <h3>A Building with four walls And Tomorrow inside</h3>
                        </div>
                    </div>

                    <div class="item">
                        <img src="images/img18.jpg" alt="Chicago" style="width:100%; height:568px;">
                        <div class="carousel-caption">
                            <h3>A world of learners with children gain passport to the word</h3>
                        </div>
                    </div>

                    <div class="item">
                        <img src="images/img20.jpg" alt="New York" style="width:100%; height:568px;">
                        <div class="carousel-caption">
                            <h3>Teaching turning todays learners into tommorows leaders</h3>
                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
			<div class="col-sm-3">
			<div class="container-fluid text-center">
			<div class="notificationArea">
				<div class="notify">
					<h3 class="section-title">Notifications</h3>
				</div>
				<div class="section-title-divider"></div>
				<br>
					<?php
					  $conec = new Connection();
									$con = $conec->Open();
									if ($con) {
						$selectQuery= "select * from newupdate where end_date > CURDATE() order by id DESC limit 10";
						$stmt = $con->prepare($selectQuery);
						$stmt->execute();
					  }
						
					?>
					<marquee behavior="scroll" scrollamount="2" direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=250>
					   <ul class="ulclass" style="color:#2874A6;">
							 <?php 
							   for ($i = 0; $row = $stmt->fetch(); $i++) {
								 $id=$row['id'];
								 $feed=$row['title'];
								 $startDate=$row['start_date'];
							   ?>
						   <li class="liclass" style="color:#2874A6;">
								 <?php echo '<a href="notificationDescription.php?id='.$row['id'].'" style="color:#2874A6;">'.$feed.'</a>';  
								  if(!($startDate < date('Y-m-d'))){

								 ?>
									<sup style="color:red;" id="newSup" class="newSup">new</sup>				 
								 <?php }  } ?>
							</li>
							
					  </ul>
							   
			  </marquee>
			  </div>
			</div>
			</div>
		</div>	
	</div>  
    <div id="about">    
        <h3 class="section-title" >About SIPS</h3>
        <div class="section-title-divider"></div>
        <br>
        <div class="row" style="background-color : #2874A6;">
            <div class="col-sm-6">
                <img src="images/img19.jpg" alt="Chicago" style="width:100%; height:400px;">
            </div>
            <div class="col-sm-6">
                <h3 class="section-title" style="padding-top:30px; color:#FFFFFF;">SIPS</h3>
                <br>
                <p style="font-size: 16px; color:#FFFFFF;">
                    The Sunrise International Public School, Nechhwa, an English medium Co-educational School, came into existence in 2009 with a noble objective of transforming the rural societies by imparting <b>Value added Education</b> to grown up children of the region and further opening its doors for other educationally neglected areas. The school creates a climate conductive to learning, wherein both teachers and students look forward to getting back to the school after their holidays.
                </p>
                <br>
                <a href="aboutus.php"><button class="readMore btn btn-warning">Read more</button></a>
            </div>
        </div>
    </div>
   
    <div id="facilities">
        <h3 class="section-title" style="padding-top:35px;">Facilities</h3>
        <div class="section-title-divider"></div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <img src="images/facility1.jpg" alt="Labs" class="img-circle" style="width:180px; height:150px;">
                    <h3 style="color : #2874A6;">Labs</h3>
                    <p style="font-size: 13px; color:#000000;">
                        The new-age kids are highly imaginative, analytical, creative and practical by nature. <b>SIPS</b> is commited to impart education by practical means which enables the students to gain more and more knowledge with hands-on experience, model making, robotics, and practical-based learning activities in fully equipped laborartories designed for the purposes.
                    </p>
                </div>
                <div class="col-sm-4 text-center">
                    <img src="images/facility2.jpg" alt="Smart Class Room" class="img-circle" style="width:180px; height:150px;">
                    <h3 style="color : #2874A6;">Smart Class Room</h3>
                    <p style="font-size: 13px; color:#000000;">
                        Technology is a blessing. For children it can mean an enriching avenues for education as well as better entertainment. Therefore, to be an active part of the new generation it is important for the kids to develop the awareness for new and upcoming technologies. <b>SIPS</b> introduces kids to the mordern technologies through Smart and Digital classrooms.

                    </p>
                </div>
                <div class="col-sm-4 text-center">
                    <img src="images/facility3.jpg" alt="Library" class="img-circle" style="width:180px; height:150px;">
                    <h3 style="color : #2874A6;">Library</h3>
                    <p style="font-size: 13px; color:#000000;">
                        They say every word we read is a source of knowledge. Books are the best friends we always need. Kids exposed to great books turn into a great soul. <b>SIPS</b> provides an organized collection of study, teaching and learning material aimed at students and teachers in library where the kids as well as teachers will get the opportunity to read the most interesting, important and helpful books. 
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-center">
                    <img src="images/facility4.jpg" alt="Labs" class="img-circle" style="width:180px; height:150px;">
                    <h3 style="color : #2874A6;">Transport</h3>
                    <p style="font-size: 13px; color:#000000;">
                        <b>SIPS</b> provides students with transportation facility on nominal charges. All school buses meet all the gudelines and specifications. The buses are properly maintained to ensure comfort and safety of students.
                    </p>
                </div>
                <div class="col-sm-4 text-center">
                    <img src="images/facility5.png" alt="Smart Class Room" class="img-circle" style="width:180px; height:150px;">
                    <h3 style="color : #2874A6;">Sports</h3>
                    <p style="font-size: 13px; color:#000000;">
                        <b>SIPS</b> firmly believes in the famous phrase "<strong>A sound mind resides in a sound body</strong>" and therefore, is committed to make sports and games integral part of curriculum. <b>SIPS</b> provides a perfect platform for various kind of sports whether it is indoor or outdoor sports.	
                        <!--Sports teache valuable lessons like team spirit, resourcefulness and also enculcate determination and courage and enhances the capacity to withstand protracted physical and mental strain. Exposure to sport allows a powerful growth of mind and body -->
                    </p>
                </div>
                <div class="col-sm-4 text-center">
                    <img src="images/facility6.jpg" alt="Library" class="img-circle" style="width:180px; height:150px;">
                    <h3 style="color : #2874A6;">Hostel</h3>
                    <p style="font-size: 13px; color:#000000;">
                        <b>SIPS</b> provides students with a clean, safe and well structured hostel. The rooms are properly maintained so that no student should face any problem. The hostel is under the supervision of experienced wardens to help students and maintain discipline. 
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="gallery">
        <h3 class="section-title" style="padding-top:35px;">Gallery</h3>
        <div class="section-title-divider"></div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <marquee behavior="slide" scrollamount="35">
                    <div class="col-sm-3 text-center">
                        <img src="images/img17.jpg" alt="Labs" style="width:300px; height:200px;">
                    </div>
                    <div class="col-sm-3 text-center">
                        <img src="images/img3.jpg" alt="Smart Class Room" style="width:300px; height:200px;">
                    </div>
                    <div class="col-sm-3 text-center">
                        <img src="images/img12.jpg" alt="Smart Class Room" style="width:300px; height:200px;">
                    </div>
                    <div class="col-sm-3 text-center">

                        <a href="gallery.php" style="width:300px; height:200px; color:#2874A6;"> 

                            <img src="images/img3.jpg" alt="Smart Class Room" style="width:300px; height:200px; opacity:0.2;"/>		
                            <div class="caption">
                                <p><span class="glyphicon glyphicon-plus" style=" font-size:50px;"></span><br>
                                    <b>To View More<br>
                                        Go to Gallery</b></p>
                            </div>
                        </a>

                    </div>
                </marquee>
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

