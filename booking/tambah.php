<?php session_start(); 
include("../koneksi.php");
$nilai=mysqli_query($con,"SELECT id_film,judul_film FROM film");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Booking</title>
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

        input, button {
            width: 100%;
            margin-bottom: 10px;
        }

        button {
            background-color: #337ab7;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Tambah Booking</h1>

    <form action="tambahbooking.php" method="post" name="form1">
        <table>
            <tr>
                <th>Nama</th>
                <td><input type="hidden" name="nama" value="<?php echo $_SESSION['username']?>"><?php echo $_SESSION['username']?></td>
            </tr>
            <tr>
                <th>id user</th>
                <td><input type="hidden" name="iduser" value="<?php echo $_SESSION['iduser']?>"><?php echo $_SESSION['iduser']?></td>
            </tr>
           
            <tr>
                <th>No. HP</th>
                <td><input type="text" name="no_hp"></td>
            </tr>
            <tr>
                <th>id_film</th>
                <td>
                <select id="pilihan" name="id_film">
                <?php while ($user_data = mysqli_fetch_array($nilai)) : ?>
                    <option value="<?php echo $user_data['id_film']; ?>"><?php echo $user_data['id_film']." judul -". $user_data['judul_film']  ; ?></option>
                <?php  endwhile; ?>
                </select>
                </td>

            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="Submit2">Tambah</button></td>
            </tr>
        </table>
    </form>

    <a href="../lihat_daftar.php">Lihat Daftar Order</a>
    <a href="tambahbooking.php">Lihat Daftar booking</a>
</body>
</html>
    
 
    

    <a href="lihat_daftar.php"></a>
    
</body>
</html>