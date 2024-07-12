<?php
session_start();
include "koneksi.php";
///
$url = "http://localhost/bioskop/ambildata/ambildatauser.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);

// $id_user = $_POST['id_user'];
// $pass=$_POST['passwd'];
$id_user = mysqli_real_escape_string($con, $_POST['id_user']);
$pass = mysqli_real_escape_string($con, $_POST['passwd']);
$konter=0;

// foreach($result as $r){
//     echo "nama" . $r->username;
//     echo "pw" . $r->password;
//     echo"<br>";
// }
// echo "<br>" . $id_user;
// echo $pass;

//xxxxsssssssssxxzsxxzssssssxszxszsssss
// $sql="SELECT * FROM user WHERE username='$id_user' AND password='$pass'";
if ($result === null && json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error decoding JSON: ' . json_last_error_msg();
}else{
    foreach ($result as $r) {
        if($r->username==$id_user&&$r->password==$pass){
            $konter++;
            $_SESSION['level']=$r->level;
            $_SESSION['passuser']=$r->password;
            $_SESSION['username']=$r->username;
            $_SESSION['alamat']=$r->alamat;
            $_SESSION['iduser']=$r->id_user;
            // $_SESSION['kosong']=0;
            // Set the header
            header("Location: tampilan_utama.php");
        }
        // $r->id_user;//xxxxxxxxx
        // $r->username;
        // $r->password;ssssSSS
        // $r->alamat;ssssssssss
        // $r->level;
    }
}
//cxzzsxszszxzsxsxxxxx


if($konter==0){
    $_SESSION['kosong']=2;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_user = $_POST['id_user'];
            $passwd = $_POST['passwd'];
        
            if (empty($id_user) || empty($passwd)) {
                $_SESSION['kosong']=1;  
            }   
        }
        header("Location: index.php");

}
    // $login=mysqli_query($con,$sql);sxszzxzssss

    // $ketemu=mysqli_num_rows($login);
    // $r=mysqli_fetch_array($login);
    // if($ketemu>0){
    //     $_SESSION['level']=$r['level'];
    //     $_SESSION['passuser']=$r['password'];
    //     $_SESSION['username']=$r['username'];
    //     // $_SESSION['kosong']=0;
    //     // Set the header
    //     header("Location: tampilan_utama.php");

    // // // Display the login information
    // // echo "User berhasil login <br>";
    // // echo "Level = " . $_SESSION['level'] . "<br>";
    // // echo "Password = " . $_SESSION['passuser'] . "<br>";

    // }
    // else{
    //     $_SESSION['kosong']=2;
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $id_user = $_POST['id_user'];
    //         $passwd = $_POST['passwd'];
        
    //         if (empty($id_user) || empty($passwd)) {
    //             $_SESSION['kosong']=1;
                
    //         } 
           
            
    //     }
    //     header("Location: index.php");
       
    // }
    mysqli_close($con);
?>