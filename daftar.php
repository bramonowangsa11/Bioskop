<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Daftar</h2>
 
  <form action="Sukses.php" class="needs-validation" novalidate method="post" name="Daftar1">
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
      <script>
      function validateForm() {
        var username = document.getElementById("uname").value;
        var regex = /^[a-zA-Z0-9]+$/;

        if (username.indexOf(' ') >= 0 || !regex.test(username)) {
          document.getElementById("invalid-feedback").style.display = "block";
          return false;
        } else {
          document.getElementById("invalid-feedback").style.display = "none";
          return true;
        }
      }
    </script>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback" id="invalid-feedback">Harap isi kolom ini tanpa spasi dan karakter spesial.</div>
      
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required pattern="^(?=.*[A-Z])(?=.*[0-9])(?!.*\s).{8,}$">
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">
        <ul>
          <li>Password harus terdiri dari setidaknya 8 karakter.</li>
          <li>Password tidak boleh mengandung spasi.</li>
          <li>Password harus mengandung setidaknya satu huruf besar (A-Z).</li>
          <li>Password harus mengandung setidaknya satu angka (0-9).</li>
        </ul>
      </div>
    </div>

    <div class="form-group">
      <label for="level">Level:</label>
      <select class="form-control" id="level" name="level" required>
        <option value="" selected disabled>Pilih level</option>
        <option value="ADMIN">Admin</option>
        <option value="USER">User</option>
      </select>
      <div class="invalid-feedback">Harap pilih level.</div>
    </div>

    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> Setuju untuk membuat akun
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Anda harus menyetujui untuk melanjutkan.</div>
      </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="index.php" class="btn btn-primary">Kembali</a>
  </form>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>
