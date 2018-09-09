<?php

  require_once('logindatabase.php');
  $conn = get_conn();

  $hospital = "hosiptal1";
  $doctor_id = "0";
  $patients_table = "patients";


  $query = "select * from $hospital where doctorid='$doctor_id'";
  // echo $query;
  $result = $conn->query($query);

  if( $result->num_rows > 0 ){

  }

  $current_patient_id = $result->fetch_assoc()["patientid"];
  // echo $current_patient_id;

  // requery
  $result = $conn->query($query);

  $query = "select * from $patients_table where id='$current_patient_id'";
  // echo $query;
  $patient_detail_result = $conn->query($query);

  $all_details_of_current_patient = $patient_detail_result->fetch_assoc();
  // var_dump($all_details_of_current_patient);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #228B22;
      height: 100%;
       color: #fff;
      padding: 5% ;
      font-family: Montserrat, sans-serif;
    }
    .List{
    	margin-left: 10%;
    }
    .dropdown-toggle ul li a img{
    	padding: 100%;
    }
    .Patients ul li{
    	display: inline-block;
    }
    .Patients ul li a img{
    	width: 50%;
    	padding: 0;
    	margin: 0;
    }
    .glyphicon{
    	padding: 2% 20% 2% 20%;
    }

    .jumbotron {
      background-color: #228B22;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
    /* Set black background color, white text and some padding */
    footer {
    	text-align: center;
      background-color: #228B22;
      color: white;
      margin-top: 2%;
      padding: 2%;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
<div class="jumbotron">
  <div class="container text-center">
    <h3>Welcome</h3>      
 	<h1>Dr. Mustafa Qazi</h1>
  </div>
</div>

<nav class="navbar">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li></ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav Patients">
		<div class="dropdown">
		  <button class="btn btn-primary dropdown-toggle List" type="button" data-toggle="dropdown"><h2>Patients List: </h2>
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">

    <?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  ?>
  

	   <li><a href=""><img src="/home/masuta/Downloads/profile-user-silhouette_318-40557.jpg"><?php echo $row["patientid"] ?></a><button class="btn btn-success glyphicon glyphicon-ok"></button></li>
     

       <?php
    echo $row["patientid"];
  }
  
} else {
  echo "0 results";
}

?>

		  </ul>
		</div>
</div>

           <!--  <ul class="nav nav-pills nav-stacked">
       
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>
 -->
    <div class="col-sm-9">
    	  <div class="col-sm-3">
          <div class="well">
            <img src="/home/masuta/Downloads/profile-user-silhouette_318-40557.jpg" style="width: 100%">
          </div>
        </div>
    	 <div class="col-sm-9">
    	   <h2>Details:</h2>
      <hr>
      <label>Name :</label><h2> <?php  echo $all_details_of_current_patient["name"] ?> l</h2>
      <label>Blood Group :</label><h2> <?php  echo $all_details_of_current_patient["blood_group"] ?> </h2>      
  </div>
     
      <div class="row" style="margin: 25% 0 0 2%; ">
      	<h1>Previous Details: </h1> 
        <div class="col-sm-3">
          <div class="well">
            <h4>XYZ</h4>
            <p>fdcyhboi</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>XYZ</h4>
            <p>fdcyhboi</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>XYZ</h4>
            <p>fdcyhboi</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>XYZ</h4>
            <p>fdcyhboi</p>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<button id="nextbutton">
  Next Patient
</button>

<script>

 $('#nextbutton').click(function() {

$.ajax({
 type: "POST",
 url: "reduce.php",
 data: { doctorid: "<?php echo $doctor_id ?>",
        hospitalid: "<?php echo $hospital ?>",
        patientid: "<?php echo $current_patient_id ?>"
  }
}).done(function( msg ) {
 alert( "Data Saved: " + msg );
});
});
</script>

<footer class="container-fluid">
  <p>Made with love by MAD!</p>
</footer>

</body>
</html>
