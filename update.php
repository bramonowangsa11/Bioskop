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
    <?php 
    include("koneksi.php");
    if (isset($_GET['pp']) && !empty($_GET['pp'])){
        $id=$_GET['pp'];
    }else{
        header("Location: lihat_daftar.php");
        exit(); 
    }
    
   
    // $query="SHOW COLUMNS FROM tempat_duduk LIKE 'kursi'";
    $result=mysqli_query($con,"SHOW COLUMNS FROM tempat_duduk LIKE 'kursi'");
    $nilai=mysqli_query($con,"SELECT kursi FROM tempat_duduk");
    $row=$result->fetch_assoc();
    $enumValues = explode("','", substr($row['Type'], 6, -2));
    $array_hasil = array();
    while ($user_data = mysqli_fetch_assoc($nilai)){
       $array_hasil[]=$user_data['kursi'];
    }
    
    // print_r($array_hasil);
    
    // foreach ($enumValues as $value) {  
    //     if(in_array($value,$array_hasil)){
    //         $value=null;
    //         }
        
    // }
    // print_r($enumValues);
    $hasil = array_diff($enumValues, $array_hasil);
    print_r($hasil);
    
    
    
    
    ?>
    <form action="#" method="post">
        <label for="pilihan">Pilih kursi:</label>
        <select id="pilihan" name="pilihan">
            <?php foreach($hasil as $h) : ?>
            <option value="<?php echo $h; ?>"><?php echo"$h"; ?></option>
            <?php  endforeach; ?>
        </select>
        <button type="submit" >ganti</button>
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $nilai_terpilih=$_POST['pilihan'];
        echo"<br>hasilnya adalah ".$nilai_terpilih;
        mysqli_query($con,"UPDATE `tempat_duduk` SET `kursi`='$nilai_terpilih' WHERE `kursi`='$id'");
        header("Location: lihat_daftar.php");
        
    }
    ?>
    <!-- <h1>Edit Data Order</h1> -->

    <!-- <form action="update.php" method="post" name="form1">
        <table>
            <tr>
                <th></th>
                <td><input type="rad" name="nama"></td>
            </tr>
            <tr>
                <th>alamat</th>
                <td><button type="submit" name="Submit2">Tambah</button></td>
            </tr>
            <tr>
                <th></th>
            </tr>
        </table>
    </form>

    <a href="lihat_daftar.php">Lihat Daftar Order</a> -->
</body>
</html>
    <?php
  
         if(isset($_POST['Submit2'])){
              if ($_POST['nama']=="") {
       
            }else{
                $nama=$_POST['nama'];
                $alamat=$_POST['alamat'];
                
                $no_hp=$_POST['no_hp'];
           

            include("koneksi.php");
           
            // $result=mysqli_query($con,"INSERT INTO mahasiswa(nim,nama,jkel,alamat,tgllhr)VALUES('$nim','$nama','$jkel','$alamat','$tgllhr')");

            }
}
    
   ?>
    <a href="lihat_daftar.php"></a>
    
</body>
</html>