<?php

include "koneksi.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $cek_user = $koneksi->query("SELECT * FROM users WHERE username = '$username'");
    $cek_login = mysqli_num_rows($cek_user);

    if ($cek_login > 0) {
        echo "<script>
            alert('Username telah terdaftar');      
            window.location = 'register.php'  
             </script>";
    } else {
        if ($password1 != $password2) {
            echo "<script>
            alert('Password tidak sesuai');      
            window.location = 'register.php'  
             </script>";
        } else {
            $password = password_hash($password1, PASSWORD_DEFAULT);
            mysqli_query($koneksi, "INSERT INTO users (id,nama,username,password) VALUES ('','$name','$username','$password')");
            echo "<script>
            alert('Data berhasil dikirim!');      
            window.location = 'login.php'  
             </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>

<body>
    <form action="" method='POST'>
        <input type="text" class='text' name="name" placeholder="Masukkan name anda" required />
        <br />
        <input type="text" class='text' name="username" placeholder="Masukkan username anda" required />
        <br>
        <input type="password" class='text' name="password1" placeholder="Masukkan password anda" required />
        <br>
        <input type="password" class='text' name="password2" placeholder="Masukkan password anda" required />
        <br>
        <input type="submit" value="Sign Up" name="submit" />
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </form>
</body>

</html>