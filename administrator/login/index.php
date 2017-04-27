<?php include "public/header.html";?>

<body class="white">
  <?php include "public/loading.html";?>
  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" method="post" action="callback.php">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="http://bit.ly/2oizFNN" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Penerimaan Calon Mahasiswa Baru</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="username" maxlength="20" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" autofocus="" required="">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" maxlength="20" name="password" required="">
            <label for="password">Password</label>
          </div>
        </div>
        <!--<div class="row margin">
          <div class="input-field col s12">
            <div class="g-recaptcha" data-sitekey="6Lc9pg8UAAAAABY8tuSA3o8jlpEi6GRUKYI7jRk6"></div>
          </div>
        </div>-->
        <!--<div class="row">
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" name="remember" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>-->
        <div class="row">
          <div class="input-field col s12">
            <button class="btn indigo waves-effect waves-light col s12" type="submit" name="masuk">Masuk
              <i class="mdi-content-send right"></i>
            </button>
          </div>
        </div>
        <div class="row">
          <!--<div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
          </div>-->
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php include "public/footer.html";?>

  