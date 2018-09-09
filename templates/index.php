<?php
if (!isset($_POST["submit"])){

    $patient_id = $_POST["patient_id"];
    $department = $_POST["department_id"];
    $doctor = $_POST["doctor_id"];
    $comment = $_POST["problem"];
    $hospital = "hosiptal1";

    require_once('logindatabase.php');
    $conn = get_conn();



    $query = "INSERT INTO $hospital VALUES('$patient_id', '$department', '$doctor', '$comment')";

    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>CureNX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  .jumbotron {
      background-color: #228B22;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  footer{
  	width: 100%;
  	padding: 0;
  	margin-top: 2%; 
    background-color: #228B22; 
  }
 
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  </style>
</head>
<body id="myPage" data-offset="60">
<div class="jumbotron text-center">
  <h3>CureNX</h3>
  <h1>AIIMS Hospital</h1> 
</div>

<!-- Container (Portfolio Section) -->
 <section id="appointment" class="choose-form-inner" style="margin-left: 40%">
    <div class="container">
            <!-- Message & exception -->
            <div class="col-sm-12">
                                
                 
            </div>


            <!-- Appointment Form -->
            <div class="col-sm-6 col-md-4">
 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#appRegister" aria-controls="appRegister" role="tab" data-toggle="tab">Appointment</a>
                </li>
                <li role="presentation" class="">
                    <a href="#patientRegister" aria-controls="patientRegister" role="tab" data-toggle="tab">Registration</a>
                </li> 
              </ul>


              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Login -->
                <div role="tabpanel" class="tab-pane active" id="appRegister">
                    <div id="form" class="form-area"> 
                        <form action="" id="appointmentForm" method="post" accept-charset="utf-8">
                        <input type="hidden" name="csrf_stream_token" />
 
                        <div class="form-padding">
                            <h4>Appointment Form</h4>

                            <!-- patient id -->
                            <div class="form-group">
                                <label>Patient ID <i class="text-danger">*</i></label>
                                <input name="patient_id" autocomplete="off" type="text" class="form-control" id="patient_id" placeholder="Patient ID" value="">
                                <span></span>
                            </div>
     
                            <div class="form-group">
                                <label>Department Name <i class="text-danger">*</i></label>
                                <select name="department_id" class="form-control" id="department_id">
								<option value="" selected="selected">Select Department</option>
								<option value="12">Microbiology</option>
								<option value="13">Neonatal</option>
								<option value="14">Nephrology</option>
								<option value="15">Neurology</option>
								<option value="16">Oncology</option>
								<option value="17">Orthopaedics</option>
								<option value="18">Pharmacy</option>
								<option value="19">Radiotherapy</option>
								<option value="21">Rheumatology</option>
								<option value="22">Gynaecology</option>
								<option value="23">Obstetrics</option>
								<option value="25">General Surgery</option>
								</select>
                                <span class="doctor_error"></span>
                            </div>
     
                            <div class="form-group">
                                <label>Doctor Name<i class="text-danger">*</i></label>
                                <select name="doctor_id" class="form-control" id="doctor_id">
                                    <option value="0">Doctor 1</option>
                                    <option value="2">Doctor 2</option>
                                    <option value="3">Doctor 3</option>
									</select>
                                <p class="help-block" id="available_days"></p>
                            </div>

                            <div class="form-group">
                                <label>Appointment Date <i class="text-danger">*</i></label>
                                <input name="date" type="text" class="datepicker-avaiable-days form-control" id="date" placeholder="Appointment Date" >
                            </div>
     
                            <div class="form-group">
                                <label>Serial No <i class="text-danger">*</i></label>
                                <div id="serial_preview">
                                    <div class="btn btn-success disabled btn-sm"> 01</div>
                                    <div class="btn btn-success disabled btn-sm"> 02</div>
                                    <div class="btn btn-success disabled btn-sm"> 03</div>...
                                    <div class="slbtn btn btn-success disabled btn-sm"> N</div>

                                </div>
                                <input type="hidden" name="schedule_id" id="schedule_id"/>
                                <input type="hidden" name="serial_no" id="serial_no"/>
                            </div>

                            <div class="form-group">
                                <label>Problem </label>
                                <textarea name="problem" class="form-control" placeholder="Problem"  rows="7"></textarea>
                            </div> 

                        </div>

                        <div class="form-footer">
                            <div class="checkbox">
                                <label></label>
                            </div>
                            <button type="submit" id="submit" class="btn thm-btn">Submit</button>
                        </div> 

                        </form>                    </div>
                </div>

                <!-- Register -->
                <div role="tabpanel" class="tab-pane " id="patientRegister">
                    <div id="form" class="form-area"> 

                        <form action="" id="appointmentForm" method="post" accept-charset="utf-8">
					<input type="hidden" name="csrf_stream_token" />           
 
                        <div class="form-padding">
                            <h4></h4>

                            <div class="form-group">
                                <label>Full Name <i class="text-danger">*</i></label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input name="firstname" type="text" class="form-control" placeholder="First Name">
                                    </div>

                                    <div class="col-sm-6">
                                        <input name="lastname" type="text" class="form-control" placeholder="Last Name"> 
                                    </div>  
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Contact <i class="text-danger">*</i></label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input name="phone" type="text" class="form-control" placeholder="Phone No (Optional)"> 
                                    </div>

                                    <div class="col-sm-6">
                                        <input name="mobile" type="text" class="form-control" placeholder="Mobile No"> 
                                    </div>  
                                </div>
                            </div> 

                            <div class="form-group">
                                <div class="form-check">
                                <label>Sex <i class="text-danger">*</i></label>
                                    <label class="radio-inline">
                                    <input type="radio" name="sex" value="Male">Male                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="sex" value="Female">Female                                    </label>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label>Date of Birth <i class="text-danger">*</i></label>
                                <input name="date_of_birth" type="text" class="datepicker form-control" placeholder="Date of Birth" >
                            </div>

                            <div class="form-group">
                                <label>Blood Group </label>
                                <select name="blood_group" class="form-control">
										<option value="" selected="selected">Select Option</option>
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										</select>
                            </div> 
     
                            <div class="form-group">
                                <label>Picture</label>
                                <input name="picture" type="file">
                            </div>

                            <div class="form-group">
                                <label>Address <i class="text-danger">*</i></label>
                                <textarea name="address" class="form-control" placeholder="Address"  rows="7"></textarea>
                            </div> 

                        </div>

                        <div class="form-footer">
                            <div class="checkbox">
                                <label></label>
                            </div>
                            <button type="submit" name="submit" id="submit" class="btn thm-btn">Submit</button>
                        </div> 

                        </form>                    </div>
                </div> 
              </div>
            </div>
        </div>
    </section>

<footer class="container-fluid text-center" >
<p>Made with love by MAD!</p>
</footer>
</body>
</html>
