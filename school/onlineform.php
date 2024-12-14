<?php
include("navigation.php");
?>
<style>
    label{
        font-size:12px;
        color:black;
    }

    .noprofile { 
        position: relative; 
        width: 100%; /* for IE 6 */
    }

    .noprofile p { 
        position: absolute; 
        top: 100px; 
        left: 0; 
        width: 100%; 
        color:#2874A6;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('#busfacility').on('change', function () {
            var selectValue = $(this).val();


            if (selectValue == "byes") {
                $('#buswhere').removeAttr('disabled');
            } else {
                $('#buswhere').attr('disabled', 'disabled');
            }

        });

        $('#phydis').on('change', function () {
            var selectValue = $(this).val();


            if (selectValue == "phyyes") {
                $('#physpecify').removeAttr('disabled');
            } else {
                $('#physpecify').attr('disabled', 'disabled');
            }

        });
    });

</script>
<div class="container wow fadeInUp">
    <div class="row">
        <div class="col-md-12">
            <h3 class="section-title">Online Form</h3>
            <div class="section-title-divider"></div>
        </div>
    </div>
</div>


<div class="container-fluid  text-center">
    <center>
        <div class="panel panel-primary" style="width:70%;">
            <div class="panel-heading">
                <h4>Student Addmission form</h4>
            </div>
            <div class="panel-body">
                <form method="POST" action="actionPdf.php">
                    <div class="row">
                        <div class="col-sm-4" >
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="scholar">Scholar No.:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="scholar">
                                        <small><strong style="color:red;">For Official use only *</strong></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="class">Class:</label>
                                    </div>
                                    <div class="col-sm-8">

                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">------select-------</option>
                                            <option value="1">1st</option>
                                            <option value="2">2nd</option>	
                                            <option value="3">3rd</option>	
                                            <option value="4">4th</option>	
                                            <option value="5">5th</option>	
                                            <option value="6">6th</option>	
                                            <option value="7">7th</option>	
                                            <option value="8">8th</option>	
                                            <option value="9">9th</option>	
                                            <option value="10">10th</option>	
                                            <option value="11">11th</option>	
                                            <option value="12">12th</option>											
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="date">Date:</label>
                                    </div>
                                    <div class="col-sm-8">

                                        <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>">				
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-width: 2px; border-color: #2874A6;">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="scholar">Student's Name:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="scholar" name="scholar">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="scholar">Mother's Name:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="scholar" name="scholar">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="scholar">Father's Name:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="scholar" name="scholar">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="dob">Date of Birth:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" id="dob" name="dob">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="gender">Gender:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">------select-------</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>									
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="scholar">Category:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">------select-------</option>
                                            <option value="general">General</option>
                                            <option value="obc">OBC</option>	
                                            <option value="sc">SC</option>
                                            <option value="st">ST</option>	
                                            <option value="bpl">BPL</option>
                                            <option value="other">OTHER</option>											
                                        </select>					
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="caste">Caste:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="caste" name="caste">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="religion">Religion:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="religion" name="religion">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="adhaar">Adhaar Card No.:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="adhaar" name="adhaar">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-width: 2px; border-color: #2874A6;">
                    <h3 style="color:#2874A6; padding-left:-200px;">Address</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <label style="color:#2874A6; font-size:20px;">Permanent Address</label>
                        </div>
                        <div class="col-sm-6">

                        </div>		
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="caste">Address:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="caste" name="caste">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="religion">State:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="religion" name="religion">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="adhaar">Pin Code:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="adhaar" name="adhaar">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="tempAdd">
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color:#2874A6; font-size:20px;">Temporary Address</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" style="color:black;">
                                    <input type="checkbox" id="sapa">Same as Permanent Address</input>
                                </div>
                            </div>			
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">				  
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for="caste">Address:</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="caste" name="caste">							
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for="religion">State:</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="religion" name="religion">							
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for="pin">Pin Code:</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="pin" name="pin">							
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-width: 2px; border-color: #2874A6;">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="mobile">Mobile:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="mobile" name="mobile">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="tel">Tel. No.:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="tel" name="tel">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="email">Email:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" id="email" name="email">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="foccuppation">Father's Occupation:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="foccuppation" name="foccuppation">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="fedu">Education:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="fedu" name="fedu">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="fincome">Income:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="fincome" name="fincome">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="moccuppation">Mother's Occupation:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="moccuppation" name="moccuppation">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="medu">Education:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="medu" name="medu">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="fincome">Income:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="fincome" name="fincome">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="school">Last School Name:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="school" name="school">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="saddress">Address:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="saddress" name="saddress">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="passingyear">Passing Year:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" id="passingyear" name="passingyear" value="<?php echo date("Y"); ?>">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="passedclass">Passed class:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="passedclass" name="passedclass">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="markdobt">Markes Obtained:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="markdobt" name="markdobt">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="percentage">Percentage(%):</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="percentage" name="percentage">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="scholar">Stay:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">------select-------</option>
                                            <option value="hostle">Hostelite</option>
                                            <option value="daysch">Day Scholar</option>	

                                        </select>					
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="scholar">Bus Facility:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="busfacility" name="busfacility">
                                            <option value="">------select-------</option>
                                            <option value="byes">Yes</option>
                                            <option value="bno">No</option>	

                                        </select>					
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="buswhere">From Where(if Yes):</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="buswhere" name="buswhere">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="scholar">Physical Disability:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="phydis" name="phydis">
                                            <option value="">------select-------</option>
                                            <option value="phyyes">Yes</option>
                                            <option value="phyno">No</option>		

                                        </select>					
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="physpecify">Specify(if Yes):</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="physpecify" name="physpecify">							
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="allergy">Allergy/Infection:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="allergy" name="allergy">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-width: 2px; border-color: #2874A6;">
                    <!--<div class="row">
                    <div class="col-sm-6 noprofile">
                            <img src="images/noprofile.png" alt="Smiley face" hspace="30">
                            <p>please <br>affix Child's <br>photograph<br> here</p>
                            </div>
                            <div class="col-sm-6 noprofile">
                            <img src="images/noprofile.png" alt="Smiley face" hspace="30">
                            <p>please <br>affix Father's <br>photograph<br> here</p></div>
                            </div>

                    <div class="row" style="padding-left:10px; float:left;">
                        <text style="color:red;">Note:</text>
                        <text style="color:black;">After the deposition,fee will be nonrefundable.Under certain circumstances only 25% amount of deposited fee will be Refunded</text>
                    </div><br>
                    <hr style="border-width: 2px; border-color: #2874A6;">
                    <div class="row">
                        <h3 style="color:black;">Declaration by Parents</h3>
                        <text style="color:black; font-size:13px;">I......................................guardian of student........................................solemnly
                        declare that I have carefull yread all the rules and sub-rules of the school and I am totally agree with it.</text>

                    </div>-->
                    <div class="row">
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br>
    </center>
</div>

<?php
include("footer.html");
?>
