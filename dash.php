
<?php
session_start();
include("header.php");
include("conn.php");


if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
// fetchig the data 
$email = $_SESSION['email'];


$query = "SELECT * FROM login WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("User not found.");
}
?>
<?php
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

// from updation 
if (isset($_POST['update'])) {

    $name   = $_POST['name'];
    $mobile = $_POST['mobile'];
    $new_email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob    = $_POST['dob'];
    $age    = $_POST['age'];
    $pwd    = $_POST['pwd']; 

  
    $query = "UPDATE login SET 
            name='$name',
            mobile='$mobile',
            email='$new_email',
            gender='$gender',
            dob='$dob',
            age='$age',
            pwd='$pwd'
            WHERE email='$email'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['email'] = $new_email; 
        echo "<script>alert('Profile updated successfully!'); window.location='dash.php';</script>";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

?>



<!-- for delete  -->
<?php
if (isset($_POST['delete'])) {
    $query = "DELETE FROM login WHERE email='$email'";
    if (mysqli_query($conn, $query)) {
        session_destroy();
        echo "<script>alert('Profile deleted!'); window.location='login.php';</script>";
    } else {
        echo "Error deleting profile: " . mysqli_error($conn);
    }
}

?>
<!-- card -->
<main class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="card col-lg-8 my-5 shadow">
        <div class="card-header text-center">
            <h3>YOUR INFORMATION</h3>
        </div>
        <!-- card  -->
        <div class="card-body">
            <form action="dash.php" method="post">

                <!-- name  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name <span>*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name"
                        value="<?php echo $row['name'] ?? ''; ?>" />
                </div>

                <!-- mobile -->
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile No.<span>*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        name="mobile"
                        id="mobile"
                        value="<?php echo $row['mobile'] ?? ''; ?>" />
                </div>

                <!-- email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span>*</span></label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        value="<?php echo $row['email'] ?? ''; ?>" />
                </div>

                <!-- gender -->
                <div class="mb-3">
                    <label for="gender" class="form-label me-3">Gender : <span>*</span></label>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            value="male"
                            <?php if (!empty($row['gender']) && $row['gender'] == 'male') echo 'checked'; ?> />
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            value="female"
                            <?php if (!empty($row['gender']) && $row['gender'] == 'female') echo 'checked'; ?> />
                        <label class="form-check-label">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            value="other"
                            <?php if (!empty($row['gender']) && $row['gender'] == 'other') echo 'checked'; ?> />
                        <label class="form-check-label">Other</label>
                    </div>
                </div>

                <!-- dob & age -->
                <div class="mb-3 row">
                    <label for="dob" class="form-label col-md-2">DOB :<span>*</span></label>
                    <div class="col-md-4">
                        <input
                            type="date"
                            class="form-control"
                            name="dob"
                            id="dob"
                            value="<?php echo $row['dob'] ?? ''; ?>" />
                    </div>
                    <label for="age" class="form-label mt-1 col-md-3">Your age :</label>
                    <div class="col-md-3">
                        <input
                            type="text"
                            class="form-control"
                            name="age"
                            id="age"
                            readonly
                            value="<?php echo $row['age'] ?? ''; ?>" />
                    </div>
                </div>

                <!-- password -->
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password <span>*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        name="pwd"
                        id="pwd"
                        value="<?php echo $row['pwd'] ?? ''; ?>" />
                </div>

                <!-- submit -->
                <div>
                    <input type="submit" name="update" class="form-control bg-secondary mt-2 text-center text-white" value="UPDATE">
                </div>
                <div>
                                    <a href="delete.php" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-sm">DELETE</a>
                </div>
            </form>
        </div>
    </div>
</main>
<script>
      // for calculating auto age
    document.getElementById("dob").addEventListener("change", function() {
        let dob = new Date(this.value);
        if (!isNaN(dob.getTime())) {
            let today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            let m = today.getMonth() - dob.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            document.getElementById("age").value = age;
        }
    });
</script>

<?php include 'footer.php'; ?>