<?php 

if (isset($_POST['applicationid'])) {
    function validate($data){

        $data = trim($data);
 
        $data = stripslashes($data);
 
        $data = htmlspecialchars($data);
 
        return $data;
 
     }
     $idv = validate($_POST['applicationid']);


     $db = new SQLite3('stuffed_face.sq3');

     $sql = "UPDATE Item SET price = 100 WHERE id='".$idv."'";

     $result = $db->query($sql);

     unset($db);
     header("Location: appointments.php");
     echo '<script>alert("Appointment updated")</script>';

}else{

    header("Location: appointments.php?error=Incorect information");

    exit();

}
?>