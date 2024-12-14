<?php
include("session.php");
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
        <link href="/sips/css/style.css" rel="stylesheet">
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
			.activeArea{
				height: 50px;
			}
			.activeArea h4{
				color:#2874A6;
			}
			.notificationDashboard{
				border:1px solid #2874A6;
				background-color:white;
				box-shadow:   3px 3px 5px 6px #ccc;
			}
			.notificationDashboard:hover{
				border:1px solid #2874A6;
				background-color:white;
				box-shadow:   3px 3px 5px 6px #ABB2B9;
			}
			.notificationBody{
				padding-top:130px;
			}
			.section-title {
				padding-top: 30px;
				font-size: 32px;
				color: #111;
				text-transform: uppercase;
				text-align: center;
				font-weight: 700;
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
    <body data-spy="scroll" data-target=".navbar" data-offset="60" style="background-color:#E5E7E9">

       <nav class="navbar navbar-default navbar-fixed-top" style="width:100%; margin-bottom:10px;">

			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
                <div class="logoDiv">
                    <a href="#"><span><img src="/sips/images/sips_logo_edited_2.png" class="img-responsive" title="Sunrise International Public School" id="logo" width="340px;"/></span></a>					
                </div>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar" style="margin-right:30px;">
			  <ul class="nav navbar-nav navbar-right" >
				<li><a href = "#" style="color:#2980B9; font-size:15px;"><span class="glyphicon glyphicon-user"></span>&nbsp;Hello Admin</a></li> 
				<li><a href = "/sips/adminLogout" style="color:#2980B9; font-size:15px;"><span class="glyphicon glyphicon-off"></span>&nbsp;Sign Out</a></li>
			  </ul>
			</div>
		</nav>
		<div class="notificationBody container-fluid text-center">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div id="notificationDashboard" class="notificationDashboard">   
							<h3 class="section-title" >Notification Dashboard</h3>
								<div class="section-title-divider"></div>
								<div class="container-fluid text-center">
									<div class="activeArea">	
										<div class="container-fluid text-left">
												<h4>Search Filters</h4>
										</div>
										<div class="row">
											<div class="col-sm-3">
												<label>Notification Title</label>
												<input class="form-control" id="myInput" type="text" placeholder="Enter The Notification Title" style="border:1px solid #2874A6;">
											</div>
											<div class="col-sm-3">
												<label>Start Date</label>
												<input class="form-control" id="myInput" type="date" placeholder="Start Date" style="border:1px solid #2874A6;">
											</div>
											<div class="col-sm-3">
												<label>End Date</label>
												<input class="form-control" id="myInput" type="date" placeholder="End Date" style="border:1px solid #2874A6;">
											</div>
											<div class="col-sm-3" >
												<button type="button" class="btn btn-success" onclick="showNotifications(this.value)">Search</button>
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNotification">Add New</button>
											</div>
										</div>
									</div>
									<hr>								
								</div>
								<div class="resultArea" id="resultArea">
										<div class="container-fluid text-left">
											<h3>Results</h3>
											<hr>
										</div>
									</div>
					<!-- Notification Modal -->
						  <div class="modal fade" id="addNotification" role="dialog" style="padding-top:170px; color:black;">
							<div class="modal-dialog">
							  <div class="modal-content">
							  <form action="updateInsert.php" method="POST">
								<div class="modal-header" style="background-color:#ABEBC6; color:black;">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">New Notification</h4>
								</div>
								<div class="modal-body">
									
									<div class="form-group">
									  <label for="title" style="float:left;">Title:</label>
									  <input type="text" class="form-control" id="title" placeholder="Enter Title For Notification" name="title" style="border:1px solid #2874A6;">
									</div>
									<div class="form-group">
									  <label for="desc" style="float:left;">Description:</label>
									  <textarea  class="form-control" id="desc" row="8" placeholder="Enter Description" name="desc" style="border:1px solid #2874A6;"></textarea>
									</div>
									
								</div>
								<div class="modal-footer">
								  <input type="submit" class="btn btn-success" value="Add" name="insert">
								  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
								</form>
							  </div>
							</div>
						  </div>

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
                    <div class="col-sm-5 col-sm-offset-5 text-center">
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
