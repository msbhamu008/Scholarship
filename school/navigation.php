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
        <!-- date picker-->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>


        <link rel="shortcut icon" href="images/Logo_SIPS.ico" />
        <meta name="theme-color" content="#2874A6">
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
        <style>

        </style>

    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="60">	
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="topLevelMenu container-fluid ">
                <div class="contact">
                    <p><b>Contact Us : +91-98285 12821&nbsp; |&nbsp; sunrise.school33@gmail.com</b></p>        
                </div>
                <div class="social">
                    <ul class="list-inline">
					 <li><a href="https://sunriseeduhub.com/site/userlogin">Student Login</a></li>
                        <li> | </li>
                        <li><a href="https://sunriseeduhub.com/web/transfercertificate">Transfer Certificate</a></li>
                        <li> | </li>
                        <li><a href="#">Career</a></li>
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
                    <a href="home"><span><img src="images/sips_logo_edited_2.png" class="img-responsive" title="Sunrise International Public School" id="logo" width="370px;"/></span></a>
                </div>
            </div>
            <div class="collapse navbar-collapse main" id="myNavbar">
                <ul class="nav navbar-nav navbar-right" style="padding-top : 25px;">
                    <li class="active"><a href="index.html"><span>Home</span></a></li>
                    <li> <a href="aboutus.php"><span>About Us</span></a>

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
                            <li><a href="sports"><span>Sports</span></a></li>
                            <li><a href="gallery"><span>Gallery</span></a></li>
                            <li><a href="educationaltour"><span>Educational Tours</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Communities<b class="caret"></span></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="feedbackform"><span>Feedback Form</span></a></li>
                            <li><a href="alumini"><span>Alumini</span></a></li>

                        </ul>
                    </li>		   
                    <li> <a href="career"><span>Career</span></a></li>
                    <li><a href="contactus"><span>Contact Us</span></a></li>		  
                </ul>
            </div>
        </nav>
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
