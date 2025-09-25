<?php include 'header.php'?>



<!-- card -->
<main class="d-flex align-items-center justify-content-center min-vh-100 ">
    <div class="card col-lg-8 my-5 shadow">
        <div class="card-header text-center">
            <h3>REGISTRATION FORM</h3>
        </div>
        <!-- card  -->
        <div class="card-body ">
            <form action="insert.php" method="post">
                <!-- name  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name <span>*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name"
                        aria-describedby="helpId"
                        placeholder="Enter full name"
                        pattern="^[A-Za-z ]*$"
                        title="please enter a valid name."
                        required />
                </div>
                <!-- monile -->
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile No.<span>*</span> </label>
                    <input
                        type="text"
                        class="form-control"
                        name="mobile"
                        id="mobile"
                        aria-describedby="helpId"
                        placeholder="Enter mobile no"
                        required
                        pattern="^[6789][0-9]{9}$"
                        title="pleae enter 10 number without any spaces starting with 6, 7, 8 ,9 only." />
                </div>
                <!-- email  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span>*</span></label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        aria-describedby="helpId"
                        placeholder="Enter valid email id"
                        pattern="^[^ ]+@[^ ]+\.[a-z]{2,3}"
                        title="please enter valid email " />
                </div>
                <!-- gender  -->
                <div class="mb-3">
                    <label for="gender" class="form-label me-3">Gender : <span>*</span></label>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            value="male"
                            required />
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            value="female"
                            required />
                        <label class="form-check-label" for="gender">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            value="other"
                            required />
                        <label class="form-check-label" for="gender">Other</label>
                    </div>
                </div>
                <!-- dob  -->
                <div class=" mb-3 row">
                    <label for="dob" class="form-label col-md-2">DOB :<span>*</span></label>
                    <div class="col-md-4">
                        <input
                            type="date"
                            class="form-control "
                            name="dob"
                            id="dob"
                            aria-describedby="helpId"
                            required />
                    </div>
                    <label for="age" class="form-label mt-1 col-md-3">Your age :</label>
                    <div class="col-md-3">
                        <input
                            type="text"
                            class="form-control "
                            name="age"
                            id="age"
                            aria-describedby="helpId"
                            placeholder="your age is "
                            readonly />
                    </div>
                </div>
                <!-- pwd  -->
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password <span>*</span></label>
                    <input
                        type="password"
                        class="form-control"
                        name="pwd"
                        id="pwd"
                        aria-describedby="helpId"
                        placeholder="Enter Password"
                        required />
                </div>
                <!-- cpwd  -->
                <div class="mb-3">
                    <label for="pwd" class="form-label">Confirm Password <span>*</span></label>
                    <input
                        type="password"
                        class="form-control"
                        name="cpwd"
                        id="cpwd"
                        aria-describedby="helpId"
                        placeholder="Enter Confirm Password"
                        required />

                </div>
                <!-- Role -->
                <div class="mb-3">
                    <label for="role" class="form-label">Role <span>*</span></label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- submit   -->
                <div>
                    <input type="submit" name="add" class="form-control bg-primary mt-2 text-white" value="Submit">

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

    //confirm password 

    document.querySelector("form").addEventListener("submit", function(e) {
        let pwd = document.getElementById("pwd").value;
        let cpwd = document.getElementById("cpwd").value;
        if (pwd !== cpwd) {
            alert("Passwords do not match!");
            e.preventDefault();
        }
    });


</script>



<?php include 'footer.php'?>