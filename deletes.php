<?php 

if (isset($_POST['applicationiddelete'])) {
    function validate($data){

        $data = trim($data);
 
        $data = stripslashes($data);
 
        $data = htmlspecialchars($data);
 
        return $data;
 
     }
     $idv = validate($_POST['applicationiddelete']);

     $db = new SQLite3('stuffed_face.sq3');

     $sql = "DELETE FROM Item WHERE id='".$idv."'";

     $result = $db->query($sql);

     unset($db);
     header("Location: appointments.php");
     echo '<script>alert("Appointment deleted")</script>';

}else{

    header("Location: appointments.php?error=Incorect information");

    exit();

}
?>