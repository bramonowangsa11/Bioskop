<?php
include("../koneksi.php");
// Get the ID of the booking to delete
$id = $_GET['id'];
// Delete the booking from the database
    $result = mysqli_query($con, "DELETE FROM booking WHERE id_book='$id'");
// Redirect the user to the list of bookings page
header("Location: tambahbooking.php");
?>