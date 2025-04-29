<?php
include 'db.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    }else{
        echo "<script>alert('Invalid Username or Password'); window.location='index.html';</script>";
    }

}

?>