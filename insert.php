<?php
include("conn.php");

if (isset($_POST['add'])) {
    $name   = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email  = $_POST['email'];
    $gender = $_POST['gender'];
    $dob    = $_POST['dob'];
    $age    = $_POST['age'];
    $pwd    = $_POST['pwd'];
    $cpwd   = $_POST['cpwd'];
    $role   = $_POST['role'];

  
    if ($pwd !== $cpwd) {
        echo "<script>alert('Passwords do not match!'); window.location='registration.php';</script>";
        exit;
    }

  
    $query = "SELECT * FROM login WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('This email is already registered!'); window.location='registration.php';</script>";
        exit;
    }
  
   $query = "INSERT INTO login (name, email, mobile, gender, dob, age, pwd,cpwd, role, status)
           VALUES ('$name', '$email', '$mobile', '$gender', '$dob', '$age', '$pwd','$cpwd', '$role', 'pending')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Registration successful!'); window.location='registration.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
