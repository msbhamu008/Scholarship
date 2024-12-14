<?php

include("navigation.php");
?>

<style>
    .reqSpan{
        color: red;
    }


    input[type=text] {
        width: 100%;
        box-sizing: border-box;
        border: 2px solid #4897F1;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }

    input[type=text]:focus {
        border: 3px solid #555;
    }

</style>

<div class="container wow fadeInUp">
    <div class="row">
        <div class="col-md-12">
            <h3 class="section-title">Career Oppurtunities</h3>
            <div class="section-title-divider"></div>
        </div>
    </div>
</div>

<div class="container" style="background-color: #2874A6; border: 2px solid black; text-align: center">
    <p style="color: white; font-size: 18px;">Welcome to our job application form. If you want to apply to one of our jobs, please fill in the form below and we hopefully may welcome you soon as a new employee!</p>
</div>
<br><br>
<div class="container" style="color:black;">
    <form action=" " method="post" id="FormRegistration" name="FormRegistration" enctype="multipart/form-data">
        <div class="row pad-20">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Functional Area *</label>
                    <select name="farea" id="farea" class="required form-control" style="border:2px solid #4897F1; border-radius: 4px;">
                        <option value="">Select</option>
                        <option value="Academic">Academic</option>
                        <option value="Non Academic">Non-Academic</option>
                        <option value="Sports">Sports</option>
                        <option value="Skills Trainer">Skills Trainer</option>
                    </select>
                    <input type="hidden" name="Source" value="career form">
                </div>

            </div>	
            <div class="col-md-3">
                <div class="form-group">
                    <label>School Level *</label>
                    <select name="slevel" id="slevel" class="required form-control" style="border:2px solid #4897F1; border-radius: 4px;">
                        <option value="">Select</option>
                        <option value="Pre Primary">Pre Primary</option>
                        <option value="Primary">Primary</option>
                        <option value="Middle">Middle </option>
                        <option value="Secondary">Secondary</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

            </div>	
            <div class="col-md-3" id="postfor">
                <div class="form-group">
                    <label>Post Applied for *</label>
                    <select name="postapplid" id="postapplid" class="form-control" style="border:2px solid #4897F1; border-radius: 4px;"> 
                        <option value="">Select</option>
                        <option value="Pre Primary Teacher">Pre Primary Teacher</option>
                        <option value="Assistant Teacher">Assistant Teacher</option>
                    </select>
                </div>
            </div>
			 <div class="col-md-3" id="subspecial">
                    <div class="form-group">
                        <label>Subject Specialisation*</label>
                        <input type="text" name="subspecial" value="" class="form-control">
                    </div>
             </div>
        </div>
        <div class="row text-center">
            <h3 style="color:#f4511e;">Personal Details</h3>
        </div>
		<br>
        <div class="row pad-20">
            <div class="col-md-3">
                <div class="form-group">
                    <label>First Name *</label>
                    <input type="text" name="fname" value="" class="required form-control">
                </div>
			</div>
			 <div class="col-md-3">
                <div class="form-group">
                    <label>Last Name *</label>
                    <input type="text" name="lname" value="" class="required form-control">
                </div>
			</div>
			 <div class="col-md-3">
               <div class="form-group">
                    <label>Select Marital Status *</label>
                    <select name="marital" class="required form-control" style="border:2px solid #4897F1; border-radius: 4px;">
                        <option value="">Select</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Separated">Separated</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                </div>
			</div>
			<div class="col-md-3">
				 <div class="form-group">
                    <label class="control-label">Date of Birth (MM/DD/YYYY) *</label>                   
                        <input type="date" class="form-control" name="date" style="border:2px solid #4897F1; border-radius: 4px;"/>
                </div>
			</div>
            <div class="col-md-3">
				 <div class="form-group">
                    <label>Gender *</label>
                    <select name="gender" class="required form-control" style="border:2px solid #4897F1; border-radius: 4px;">
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    </div>
                </div>				 
              
			<div class="col-md-3">
				<div class="form-group">
                    <label>Email *</label>
                    <input type="text" name="email" id="email" value="" class="email required form-control">
                </div>
			</div>
			
			<div class="col-md-3">
				<div class="form-group">
                    <label>Mobile No. *</label>
                    <input type="text" name="mobile" value="" class="required number form-control" maxlength="12">
                </div>
			</div>
	
			<div class="col-md-3">
				  <div class="form-group">
                    <label>Highest Education Qualification  *</label>
                    <select name="edu" class="required form-control" style="border:2px solid #4897F1; border-radius: 4px;">
                        <option value="">Select</option>
                        <option value="graduate">Graduate</option>
                        <option value="BEd">B. Ed</option>
                        <option value="postgraduate">Post Graduate</option>
                        <option value="doctrate">Doctrate</option>
                    </select>
                </div>
			</div>
        </div>
        <div class="row text-center">
            <h3 style="color:#f4511e;"> Employee Detail </h3>
        </div>
		<br>
        <div class="row pad-20">
				<div class="col-md-3">
                <div class="form-group">
                    <label>Current Employer *</label>
                    <input type="text" name="currentEmp" id="departure" value="" class="required form-control">
                </div>
			</div>
			
			<div class="col-md-3">
                    <div class="form-group">
                        <label>Current CTC *</label>
                        <input type="text" name="salary" id="departure" value="" class="required number form-control">
                    </div>
			</div>

			<div class="col-md-3">
                    <div class="form-group">
                        <label>Total experience *</label>
                        <input type="text" name="months" id="departure" value="" placeholder="" class="required form-control">
                    </div>	
			</div>

			<div class="col-md-3">
			<div class="form-group text-center">
                <label>Upload Resume in Word or PDF. *</label>			 
					<input type="file" id="exampleInputFile" name="resume" class="required form-control" style="border:2px solid #4897F1; border-radius: 4px;">
				</div>
            </div>      
        </div>
		<br>
        <div class="row pad-20">
				 <div class="form-group text-center" style="padding-top:30px;">
						<button type="submit" class="btn btn-primary" name="formsubmit" id="buttonsubmit" style="width:300px;">SUBMIT</button>
					</div>
        </div>
    </form>
    <script>
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        })
    </script>


</div>

<br><br>
<?php

include("footer.html");
?>

