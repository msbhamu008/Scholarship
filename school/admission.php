<?php

include("navigation.php");
?>
<style>

    .admission .btn-circle-lg {
        width: 120px;
        height: 120px;
        text-align: center;
        padding: 30px 0;
        font-size: 13px;
        font-weight: bold;
        line-height: 2.00;
        border-radius: 70px;
        color: white;
        border:1px solid black;
    }

    .admission .btn-circle-lg:hover {
        background-color: #FF5733;
        color: white;
    }
</style>
<body>


    <!-- 
About School
-------------------------------- -->

    <section id="about">

        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Admission Cell</h3>


                    <div class="section-title-divider"></div>
                    <p class="section-description"></p>
                </div>
            </div>
        </div>
        <div class="container about-container wow fadeInUp">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/admission.png" alt="Smiley face" width="450" height="380">
                </div>
                <div class="col-md-6 about-content" style="color:black;">
                    <h2 class="about-title" style="color:#2874A6;">Every student matters, every moment counts</h2>
                    <p class="about-text">
                        Admissions are open for all the students who have strong desire to learn and comprehend form the school environment. Admissions starts form 1 April for every academic session. The school announces the number of seats in every class at starting of every section and follows the admission policy which is based on first come first served. 25% seats are reserved under RTE &#8208; 2009. 

                    </p>
                    <p class="about-text">
                        The school follows a strict policy for admissions. However, in cases of transfer, chance vacancies may occur spontaneously. Parents are need to enquire at the reception where up to date information on vacancies, if any, would be available. The school is up to Grade XII.

                    </p>
                    <p class="about-text">
                        <strong>For admission related information the school may be contacted through email and telephone.</strong>
                    </p>
                    <p class="about-text">
                        <strong>The school has an admission committee to guide and facilitate admission.</strong>
                    </p>
                    <!--  <ol type="A" style="color:#111;" >
                      <li>Principal</li>
                      <li>Vice &#8208; Principal</li>
                      <li>Academic co-ordinator of respective section</li>
                      </ol> -->
                </div>
            </div>

        </div>
        <br>

        <div class="row admission">
            <center>
                <div class="col-md-4">
                    <a href="onlineform.php" class="btn btn-circle-lg btn-primary"><center>Online<br> Registration</center> </a>
                </div>
                <div class="col-md-4">
                    <a href="admissionprocess.php" class="btn btn-circle-lg btn-primary">Admission <br>Process </a>
                </div>
                <div class="col-md-4">
                    <a href="guidelines.php" class="btn btn-circle-lg btn-primary">Criteria/<br>Guidelines </a>

                </div>
            </center>
        </div>
        <br><br>
    </section>    
    <?php

    include("footer.html");
    ?>
