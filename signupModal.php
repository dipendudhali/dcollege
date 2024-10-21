<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-4 text-white" id="signupModalLabel">User SignUp</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" class="bd-placeholder-img rounded-circle mx-auto d-block" width="140" height="140" role="img" alt="...">
        <form action="signupConfig.php" method="POST">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstname" class="form-label">First Name</label>
              <input type="text" class="form-control rounded" id="firstname" name="firstname">
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastname" class="form-label">Last Name</label>
              <input type="text" class="form-control rounded" id="lastname" name="lastname">
            </div>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control rounded" id="username" name="username" aria-describedby="userHelp">
            <div id="userHelp" class="form-text">Please make sure a unique username.</div>
          </div>
          <div class="mb-3">
            <label for="regno" class="form-label">Rgistration No.</label>
            <input type="text" class="form-control rounded" id="regno" name="regno" aria-describedby="regHelp">
            <div id="regHelp" class="form-text">Please put registration very carefully.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control rounded" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control rounded" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your Phone Number with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control rounded" id="password" name="password">
          </div>
          <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control rounded" id="cpassword" name="cpassword">
          </div>
          <button type="submit" class="btn btn-primary rounded">Sign Up</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>