<?php
session_start();
if(isset($_SESSION['kosong'])){
}
else{
    $_SESSION['kosong']=3;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Bioskop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="Assets/F.png" alt="Logo Laundry">
            </div>
            <div class="col-md-8">
                <h1>Login Bioskop</h1>
                <?php
                if($_SESSION['kosong']==1){
                    echo" <div class='alert alert-warning'>
                    <strong>PERINGATAN!</strong> Username atau Password Tidak Boleh Kosong <a href='#' class='alert-link'>read this message</a>.
                  </div>";
                }elseif($_SESSION['kosong']==2){
                    echo" <div class='alert alert-danger'>
                    <strong>BAHAYA!</strong> Anda Salah Masukkan Password atau Username <a href='#' class='alert-link'>read this message</a>.
                  </div>";
                }else{
//ssssssssssssssss
                }
                ?>
                <form action="cek_login.php" method="post">
                    
                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control" id="id_user" name="id_user" aria-describedby="usernameHelp">
                        <small id="usernameHelp" class="form-text text-muted">Masukan Username</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="id_passwd" name="passwd">
                        <small id="passwordHelp" class="form-text text-muted">Masukkan password </small>
                    </div>
                    <div class="form-group">
                    
        
                        <button type="submit"value='login' class="btn btn-primary">Masuk</button>
                        <a href="daftar.php" class="btn btn-primary">Signup</a>
                    
                        <!-- <a href="daftar.php" class="btn btn-link">Daftar</a> -->
                    </div>
                    
                </form>
             
            </div>
        </div>
    </div>
</body>
</html>