<?php include("../koneksi.php");
if(isset($_GET['id_t'])&&isset($_GET['id_b'])){
    $id_teater=$_GET['id_t'];
    $id_book=$_GET['id_b'];
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <title>Pemesanan Kursi Bioskop</title>
</head>
<body>
    <?php 
    $result=mysqli_query($con,"SHOW COLUMNS FROM tempat_duduk LIKE 'kursi'");
    $nilai=mysqli_query($con,"SELECT kursi FROM tempat_duduk");
    $row=$result->fetch_assoc();
    $enumValues = explode("','", substr($row['Type'], 6, -2));
    $array_hasil = array();
    while ($user_data = mysqli_fetch_assoc($nilai)){
       $array_hasil[]=$user_data['kursi'];
    }
    
    $hasil = array_diff($enumValues, $array_hasil);
   
    ?>
    <div class="container">
        <h2>Pilih Kursi Anda</h2>
        <div id="seat-container" class="seat-container">
            <?php foreach ($enumValues as $h) : ?>
                <?php $isOccupied = in_array($h, $array_hasil); ?>
                <div class="seat <?php echo $isOccupied ? 'occupied' : ''; ?>" data-seat="<?php echo $h; ?> ">
                    <?php echo $h; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <p class="text">Legenda: <span class="seat"></span> Tersedia | <span class="seat occupied"></span> Sudah Dipesan</p>
        <form id="seatForm" method="post" action="proses.php">
          <input type="hidden" id="selectedSeatsInput" name="selectedSeats" value="">
          <input type="hidden" name="teater" value="<?php echo $id_teater?>">
          <input type="hidden" name="book" value="<?php echo $id_book?>">
        <button type="submit">Pesan Kursi</button>
</form>

    </div>

    
</body>
</html>
