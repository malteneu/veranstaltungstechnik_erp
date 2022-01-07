<?php

$user_name_setting = getVariable('user_name_settings');
$user_email_setting = getVariable('user_email_settings');

 ?>


<section id="user-settings" class="container mb-4">
	<form class="needs-validation form-floating" novalidate method="POST">
		<div class="card">
			<div class="card-header">
				Benutzergrundeinstellungen
			</div>
			<div class="card-body row g-3">
        <div class="col-6">
          <label for="user_firstname" class="form-label">Vorname</label>
          <input type="text" value="<?= $_SESSION["user_firstname"]?>" <?= $user_name_setting?> class="form-control" id="user_firstname" name="user_firstname">
        </div>
        <div class="col-6">
          <label for="user_lastname" class="form-label">Nachname</label>
          <input type="text" value="<?= $_SESSION["user_lastname"]?>" <?= $user_name_setting?> class="form-control" id="user_lastname" name="user_lastname">
        </div>
        <div class="col-6">
          <label for="user_name" class="form-label">Benutzername</label>
          <input type="text" value="<?= $_SESSION["user_name"]?>" <?= $user_name_setting?> class="form-control" id="user_name" name="user_name" required>
          <div class="invalid-feedback">
            Bitte gebe einen Benutzernamen ein!
          </div>
        </div>
        <div class="col-6">
          <label for="inputState" class="form-label">Anzeigename</label>
          <select id="user_displayname" name="user_displayname" <?= $user_name_setting?> class="form-select">
            <option <?php if($_SESSION["user_displayname"] === $_SESSION["user_firstname"].' '.$_SESSION["user_lastname"]) {echo "selected";} ?>><?= $_SESSION["user_firstname"].' '.$_SESSION["user_lastname"]?></option>
            <option <?php if($_SESSION["user_displayname"] === $_SESSION["user_firstname"]) {echo "selected";} ?>><?= $_SESSION["user_firstname"]?></option>
            <option <?php if($_SESSION["user_displayname"] === $_SESSION["user_name"]) {echo "selected";} ?>><?= $_SESSION["user_name"]?></option>
          </select>
        </div>
        <div class="col-12">
          <label for="user_email" class="form-label">Email Addresse</label>
          <input type="email" value="<?= $_SESSION["user_email"]?>" <?= $user_email_setting?> class="form-control" id="user_email" name="user_email">
          <div class="invalid-feedback">
            Bitte gebe deine Email ein!
          </div>
        </div>
			</div>
			<div class="card-footer">
				<button class="btn btn-success" type="submit">Speichern</button>
			</div>
		</div>
	</form>
</section>
