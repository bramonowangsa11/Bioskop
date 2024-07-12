<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="index.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div id="div-induk">
        <!-- navigasi -->
            <div class="navigation-container">
                <nav>
                    <ul>
                        <li class="li-kiri">
                            <a href="#" id="tulisan" onclick="toggleSidebar()">Menu</a>
                        </li>
                        <!-- Search bar -->
                        <input type="text" class="search-input" placeholder="cari film">
                        <li class="li-kanan" id="tulisan">
                            <a href="#" onclick="toggleProfileSidebar()">Profile</a>
                            <!-- Profile Sidebar -->
                            <div class="profile-sidebar">
                                <!-- Add your profile sidebar content here -->
                                <ul>
                                    <li><a href="edit_profile.php">Edit Profile</a></li>
                                    <li><a href="change_password.php">Change Password</a></li>
                                    <li><a href="logout.php">logout</a></li>
                                    <!-- Add more profile-related links as needed -->
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Add your sidebar content here -->
                    <ul>
                        <li><a href="booking/tambah.php">booking film</a></li>
                        <li><a href="lihat_daftar.php">lihat tiket</a></li>
                        
                    </ul>
                </div>

                <!-- Profile Sidebar -->
                
            </div>


        <!-- Content -->
        <div class="container">
            <!-- Your existing content goes here -->
            <div class="poster">
                <a href="detailfilm.php?id_film=2"><img src="assets/poster1.jpg" alt="Button Image"></a>
            </div>
            <div class="poster">
                <a href=""><img src="assets/poster2.jpg" alt="Button Image"></a>
            </div>
            <div class="poster">
                <a href=""><img src="assets/poster3.jpg" alt="Button Image"></a>
            </div>
            <div class="poster">
                <a href=""><img src="assets/poster5.jpg" alt="Button Image"></a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    function toggleSidebar() {
        $(".sidebar").toggleClass("show-sidebar");
    }

    function toggleProfileSidebar() {
        $(".profile-sidebar").toggleClass("show-sidebar");
    }
    </script>
</body>
</html>
