<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/assets/images/logo.png" alt="Veranstaltungstechnik Manager" height="40" class="d-inline-block align-text-top" style="margin-left: 10px">
    </a>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user"></i>
            <?= ' '.$_SESSION["user_displayname"] ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/user">Benutzereinstellungen</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="user/logout">Abmelden</a></li>
          </ul>
        </li>

      </ul>
  </div>
</nav>
