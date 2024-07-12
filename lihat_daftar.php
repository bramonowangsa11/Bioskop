<?php
if(isset($_GET['id'])){
    $idd = $_GET['id'];
}else{
    $idd=0;
}

include("koneksi.php");
$result = mysqli_query($con, "SELECT booking.id_book,booking.nama,booking.no_hp,film.judul_film,teater.id_teater,
teater.jenis_teater,tempat_duduk.kursi FROM booking,film,teater,tempat_duduk WHERE 
booking.id_film=film.id_film AND 
film.id_teater=teater.id_teater AND 
tempat_duduk.id_teater=teater.id_teater AND tempat_duduk.id_book=booking.id_book; ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Booking</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <h1>Daftar Booking</h1>

    <table>
        <thead>
            <tr>
                <th>kode booking</th>
                <th>Nama</th>
                <th>no hp</th>   
                <th>judul</th>
                <th>teater</th>
                <th>kursi</th>
                <th>ket</th>
            </tr>
        </thead>
        
            <?php echo $idd;
            $konter=0;
            ?>
            
            <?php if($result->num_rows > 0) :?>
            <?php while ($user_data = mysqli_fetch_array($result)) : ?>
                <tr>
                    <td><?php echo $user_data['id_book']; ?></td>
                    <td><?php echo $user_data['nama']; ?></td>
                    <td><?php echo $user_data['no_hp']; ?></td>
                    <td><?php echo $user_data['judul_film']; ?></td>
                    <td><?php echo $user_data['id_teater']; ?></td>
                    <td><?php echo $user_data['kursi']; ?></td>
                    <td><center><p><a href="delete.php?idbuking=<?php echo $user_data['id_book']; ?>&&pp=<?php echo $user_data['kursi'];?>"><button class="w3-button w3-red">hapus</button></a></p></center></td>
                    <td><center><p><a href="update.php?idbuking=<?php echo $user_data['id_book']; ?>&&pp=<?php echo $user_data['kursi'];?>"><button class="w3-button w3-red">update</button></a></p></center></td>
                     <?php if($idd!=$user_data['id_book']&&$idd!=0): ?>
                        <?php $konter++ ;
                         ?>
                    <?php endif ?>
                </tr>

           <?php endwhile ?>
            <?php endif ?>
           
        
    </table>

    <a href="tampilan_utama.php">Kembali</a>
</body>
</html>