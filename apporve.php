<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "UPDATE login SET status='approved' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: admin_view.php"); 
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
