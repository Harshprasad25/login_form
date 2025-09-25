<?php include('header.php'); ?>
<?php include('conn.php'); ?>

<div class="container vh-100 my-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-center text-white">
            <h4 class="mb-0">ADMIN VIEW</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-dark text-white">

                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Mobile no</th>
                            <th>Email Id</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                            <th>APPROVE</th>
                            <th>REJECT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM login";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            die("Query failed: " . mysqli_error($conn));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['mobile']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['gender']; ?></td>
                            <td><?= $row['dob']; ?></td>
                            <td><?= $row['age']; ?></td>
                            <td><?= $row['pwd']; ?></td>
                            <td><?= $row['role']; ?></td>
                            <td>
                                    <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">UPDATE</a>
                            </td>
                            <td>
                                    <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-sm">DELETE</a>
                            </td>
                            <td>
                                    <a href="approve.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">APPROVE</a>
                            </td>
                            <td>
                                    <a href="reject.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">REJECT</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
