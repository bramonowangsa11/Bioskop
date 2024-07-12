<?php
$host="localhost";
$ur="root";
$pw="";
$database="bioskopbaru";
$con=@mysqli_connect($host,$ur,$pw,$database);
if(!$con){
    echo "eror :".mysqli_connect_error();
    exit();
}
?>