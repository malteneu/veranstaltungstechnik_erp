<?php require_once TEMPLATE_DIR.'/header.php'; ?>
<body>
  <section class="vh-100" style="background-color: #000000;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="/assets/images/login_picture.jpg"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <div class="d-flex align-items-center mb-3 pb-1">
                  <span class="h1 fw-bold mb-0"> <?= $site_name ?></span>
                </div>

                <?php
                if(!empty($errors)){
                  echo '<div class="alert alert-danger" role="alert">';
                  foreach($errors as $error){
                      echo $error;
                  }
                  echo '</div>';
                } ?>

                <form action="/?location=<?= urlencode($redirect_url) ?>" method="POST" class="needs-validation form-floating" novalidate>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="user" id="user" value="<?= $user ?>" placeholder="name@example.com" required>
                    <label for="floatingInput">Email Addresse oder Benutzername</label>
                    <div class="invalid-feedback">
                      Bitte gebe deine Email oder dein Bentuzernamen ein!
                    </div>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="floatingPassword">Passwort</label>
                    <div class="invalid-feedback">
                      Bitte gebe dein Passwort ein!
                    </div>
                  </div>

                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" name="remeber-me" id="remeber-me">
                    <label class="form-check-label" for="flexCheckDefault">
                      Automatisch wieder anmelden
                    </label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                </form>

                <a class="small text-muted" href="#!">Passwort vergessen?</a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once TEMPLATE_DIR.'/footer.php'; ?>
