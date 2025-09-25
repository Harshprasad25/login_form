<?php
session_start();
include("header.php");
include("conn.php");

// Fetch user data if id is set
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM login WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

// Update user data
if (isset($_POST['update'])) {
    $id     = $_POST['id'];
    $name   = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email  = $_POST['email'];
    $gender = $_POST['gender'];
    $dob    = $_POST['dob'];
    $age    = $_POST['age'];
    $pwd    = $_POST['pwd'];

    $query = "UPDATE login SET 
                name='$name',
                mobile='$mobile',
                email='$email',
                gender='$gender',
                dob='$dob',
                age='$age',
                pwd='$pwd'
              WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['id'] = $id;
        echo "<script>alert('Profile updated successfully!'); window.location='admin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- HTML Form -->
<main class="container my-5 vh-100">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3>Update User Profile</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $row['id'] ?? ''; ?>" />

                <div class="mb-3">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" value="<?= $row['name'] ?? ''; ?>" />
                </div>

                <div class="mb-3">
                    <label>Mobile:</label>
                    <input type="text" name="mobile" class="form-control" value="<?= $row['mobile'] ?? ''; ?>" />
                </div>

                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="<?= $row['email'] ?? ''; ?>" />
                </div>

                <div class="mb-3">
                    <label>Gender:</label>
                    <select name="gender" class="form-control">
                        <option value="male" <?= ($row['gender']=='male')?'selected':''; ?>>Male</option>
                        <option value="female" <?= ($row['gender']=='female')?'selected':''; ?>>Female</option>
                        <option value="other" <?= ($row['gender']=='other')?'selected':''; ?>>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>DOB:</label>
                    <input type="date" id="dob" name="dob" class="form-control" value="<?= $row['dob'] ?? ''; ?>" />
                </div>

                <div class="mb-3">
                    <label>Age:</label>
                    <input type="text" id="age" name="age" class="form-control" value="<?= $row['age'] ?? ''; ?>" readonly />
                </div>

                <div class="mb-3">
                    <label>Password:</label>
                    <input type="text" name="pwd" class="form-control" value="<?= $row['pwd'] ?? ''; ?>" />
                </div>

                <input type="submit" name="update" class="btn btn-primary" value="Update Profile">
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


<?php include("footer.php"); ?>
