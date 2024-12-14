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
    <div class="container wow fadeInUp">
        <br>
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Admission Information</h3>	
                <div class="section-title-divider"></div>
                <p class="section-description"></p>
            </div>
        </div>
    </div>
    <div id="container">


        <section id="content" class="two-column with-right-sidebar">

            <article>


                <h2 style="color:#2874A6; padding-left:30px;">Admission Process</h2>
                <div style="color:black; padding-left:30px;">
                    <p>The school announces admissions in the month of April. The number of vacant seats in every class are advertised by posters/pamphlet and local news papers. The desiring/willing parents can contact in the office during the school hours with required documents.</p>
                    <br>
                    <div class="row admission">
                        <center>
                            <div class="col-md-4">
                                <a href="download.php?file=files/admissionForm.pdf" target="_blank" class="btn btn-circle-lg btn-primary"><center>Admission<br> Form Pdf</center> </a>
                            </div>
                            <div class="col-md-4">
                                <a href="reqdocuments.php" class="btn btn-circle-lg btn-primary">Documents <br>Required </a>
                            </div>
                            <div class="col-md-4">
                                <a href="feestructure.php" class="btn btn-circle-lg btn-primary">Fee<br> Structure </a>

                            </div>
                        </center>
                    </div>
                </div>

        </section>

        <aside class="sidebar big-sidebar right-sidebar">


            <ul>	
                <li class="color-bg">
                    <h4 style="font-size:25px;">Admission Information</h4>
                    <ul class="blocklist" style="font-size:15px;">
                        <li><a class="" href="admission.php">Amission Cell</a></li>
                        <li><a class="" href="onlineform.php">Online registration</a></li>
                        <li><a class="selected" href="admissionprocess.php">Admission Process</a></li>
                        <li><a class="" href="guidelines.php">Criteria/Guidelines</a></li>
                        <li><a class="" href="download.php?file=files/admissionForm.pdf" target="_blank">Admission Form pdf</a></li>	
                        <li><a class="" href="reqdocuments.php">Documents Required </a></li>
                        <li><a class="" href="index.html">Fee Structure</a></li>	
                        </aside>
                        <div class="clear"></div>
                        <br><br>




                        </div>
                        <?php

                        include("footer.html");
                        ?>
