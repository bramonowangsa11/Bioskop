<?php
// Program PHP untuk Menggunakan Endpoint

// Fungsi untuk membuat pengguna baru
function createUser($nama, $iduser,$no_hp,$id_film) {
   
    // Data pengguna baru
    $newUser = array(
        'nama' => $nama,
        'iduser' => $iduser,
        'no_hp' => $no_hp,
        'id_film' => $id_film
    );

    // Convert data ke format JSON
    $jsonData = json_encode($newUser);
    // echo json_encode($newUser);

    // URL endpoint untuk membuat pengguna baru
    $url = "http://localhost/bioskop/ambildata/masukanbooking.php"; // Ganti dengan URL endpoint yang sesuai

    // Inisialisasi cURL
    $client = curl_init($url);

    // Set opsi cURL
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($client, CURLOPT_POST, 1);
    curl_setopt($client, CURLOPT_POSTFIELDS, $jsonData); // Pengiriman data JSON di sini
    curl_setopt($client, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // Eksekusi cURL dan dapatkan respons
    $response = curl_exec($client);

    // Tangani respons sesuai kebutuhan Anda
    if ($response === false) {
        echo 'Error: ' . curl_error($client);
    } else {
        // Decode respons JSON
        $decodedResponse = json_decode($response);

        // Tanggapi status dari API
        if ($decodedResponse && isset($decodedResponse->status) && $decodedResponse->status === 'success') {
            
        } else {
            echo 'Failed to create user. Message: ' . $decodedResponse->message;
        }
    }

    // Tutup koneksi cURL
    
    curl_close($client);
    header("Location: tambahbooking.php");

}

// Proses formulir jika data pengguna dikirim
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $nama = $_POST["nama"];
//     $iduser = $_POST["iduser"];
//     $no_hp = $_POST["no_hp"];
//     $id_film = $_POST["id_film"];
    

    
//     
//     createUser($nama, $iduser,$no_hp,$id_film);
    
// }


