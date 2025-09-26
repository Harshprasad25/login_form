<?php

include('header.php');
include('conn.php');
?>

<div class="container vh-100 my-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-center text-white">
            <h4 class="mb-0">ADMIN VIEW</h4>
        </div>
        <div class="card-body">

            <?php if (isset($_GET['msg'])): ?>
                <div class="alert alert-info text-center">
                    <?= htmlspecialchars($_GET['msg']); ?>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Mobile No</th>
                            <th>Email Id</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Password </th>
                            <th>Role</th>
                            <th>Status</th>
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

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?= ($row['id']); ?></td>
                                    <td><?= ($row['name']); ?></td>
                                    <td><?= ($row['mobile']); ?></td>
                                    <td><?= ($row['email']); ?></td>
                                    <td><?= ($row['gender']); ?></td>
                                    <td><?= ($row['dob']); ?></td>
                                    <td><?= ($row['age']); ?></td>
                                    <td><?= ($row['pwd']); ?></td>
                                    <td><?= ($row['role']); ?></td>
                                    <td>
                                        <?php if ($row['status'] == 'approved'): ?>Approved
                                    <?php elseif ($row['status'] == 'rejected'): ?>Rejected
                                    <?php else: ?>Pending
                                    <?php endif; ?>
                                    </td>
                                    <td><a href="update.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">UPDATE</a></td>
                                    <td><a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">DELETE</a></td>
                                    <td><a href="approve.php?id=<?= $row['id']; ?>" onclick="return confirm('Approve this user?');" class="btn btn-success btn-sm">APPROVE</a></td>
                                    <td><a href="reject.php?id=<?= $row['id']; ?>" onclick="return confirm('Reject this user?');" class="btn btn-warning btn-sm">REJECT</a></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='13' class='text-center'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>