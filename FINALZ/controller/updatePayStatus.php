<?php
include_once "../config/dbconnect.php";

$id=$_POST['record'];

$sql = "SELECT pay_status FROM orders WHERE id='$id'"; 
$result = $conn->query($sql);

if ($result) {
  $row = $result->fetch_assoc();

  if ($row["pay_status"] == 0) {
    $update = mysqli_query($conn, "UPDATE orders SET pay_status=1 WHERE id='$id'");
    if ($update) {
      echo "success";
    } else {
      echo "Error updating pay_status";
    }
  } else if ($row["pay_status"] == 1) {
    $update = mysqli_query($conn, "UPDATE orders SET pay_status=0 WHERE id='$id'");
    if ($update) {
      echo "success";
    } else {
      echo "Error updating pay_status";
    }
  } else {
    echo "Invalid pay_status value";
  }
} else {
  echo "Error retrieving pay_status";
}
?>
