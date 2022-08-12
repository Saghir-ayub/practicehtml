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
    <title>Timetable</title>


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
      <li class="nav-item">
        <a class="nav-link" href="booking.php">Book an appointment <span class="sr-only">(current)</span></a>
      </li>
     <?php
     if ($_SESSION['name']=='admin'){
     ?>
      <li class="nav-item">
        <a class="nav-link" href="appointments.php">Pending appointments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="timetable.php">Appointment table</a>
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

<!-- all the buttons -->
<button onclick="AllApp()"> All Appointments </button>
<script>
    function AllApp(){
    var result ="<?php php_allapp(); ?>"
    document.getElementById("appappinner").innerHTML = result;
    document.getElementById("allappointments").style.display = "Block";
    }
</script>

<button onclick="clickMe()"> Appointments today </button>
<script>
    function clickMe(){
    var result ="<?php php_func(); ?>"
    document.getElementById("resultDiv").innerHTML = result;
    document.getElementById("appointmentstoday").style.display = "Block";
    }
</script>

<button onclick="patsweek()"> Appointments completed this week (Sarita)</button>
<script>
    function patsweek(){
    var result ="<?php php_patsweek(); ?>"
    document.getElementById("patientsweek").innerHTML = result;
    document.getElementById("patientsweekblock").style.display = "Block";
    }
</script>

<!-- All the divs displaying results of queries -->
<div class="text-center-class" id = "allappointments" style="display:none">
  <h3 class="text-center-class">All the appointments</h3>
  <h9>Application id  || Time  || Date || Patient name || Status || GP_ID ||  Patient_ID</h9> <br/>
  <div id="appappinner" class="text-center-class"></div>
</div>

<div class="text-center-class" id = "appointmentstoday" style="display:none">
<h3 class="text-center-class">All appointments today</h3>
<h9>Application id  || Time  || Date || Patient name || Status || GP_ID ||  Patient_ID</h9> <br/>
<div id="resultDiv" class="text-center-class"></div>
</div>

<div class="text-center-class" id = "patientsweekblock" style="display:none">
<h3 class="text-center-class">All appointments completed this week (Sarita)</h3>
<h9>GP Name  || Total</h9> <br/>
<div id="patientsweek" class="text-center-class"></div>
</div>



<!-- All the functions doing the queries -->
<?php
function php_allapp(){
$db = new SQLite3('gp_appointments.sq3');
$sql = "SELECT * FROM Appointment";
$result = $db->query($sql);
while ($row = $result->fetchArray(SQLITE3_ASSOC)){
  echo $row['App_id'] . '|| ' . $row['Time'] . '||' . $row['Date'] .'|| ' . $row['Patient_name'] .'||' . $row['Confirmation'] .'|| ' . $row['GP_id'] .'||' . $row['Patient_id'] .'<br/>';
}
unset($db);
}
?>

<?php
function php_func(){
    $db = new SQLite3('gp_appointments.sq3');
    $sql = "SELECT * FROM Appointment WHERE Date = '2022-06-20'";
    $result = $db->query($sql);
    while ($row = $result->fetchArray(SQLITE3_ASSOC)){
      echo $row['App_id'] . '|| ' . $row['Time'] . '||' . $row['Date'] .'|| ' . $row['Patient_name'] .'||' . $row['Confirmation'] .'|| ' . $row['GP_id'] .'||' . $row['Patient_id'] . '<br/>';
    }
    unset($db);
}
?>

<?php
function php_patsweek(){
$db = new SQLite3('gp_appointments.sq3');
$sql = "SELECT GPs.Name, COUNT(*) AS Total
FROM Appointment
JOIN GPs
ON GPs.GP_id = Appointment.GP_id
WHERE Appointment.Confirmation = 'Completed' AND Appointment.Date BETWEEN '2013-01-01' AND '2022-06-24' AND Appointment.GP_id = 2
";
$result = $db->query($sql);
while ($row = $result->fetchArray(SQLITE3_ASSOC)){
  echo $row['Name'] . '|| ' . $row['Total'] .'<br/>';
}
unset($db);
}
?>

</body>
</html>