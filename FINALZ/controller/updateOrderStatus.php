<?php
include_once "../config/dbconnect.php";

$id=$_POST['record'];

$sql = "SELECT order_status FROM orders WHERE id='$id'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row["order_status"] == 0) {
    $update = mysqli_query($conn, "UPDATE orders SET order_status=1 WHERE id='$id'");
    if ($update) {
        echo "success";
    } else {
        echo "Error updating order_status";
    }
} else if ($row["order_status"] == 1) {
    $update = mysqli_query($conn, "UPDATE orders SET order_status=0 WHERE id='$id'");
    if ($update) {
        echo "success";
    } else {
        echo "Error updating order_status";
    }
} else {
    echo "Invalid order_status value";
}
?>
