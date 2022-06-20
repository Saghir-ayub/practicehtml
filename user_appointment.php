<?php 

if (isset($_POST['app_time']) && isset($_POST['app_date']) && isset($_POST['patient_name']) && isset($_POST['gp_id']) && isset($_POST['patient_id'])) {
    function validate($data){

        // $data = trim($data);
 
        // $data = stripslashes($data);
 
        // $data = htmlspecialchars($data);
 
        return $data;
 
     }
     $apptime = validate($_POST['app_time']);

     $appdate = validate($_POST['app_date']);

     $patname = validate($_POST['patient_name']);

     $gpid = validate($_POST['gp_id']);

     $patid = validate($_POST['patient_id']);

     $db = new SQLite3('gp_appointments.sq3');

     $sql = "INSERT INTO Appointment VALUES(NULL,'" .$apptime. "','" .$appdate. "','" .$patname."','Pending'," .$gpid."," .$patid.")";

     //$sql = "INSERT INTO Appointment VALUES(8, '13:30:00', '2022-06-22', 'Saghir', 'Cancelled', 1, 3)";

     $result = $db->query($sql);

     unset($db);
     header("Location: booking.php");
     echo '<script>alert("Appointment submitted")</script>';

}else{

    header("Location: booking.php?error=Incorect information");

    exit();

}
?>