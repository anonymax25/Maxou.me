


<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <!-- <a class="navbar-brand" href="#">Maxou.me</a> -->
  <img src="images/logo/logositemaxouzoom.png" style="height: 70px;" class="border-right pr-3 mr-3">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=home/home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=coding/home.php">Code stuff</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tools <div class="fas fa-tools"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?page=tools/clock.php">Clock</a>
          <a class="dropdown-item" href="index.php?page=tools/beat/beat.php">Beats</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?page=tools/funny/funny.php">Rick-Roll link</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=general/about.php">About</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION["user"])){
        $user = unserialize($_SESSION["user"]);
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="fas fa-cog"></div>
          </a>
          <div class="dropdown-menu" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="index.php?page=user/account.php">Account</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="verify/gestion/deconnexion.php">Disconnect</a>
          </div>
        </li>
        <li class="nav-item col ml-auto">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Connected: <?php echo $user->getUsername() ?></a>
        </li>
      <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=gestion/connexion.php">Sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=gestion/inscription.php">Sign up</a>
        </li>
      <?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="row m-0">
  <div class="m-0" style="width:25%;height:5px;background-image: linear-gradient(-90deg, #60d394, #c060d3);"></div>
  <div class="m-0" style="width:25%;height:5px;background-image: linear-gradient(-90deg, #d3d160, #60d394);"></div>
  <div class="m-0" style="width:25%;height:5px;background-image: linear-gradient(-90deg, #60c2d3, #d3d160);"></div>
  <div class="m-0" style="width:25%;height:5px;background-image: linear-gradient(-90deg, #c060d3, #60c2d3);"></div>
</div>
