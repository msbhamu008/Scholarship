<?php
include("navigation.php");
?>
<div class="container-fluid">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Contact Us</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <div class="item active">
        <img src="images/contactus.jpg" alt="Los Angeles" style="width:100%; height:400px;">
        <br><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <p><strong><span style="font-size:16px; color:black;">We are only a call away!</span></strong></p>
                <p><strong><span style="font-size:16px; color:black;">We would love to hear from you. Do not hesitate to fill the form or call us. We promise to get back to you as soon as possible.</span></strong></p>
                <br><br>
                <address><span style="font-size:20px; color:black;"><strong>Sunrise International Public School</strong></span></address>
                <address><span style="font-size:18px; color:black;">Salasar Main Rd, <br>
                        Nechhwa, - 332026, (Raj.) India.&nbsp;<br>
                        Tel.:+91- 98285 12821<br>
                        Email:&nbsp;<a href="mailto:sunrise.school33@gmail.com" style="color:blue;">sunrise.school33@gmail.com</a></span></address>
            </div>

            <div class="col-sm-6">		
            
               <form class="form-horizontal" action="email/enquirymail.php" method="POST">`
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name" style="color:black;">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contactUsName" placeholder="Enter name" name="contactUsName" style="border-color:black;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email" style="color:black;">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="contactUsGmail" placeholder="Enter email" name="contactUsGmail" style="border-color:black;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd" style="color:black;">Mobile:</label>
                        <div class="col-sm-8">          
                            <input type="mobile" class="form-control" id="contactUsMobile" placeholder="Enter mobile number" name="contactUsMobile" style="border-color:black;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd" style="color:black;">Enquiry:</label>
                        <div class="col-sm-8">          
                            <textarea rows="3" cols="42" class="form-control" placeholder="your message" style="border-color:black;"id="contactUsMessage" name="contactUsMessage"></textarea>
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div></div>
<?php
include("footer.html");
?>
