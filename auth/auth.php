<?php
// include '../connection.php';
include '../config/Database.php';
$db = new Database();
$conn = $db->connect();

if (isset($_POST['login'])) {
    session_start();
    $username = $_POST['uName'];
    $pass=$_POST['pass'];
    if (isset($username)) {
        $query = "SELECT * from user WHERE username='$username'";
        // $sql = mysqli_query ($conn,$query);
        $sql = $conn->query($query);        
        if($sql) {
            // $hasil = mysqli_fetch_array ($sql);
            $hasil = mysqli_fetch_assoc($sql);
            $uname = $hasil['username'];
            $hash = $hasil['password'];
            if(password_verify($pass, $hash) ) {
                $_SESSION['name'] = $hasil['name'];
                $_SESSION['username'] = $uname;
                header("Location:../index.php?status=true&msg=".base64_encode('Success'));
            } else {
                header("Location:login.php?status=false&msg=".base64_encode('Password is wrong'));
            }
        } else {
            header("Location:login.php?status=false&msg=".base64_encode('User Not Found'));            
        }
    } else {
        header("Location:login.php?status=false&msg=".base64_encode('User Must be filled'));
    }
} else if (isset($_POST['register'])) {
    $nama = addslashes (strip_tags ($_POST['name']));
    $uname = $_POST['uName'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['repeatPass'];

    if ($pass == $re_pass) {
        $query = "SELECT * from user WHERE username='$uname'";
        // $cekUser = mysqli_query ($conn,$query);
        $cekUser = $conn->query($query);
        // $count = mysqli_num_rows($cekUser);
        // if (mysqli_num_rows($cekUser) < 1) {
        if ($cekUser->num_rows < 1) {
            $hash = password_hash($pass, PASSWORD_ARGON2ID);
            $query = "INSERT INTO user(name, username, password) values('{$nama}','{$uname}','{$hash}')";
            // $sql = mysqli_query ($conn,$query);
            $sql = $conn->query($query);
            if ($sql) {
                header("Location:login.php?status=true&msg=".base64_encode('Success'));
            } else {
                header("Location:register.php?status=false&msg=".base64_encode('Register Unsuccessfully'));
            }    
        } else {
            header("Location:register.php?status=false&'.$count.'&msg=".base64_encode('User exists !'));
        }
    } else {
        header("Location:register.php?status=false&msg=".base64_encode('password must be the same'));
    }
} else if (isset($_POST['logout'])) {
    session_start();

    session_destroy();
    header("Location:login.php?status=true&msg=".base64_encode('Logout Successfully'));

} else {
    header("Location:login.php");
}