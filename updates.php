<?php 

if (isset($_POST['applicationid'])) {
    function validate($data){

        // $data = trim($data);
 
        // $data = stripslashes($data);
 
        // $data = htmlspecialchars($data);
 
        return $data;
 
     }
     $idv = validate($_POST['applicationid']);


     $db = new SQLite3('gp_appointments.sq3');

     $sql = "UPDATE Appointment SET Confirmation = 'Approved' WHERE App_id='".$idv."'";

     $result = $db->query($sql);

     unset($db);
     header("Location: appointments.php");
     echo '<script>alert("Appointment updated")</script>';

}else{

    header("Location: appointments.php?error=Incorect information");

    exit();

}
?>