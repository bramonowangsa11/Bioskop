<?php
session_start();
include "koneksi.php";


$hasil=mysqli_query($con,"SELECT * FROM film");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .gradient {
            background: linear-gradient(to right, #f00 0%, #ffff 50%, #00f 100%);
            opacity: 0.5;
            }
        .poster{
            background-color:black;
            background: linear-gradient();
            background-image: url(Assets/poster1.jpg);
            background-position: 50%;
            margin: 0;
            height: 100%;
            width: 100%;
            
            background-repeat: no-repeat;
            position: absolute;
            flex-direction: column;
            
            
        }
        .kontentengah{
            display: flex;
            justify-content: center;
            flex: 100%;
            height: 100%;
            width: 100%;
            background-color: black;
            opacity: 0.7;
            
        }
        .bagiankiri{
            flex: 50%;
            justify-content: left;
            text-align: left;
            padding: 10%;
          
        }
        .bagiankanan{
            flex: 50%;
            justify-content: center;
          
            padding: 10%;
        }
        /* img{
            visibility: hidden;   
        } */
        body{
            font-family: 'Montserrat';font-size: 12px;
            margin: 0px;
            height: 100%;
            color: white;
           
        }
       

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Film</title>
</head>
<body >
<?php
if(isset($_GET['id_film'])):?>
<?php $cocok=$_GET['id_film'];?>
    <?php while($keluar=mysqli_fetch_array($hasil)): ?>
        <?php if($keluar['id_film']==$cocok): ?>
            
            <div style=" padding : 12px; display:flex;justify-content:left;" class="poster" >
                <div style="height: 30%;"></div>
                <div class="kontentengah" >
                    <div class="bagiankiri">
                        
                        <div >
                            <h2><?php echo $keluar['judul_film'] ?> </h2> 
                        </div>
                        <div >
                        <h3><?php echo $keluar['Sinopsis'] ?></h3>
                        </div>
                    </div>
                    <div class="bagiankanan">
                        
                        <div>
                            <h3><?php echo $keluar['jadwal_tayang'] ?></h3>
                        </div>
                        <div>
                            <h3><?php echo $keluar['id_teater'] ?></h3>
                        </div>
                    </div>
                </div>
                <div style="height: 30%;"></div>
            </div>
          
        
        <?php else:
            echo"Mohon maaf film tersebut tidak ada";
        ?>
        <?php endif ?>

<?php endwhile; ?>
<?php else :
    header("Location: tampilan_utama.php");
endif;
?>
</body>
</html>
