<?php
require_once('includes/init.php');

$errors = array();
$sukses = false;

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $role = 2; // Default role: User

    // Validasi form
    if (empty($username)) {
        $errors[] = 'Username tidak boleh kosong.';
    }

    if (empty($password)) {
        $errors[] = 'Password tidak boleh kosong.';
    }

    if ($password !== $password2) {
        $errors[] = 'Password dan konfirmasi password tidak sama.';
    }

    if (empty($nama)) {
        $errors[] = 'Nama tidak boleh kosong.';
    }

    if (empty($email)) {
        $errors[] = 'Email tidak boleh kosong.';
    }

    // Cek apakah username sudah digunakan
    if (!empty($username)) {
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
        if (mysqli_num_rows($query) > 0) {
            $errors[] = 'Username sudah digunakan.';
        }
    }

    // Jika tidak ada error, simpan ke database
    if (empty($errors)) {
        $hashed_password = sha1($password); // Enkripsi password
        $query = "INSERT INTO user (username, password, nama, email, role) 
                  VALUES ('$username', '$hashed_password', '$nama', '$email', '$role')";

        if (mysqli_query($koneksi, $query)) {
            $sukses = true;
        } else {
            $errors[] = 'Gagal menyimpan data: ' . mysqli_error($koneksi);
        }
    }
}
?>

<?php
$page = "Register";
require_once('template/header_register.php'); // Header HTML
?>

<div class="container mt-4">
    <h1 class="text-center">Register Pengguna Baru</h1>
    
    <!-- Alert Sukses -->
    <?php if ($sukses): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Akun Anda telah terdaftar. Silakan <a href="login.php" class="alert-link">login</a>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Alert Gagal -->
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Pendaftaran Gagal!</strong> Berikut adalah masalah yang terjadi:
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="register.php" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password2" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
        <a href="login.php" class="btn btn-secondary">Kembali ke Login</a>
    </form>
</div>

<?php
require_once('template/footer.php'); // Footer HTML
?>
