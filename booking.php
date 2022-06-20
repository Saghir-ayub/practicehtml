<?php
session_start();
if(isset($_SESSION['username'])) {
  echo "Your session is running " . $_SESSION['username'];
}
?>
<!DOCTYPE html>

<html>

<head>
     <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"> </script>
	<script src="mdscript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Book an appointment</title>


</head>

<body>
<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="home.php">
          <img src="female-doctor.webp" height="50px" width="50px" alt="icon for nav bar">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="booking.php">Book an appointment <span class="sr-only">(current)</span></a>
      </li>
     <?php
     if ($_SESSION['name']=='admin'){
     ?>
      <li class="nav-item">
        <a class="nav-link" href="appointments.php">Pending appointments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="timetable.php">Appointment table</a>
      </li>
      <?php
     }
     ?>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
    </ul>
  </div>
</nav>
</div>
<div class="text-center-class">
	<form action="/practicehtml/user_appointment.php" method="POST"><h1>Book an appointment</h1>
	<div style="height:10px"></div>
  <div class="form-group"  >
	<label for="aptime"><b>Time</b></label>	
	<input class="form-control-sm" type="text" id="app_time" name="app_time" placeholder="Enter Time HH:MM:SS" required> <br/>
  </div>

  <div class="form-group">
	<label for="apdate"><b>Date</b></label>	
	<input class="form-control-sm" type="text" id="app_date" name="app_date" placeholder="Enter Date YYYY/MM/DD" required> <br/>
  </div>

  <div class="form-group">
  <label for="pname"><b>Patient name</b></label>	
	<input class="form-control-sm" type="text" id="patient_name" name="patient_name" placeholder="Enter between 1-3" required> <br/>
  </div>

  <div class="form-group">
  <label for="gpidd"><b>GP ID</b></label>	
	<input class="form-control-sm" type="number" id="gp_id" name="gp_id" placeholder="Enter gp id (1-3)" required> <br/>
  </div>

  <div class="form-group">
  <label for="patientsid"><b>Patient ID</b></label>	
	<input class="form-control-sm" type="number" id="patient_id" name="patient_id" placeholder="Enter your patient id" required> <br/>
  </div>

	<button class="btn btn-info" type="submit" id="item_submit">Submit item</button>
	</form>
</div>
</body>
</html>