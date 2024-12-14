<?php
include("navigation.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
<body>

    <div class="container gallery-container">

        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Gallery</h3>
                    <div class="section-title-divider"></div>
                </div>
            </div>
        </div>

        <p class="page-description text-center" style="color:#2874A6;"><b>Moments that describes Us</b></p>

        <div class="tz-gallery">

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img1.jpg">
                        <img src="images/img1.jpg" alt="Park">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img3.jpg">
                        <img src="images/img3.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-12 col-md-4">
                    <a class="lightbox" href="images/img2.jpg">
                        <img src="images/img2.jpg" alt="Tunnel">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img5.jpg">
                        <img src="images/img5.jpg" alt="Coast">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img6.jpg">
                        <img src="images/img6.jpg" alt="Rails">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img7.jpg">
                        <img src="images/img7.jpg" alt="Traffic">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img8.jpg">
                        <img src="images/img8.jpg" alt="Rocks">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img9.jpg">
                        <img src="images/img9.jpg" alt="Benches">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img10.jpg">
                        <img src="images/img10.jpg" alt="Sky">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img11.jpg">
                        <img src="images/img11.jpg" alt="Sky">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img12.jpg">
                        <img src="images/img12.jpg" alt="Sky">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="images/img13.jpg">
                        <img src="images/img13.jpg" alt="Sky">
                    </a>
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
    <?php
    include("footer.html");
    ?>
