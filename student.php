<?php include 'header.php';?>
<div class="container d-flex justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5 shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center">Student Login</h3>
                </div>
                <div class="card-body p-4">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Don't have an account? <a href="signup.php">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>