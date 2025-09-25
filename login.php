<?php include'header.php'?>


    <!-- card -->
    <main class="d-flex align-items-center justify-content-center min-vh-100 ">
        <div class="card col-md-6 shadow">
            <div class="card-header text-center">
                <h3>LOGIN FORM</h3>
            </div>
            <div class="card-body">
                <form action="form_login.php" method="post">
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
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password <span>*</span></label>
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                </form>
            
        </div>
        <div class="card-footer text-center m-0 p-0">
            <p>Don't have account yet. <a href="registration.php">REGISTER</a></p>
        </div>
        
    </main>
<?php include'footer.php'?>
