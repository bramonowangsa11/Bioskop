<?php

include("../koneksi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data kursi yang dipilih dari formulir
    $selectedSeats = $_POST['selectedSeats'];
    $id_book=$_POST['book'];
    $id_teater=$_POST['teater'];
    echo "id book" . $id_book;
    echo "id teater ". $id_teater;
    
    // Lakukan sesuatu dengan data kursi yang dipilih
    // Misalnya, simpan ke database atau lakukan proses lainnya
    // ...

    // Tampilkan kursi yang dipilih kepada pengguna
    echo "<h2>Terima Kasih!</h2>";
    echo "<p>Kursi yang Anda pilih:</p>";
    
    // Pecah string kursi yang dipilih menjadi array
    $selectedSeatsArray = explode(",", $selectedSeats);

    // Tampilkan setiap kursi
    foreach ($selectedSeatsArray as $selectedSeat) {
      
        echo "<p>Kursi: $selectedSeat</p>";
        $result = mysqli_query($con, "INSERT INTO tempat_duduk (kursi,id_teater,id_book) VALUES ('$selectedSeat','$id_teater','$id_book')");
    }
    echo "<a href='../booking/tambahbooking.php'>balik</a>";
    
} else {
    // Jika tidak ada data POST, kembalikan pengguna atau lakukan sesuatu yang sesuai
    // header("Location: coba.php");
    exit();
}
?>
