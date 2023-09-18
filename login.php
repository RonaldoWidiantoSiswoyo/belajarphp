<?php

include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($cek) === 1) {
        $data = mysqli_fetch_assoc($cek);

        if (password_verify($password, $data['password'])) {
            header("location:dashboard.php");
            exit();
        } else {
            echo "<script>
                alert('Username atau Password salah!');
                window.location='login.php';
                </script>";
        }
    } else {
        echo "<script>
            alert('Username atau Password salah!');
            window.location='login.php';
            </script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <h1>LOGIN PAGE BRO</h1>
    <form action="" method="POST">
        <input type="text" name="user" placeholder="Masukkan username">
        <input type="password" name="pass" placeholder="Masukkan password">
        <input type="submit" name="login" placeholder="Masukkan password" value="Login">
    </form>
</body>

</html>