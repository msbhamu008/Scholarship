<?php
if(!file_exists("navigation.php")) {
  header("Location:error.html");
} else {
  include("navigation.php");
}

?>


<body>
    <div class="container wow fadeInUp">
        <br>
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Info Corner</h3>	
                <div class="section-title-divider"></div>
                <p class="section-description"></p>
            </div>
        </div>
    </div>
    <div id="container">


        <section id="content" class="two-column with-right-sidebar">
            <h2 style="color:#2874A6; padding-left:30px;">Rules and regulations</h2>
            <div style="color:black; padding-left:30px;">
                <ol type="A">
                    <li><h4>Discipline &#45; Rules</h4></li>
                    <ol type="1"><li>The school reserves the right to take strict disciplinary action against a student if he/she</li>
                        <ol type="a">

                            <li>Violets the school rules.</li>
                            <li>Often arrives late to school.</li>
                            <li>Misbehaves with teachers or students.</li>
                            <li>Does no come in the prescribed uniform.</li>
                            <li>Mishandles, disfigures or damages any school property.</li>
                            <li>Fails to appear in any assessment without any valid reason and permission.</li>
                            <li> Acts/works in manner that is likely to lower the image of the school.</li>
                            <li>Brings undesirable material or any sharp instrument or weapon to school.</li>
                            <li>Indulges in any form of indiscipline or anti-social activity in and outside the school.</li>
                        </ol>
                        <li>The school is not responsible for any loos of articles by the student.</li>
                        <li> Habitual late comers will be dealt strictly. Incase of emergency, parents are expected to
                            escort the child to the school.</li>
                    </ol>
                    <li><h4>Library Rules</h4></li>
                    <ol type="a">
                        <li>All the library users must carry their card.</li>
                        <li>Students are not allowed to bring their personal books to library. However, one
                            diary or notebook to record article will be allowed.</li>
                        <li>They must maintain silence in the library.</li>
                        <li>Books issued should be returned to library in good condition.</li>
                        <li>Student can get the books issued on their own card only.</li>
                    </ol>
                    <li><h4>Rules regarding absence&#47;leave</h4></li>
                    <ol type="a">
                        <li>No leave of absence is granted except on prior written application form parents or guardian and even than for a plausible reason only.</li>
                        <li>Every absence (due to sickness or otherwise) must be entered briefly in non&#45; attendance leaves record pages at the end of this almanac and signed by parents.</li>
                        <li>A student returning o school after form an infectious or contagious disease should provide a Doctor&#39;s certificate permitting him to do so. Students suffering form the following diseases must observe the prescribed period of the quarantine before returning to school&#45;</li>
                        <ol type="i">
                            <li>Chicken Pox &#45; Till complete falling of scabs</li>
                            <li>Cholera &#45; Till the child is completely well</li>
                            <li>Measles &#45; Two weeks after the rash
                                disappears</li>
                            <li>Mumps &#45; Untill the swelling has gone.</li>
                            <li>Whooping Cough &#45; Six weeks</li>
                        </ol>
                        <li>Those who remain absent without sanctioned leave will be fined at the rate of Rs
                            10&#47;&#45; per day.</li>
                        <li> Absence for more than three days immediately after vacation renders the student
                            liable to have his/her name struck off the rolls, If prior permission has not been
                            availed. Leave application should always be addressed the Principal through Class
                            Teacher.</li>
                    </ol>
                </ol>         
            </div>
        </section>

        <aside class="sidebar big-sidebar right-sidebar">
            <ul>	
                <li class="color-bg">
                    <h4 style="font-size:25px;">Info Corner</h4>
                    <ul class="blocklist" style="font-size:15px;">
                        <li><a class="" href="infocorner.php">Guidelines For Parents</a></li>
                        <li><a class="" href="#">Development Programs</a></li>
                        <li><a class="selected" href="schoolrules.php">School Rules</a></li>
                        <li><a class="" href="schooltimming.php">School Timming</a></li>
                        <li><a class="" href="#">School Calender</a></li>
                        <li><a class="" href="http://epathshala.nic.in/e-pathshala-4/flipbook/">E-Books</a></li></ul>	
                </li>
            </ul>						
        </aside>
        <div class="clear"></div>
        <br><br>
    </div>
    <?php
    include("footer.html");
    ?>
