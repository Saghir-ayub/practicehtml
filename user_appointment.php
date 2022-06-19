<?php 

if (isset($_POST['item_name']) && isset($_POST['item_price']) && isset($_POST['restaurant_id'])) {
    function validate($data){

        $data = trim($data);
 
        $data = stripslashes($data);
 
        $data = htmlspecialchars($data);
 
        return $data;
 
     }
     $iname = validate($_POST['item_name']);

     $iprice = validate($_POST['item_price']);

     $rid = validate($_POST['restaurant_id']);

     $db = new SQLite3('stuffed_face.sq3');

     $sql = "INSERT INTO Item VALUES(NULL,'" .$iname. "','" .$iprice. "','" .$rid."')";

     $result = $db->query($sql);

     unset($db);
     header("Location: booking.php");
     echo '<script>alert("Appointment submitted")</script>';

}else{

    header("Location: booking.php?error=Incorect information");

    exit();

}
?>