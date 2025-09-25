<?php
session_start();
include("conn.php");

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd   = mysqli_real_escape_string($conn, $_POST['pwd']);

    // Only allow approved users
    $query = "SELECT * FROM login WHERE email='$email' AND pwd='$pwd' AND status='approved'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['role']  = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: admin.php"); 
        } else {
            header("Location: dash.php");  
        }
        exit;
    } else {
        // Check if the user is waiting for approval
        $query = "SELECT * FROM login WHERE email='$email' AND pwd='$pwd' AND status='pending'";
        $resultresult = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('Your account is waiting for admin approval.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Invalid Email, Password or your account was rejected.'); window.location='login.php';</script>";
        }
    }
}
?>
