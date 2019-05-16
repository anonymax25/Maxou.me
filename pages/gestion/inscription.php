<link rel="stylesheet" type="text/css" href="css/gestion/inscription.css">
<script src="pages/gestion/inscription.js"></script>

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign up</h5>
            <form method="post" class="form-signin" onsubmit="return checkGlobal(this)" action="verify/gestion/inscription.php" >

              <div class="form-label-group">
                <label for="inputEmail">Email address</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              </div>

              <div class="form-label-group">
                <label for="inputUsername">Your little name :p</label>
                <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required>
              </div>

              <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              </div>

              <div class="form-label-group">
                <label for="inputVerifyPassword">Verify password</label>
                <input name="verifyPassword" type="password" id="inputVerifyPassword" class="form-control" placeholder="Re-enter Password" required>
              </div>

              <!-- toggle button to hide/show passwords -->
              <button id="togglePassword" class="btn btn-outline-primary btn-block text-lowercase" type="button" name="button" onclick="showPasswords()">Show password</button>

              <button class="btn btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              <a href="index.php?page=gestion/inscription" class="">Sign up if you arn't signed in</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
