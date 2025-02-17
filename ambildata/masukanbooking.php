<?php
// Ambil data dari permintaan POST
// include("../koneksi.php");
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

// Lakukan validasi data
if (!isset($input['no_hp']) || !isset($input['id_film'])) {
    $response = array('status' => 'error', 'message' => 'no hp and id film are required.');
} else {
    // Inisialisasi koneksi ke database (sesuaikan dengan koneksi database Anda)
    $con = new mysqli('localhost', 'root', '', 'loundry');

    // Periksa koneksi
    if ($con->connect_error) {
        die('Conection failed: ' . $con->connect_error);
    }

    // Siapkan data pengguna
    $nama = $con->real_escape_string($input['nama']);
    $ids = $con->real_escape_string($input['iduser']);
    $no_hp = $con->real_escape_string($input['no_hp']);
    $id_film = $con->real_escape_string($input['id_film']);


    // Simpan data pengguna ke databasess
    $query = "INSERT INTO booking (nama, id_user, no_hp, id_film) VALUES ('$nama', '$ids','$no_hp','$id_film')";
    if ($con->query($query) === TRUE) {
        $response = array('status' => 'success', 'message' => 'User created successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to create user: ' . $con->error);
    }

    // Tutup koneksi database
    $con->close();
}

// Set header untuk memberitahu bahwa respons adalah JSON
header('Content-Type: application/json');

// Encode respons ke format JSON dan kirim
echo json_encode($response);
?>
