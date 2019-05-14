<link rel="stylesheet" type="text/css" href="css/gestion/connexion.css">

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign in</h5>
            <?php
            if (isset($_SESSION["error"]) && $_SESSION["error"] == "connexion") {
              echo '<p class="card-title text-center" style="color: rgb(255, 0, 0);">Wrong email or password !</p>';
              unset($_SESSION["error"]);
            }
             ?>
            <form class="form-signin" action="verify/gestion/connexion.php" method="post">

              <div class="form-label-group">
                <label for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
              </div>

              <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              <a href="index.php?page=gestion/inscription.php" class="">Sign up if you arn't signed in</a>
            </form>
          </div>
        </div>
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Reglement</h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
              exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
              dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
              officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
