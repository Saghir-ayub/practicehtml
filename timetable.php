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
<div class="text-center-class">
<?php
$db = new SQLite3('stuffed_face.sq3');
$sql = "SELECT * FROM Restaurant";
$result = $db->query($sql);
while ($row = $result->fetchArray(SQLITE3_ASSOC)){
  echo $row['id'] . ': ' . $row['name'] . '<br/>';
}
unset($db);
?>
</div>
<?php
function php_func(){
    $db = new SQLite3('stuffed_face.sq3');
    $sql = "SELECT Restaurant.name, SUM(Order_item.quantity * Item.price) AS TOTAL
    FROM Lunch_Order
    JOIN Order_Item
    ON Lunch_Order.id=Order_item.lunch_order_id
    JOIN Item
    ON Order_item.item_id = Item.id
    JOIN Restaurant
    ON Lunch_order.restaurant_id=Restaurant.id
    GROUP BY restaurant.name
    ORDER BY TOTAL ASC;";
    // $sql_2 = "DELETE from Lunch_Order WHERE Lunch_order.Order_date='2013-11-05'";
    // $sql_3 = "DELETE from Order_Item WHERE Order_item.id=14";
    // $result_3 = $db->query($sql_3);
    // $result_2 = $db->query($sql_2);
    $result = $db->query($sql);
    while ($row = $result->fetchArray(SQLITE3_ASSOC)){
      echo $row['name'] . ': $' . $row['TOTAL'] . '<br/>';
    }
    unset($db);
}
?>
<button onclick="clickMe()"> Total money made by each restaurant </button>
<div id="resultDiv" class="text-center-class"></div>
<script>
    function clickMe(){
    var result ="<?php php_func(); ?>"
    document.getElementById("resultDiv").innerHTML = result;
    }
</script>
</body>
</html>