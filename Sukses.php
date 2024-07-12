<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sukses!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST["uname"];
    $password = $_POST["pswd"];
    $level = $_POST["level"];


    include("koneksi.php");
    $query = "INSERT INTO user (username,password,level,alamat) VALUES ('$username', '$password','$level','asd')";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    
    // Jika eksekusi query berhasil
  

    // Sekarang Anda dapat menggunakan variabel $username, $password, dan $level sesuai kebutuhan.
}


?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Sukses</h1>      
    <a href="index.php" class="btn btn-primary">Login</a>
  </div>
</div>

</body>
</html>