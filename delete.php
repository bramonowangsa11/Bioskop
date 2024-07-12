<?php

// Connect to the database
include("koneksi.php");

// Get the ID of the booking to delete

$id = $_GET['idbuking'];
$kursi = $_GET['pp'];

// Delete the booking from the database

    $result = mysqli_query($con, "DELETE FROM tempat_duduk WHERE kursi='$kursi'");

    // 

// 


// Redirect the user to the list of bookings page
header("Location: lihat_daftar.php?id=$id");

?>
