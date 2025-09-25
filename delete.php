<?php include('conn.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $query = "DELETE FROM login WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Delete failed: " . mysqli_error($conn));
    } else {
        header("Location: admin.php?delete_msg=Record deleted successfully.");
        exit;
    }
}
?>
