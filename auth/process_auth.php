<?php
session_start();
include_once('../includes/db_connect.php');

$action = $_GET['action'];

if ($action == 'register') {
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure encryption

    $sql = "INSERT INTO users (full_name, email, password) VALUES ('$name', '$email', '$pass')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php?msg=Registration Successful! Please Login.");
    } else {
        echo "Error: Email might already exist.";
    }
}

if ($action == 'login') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name'];
        header("Location: ../index.php"); // Send to homepage
    } else {
        echo "Invalid Email or Password.";
    }
}
?>