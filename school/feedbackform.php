<?php
include("navigation.php");
?>

<body>
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Feedback Form</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">

       <form action="email/feedbackmail.php" method="POST">`
            <div class="row">
                <div class="col-sm-6">			
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="FeedbackName">Name</label>
                            </div><div class="col-md-10">
                                <input type="text" class="form-control" id="FeedbackName" name="FeedbackName" placeholder=" Enter Name">
                            </div></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="FeedbackEmail">Email</label>
                            </div><div class="col-md-10">
                                <input type="email" class="form-control" id="FeedbackEmail" name="FeedbackEmail" placeholder=" Enter Email id">
                            </div>	</div>	</div>	
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="telephone">Mobile</label>
                            </div><div class="col-md-10">
                                <input type="tel" class="form-control" id="FeedbackMobile" name="FeedbackMobile" placeholder=" Enter 10-digit mobile no.">
                            </div></div></div>	
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="subject">Subject</label>
                            </div><div class="col-md-10">
                                <select id="subject" name="subject" class="form-control" required="required">
                                    <option value="" selected="">Choose One:</option>
                                    <option value="feedback">General Feedback</option>
                                    <option value="complaint">Complaint</option>
                                    <option value="gratitude">Gratitude</option>
                                    <option value="admission">Admission</option>
                                </select>
                            </div>  </div>


                    </div>
					</div>
                <div class="col-sm-6">
                    <div class="form-group">

                        <label for ="description"> Message</label>
                        <textarea rows="7" cols="4" class="form-control" id="FeedbackMessage" name="FeedbackMessage" placeholder="Enter Your Message"></textarea>
                    </div>
                    <div class="pull-right">
                        <br>
                        <button type="submit" class="btn btn-primary submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
                    </div>


                </div>
		</div>
        </form>
        <br><br>		
    </div>

    <?php
    include("footer.html");
    ?>
