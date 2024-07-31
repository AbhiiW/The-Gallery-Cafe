<?php

include 'dbconnection.php';


$customerName = $_POST['customerName'];
$customerEmail = $_POST['customerEmail'];
$reservationDate = $_POST['reservationDate'];
$reservationTime = $_POST['reservationTime'];


$sql = "INSERT INTO reservations (customer_name, customer_email, reservation_date, reservation_time)
        VALUES ('$customerName', '$customerEmail', '$reservationDate', '$reservationTime')";

if ($conn->query($sql) === TRUE) {
    echo "Reservation successfully made!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
