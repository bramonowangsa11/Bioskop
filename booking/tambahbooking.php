<?php
session_start();
include("kirimrespon.php");
include("../koneksi.php");
$idu=$_SESSION['iduser'];

$result1= mysqli_query($con,"SELECT * FROM booking WHERE id_user='$idu' ");
?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") :?>
   <?php 
   if(isset($_POST["nama"])&&isset($_POST["iduser"])&&isset($_POST["no_hp"])&&isset($_POST["id_film"])){
    $nama = $_POST["nama"];
    $iduser = $_POST["iduser"];
    $no_hp = $_POST["no_hp"];
    $id_film = $_POST["id_film"];
    createUser($nama, $iduser,$no_hp,$id_film);
   } 
    ?>
<?php endif ?>
    
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <link rel="stylesheet" href="tiketstyle.css">
        
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
           
        </head>
        <body>

            <div class="container">
            <h1>Tiket Anda</h1>
            <table>
                <thead>
                <tr>
                        <th>id booking </th>
                        <th>id user</th>
                        <th>no hp</th>   
                        <th>id film</th>
                        <th>Nama</th>
                        <th>kursi</th>
                        <th>ket</th>
                </tr>
                </thead>
                <tbody>
                <?php if($result1->num_rows > 0) :?>
                <?php while ($user_data = mysqli_fetch_array($result1)) : ?>
                <tr>
                    <td><?php echo $user_data['id_book']; ?></td>
                    <td><?php echo $user_data['id_user']; ?></td>
                    <td><?php echo $user_data['no_hp']; ?></td>
                    <td><?php echo $user_data['id_film']; ?></td>
                    <td><?php echo $user_data['nama']; ?></td>
                    <td>
                    <?php 

                        $result = mysqli_query($con, "SELECT tempat_duduk.kursi
                        FROM tempat_duduk
                        WHERE $user_data[id_book]=tempat_duduk.id_book  ");

                    ?>
                    <?php if($result->num_rows > 0) :?>
                    <?php while ($kursi = mysqli_fetch_array($result)) : ?>
                        <?php echo $kursi['kursi'].","; ?>
                    <?php endwhile ?>
                    <?php endif ?>
                    </td>
                    <td>
                    <a href="../coba/coba.php?id_t=<?php echo $user_data['id_user']; ?>&&id_b=<?php echo $user_data['id_book']; ?>" class="green-button">Tambah Kursi</a>
                    <a href="deletebooking.php?id=<?php echo $user_data['id_book']; ?>" class="red-button">Hapus</a>
                    </td>
                </tr>
                <?php endwhile ?>
                <?php endif ?>
                <!-- Tambahkan baris sesuai kebutuhan -->
                </tbody>
            </table>
            </div>

        </body>
        </html>
        
    
    

    
    
   
    
    

