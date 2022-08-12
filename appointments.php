<?php
session_start();
if (isset($_SESSION['username'])) {
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
  <title>Pending appointments</title>


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
          if ($_SESSION['name'] == 'admin') {
          ?>
            <li class="nav-item">
              <a class="nav-link active" href="appointments.php">Pending appointments</a>
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
  <div class="text-center-class" style="height:60px">
    <h2>Currently pending appointments</h2>
  </div>
  <div class="container">
    <div class="row align-items-center justify-content-md-center" style="height:auto">
      <div class="col-md-auto text-center-class">
        <?php
        $db = new SQLite3('gp_appointments.sq3');
        $sql = "SELECT * FROM Appointment WHERE Confirmation = 'Pending'";
        $result = $db->query($sql);
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
          echo "<div style='height:30px'>" . $row['App_id'] . ': ' . $row['Patient_name'] . ': ' . $row['Date'] . ': ' . $row['Time'] . "</div> <br/>";
        }
        //echo "<p>all the item names as buttons</p>";
        ?>
      </div>
      <div class="col-md-auto text-center-class">
        <?php
        while ($singlerow = $result->fetchArray()) {
          echo "<div>
        <button onclick='app_u(this.id)' id='update_" . $singlerow[0] . "'>Approve</button>
        <button onclick='app_c(this.id)' id='cancel_" . $singlerow[0] . "'>Cancel</button>
        <button onclick='app_d(this.id)' id='delete_" . $singlerow[0] . "'>Delete</button>
        </div> <br/>";
        }
        unset($db);
        ?>
      </div>
    </div>
  </div>


  <form id="hidden_update" action="updates.php" method="post">
    <input type="hidden" name="applicationid" id="appointment_accept" value="" />
  </form>
  <!-- <div id="appointment_accept" class="text-center-class"></div> -->
  <script>
    function app_u(clicked_id) {
      var $id_to_up = clicked_id.substring('update_'.length);
      document.getElementById("hidden_update").applicationid.value = $id_to_up;
      document.forms.hidden_update.submit()
    };
  </script>

  <form id="hidden_delete" action="deletes.php" method="post">
    <input type="hidden" name="applicationiddelete" id="appointment_delete" value="" />
  </form>
  <!-- <div id="appointment_accept" class="text-center-class"></div> -->
  <script>
    function app_d(clicked_id_del) {
      var $id_to_d = clicked_id_del.substring('delete_'.length);
      document.getElementById("hidden_delete").applicationiddelete.value = $id_to_d;
      document.forms.hidden_delete.submit()
    };
  </script>

  <form id="hidden_cancel" action="cancel.php" method="post">
    <input type="hidden" name="applicationidcancel" id="appointment_cancel" value="" />
  </form>
  <!-- <div id="appointment_accept" class="text-center-class"></div> -->
  <script>
    function app_c(clicked_id_can) {
      var $id_to_c = clicked_id_can.substring('cancel_'.length);
      document.getElementById("hidden_cancel").applicationidcancel.value = $id_to_c;
      document.forms.hidden_cancel.submit()
    };
  </script>

  <div>
  </div>
</body>

</html>