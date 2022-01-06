<section id="user-password-settings" class="container mb-4">
	<form class="form-floating update-password" method="POST" target="/includes/change-passowrd.php" novalidate >
		<div class="card">
			<div class="card-header">
				Passwort ändern
			</div>
			<div class="card-body row g-3">
        <div class="col-12">
          <label for="oldPassword" class="form-label">Aktuelles Passwort</label>
          <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
          <div class="invalid-feedback">
            Bitte gebe dein akutelles Passwort ein!
          </div>
        </div>
        <div class="col-12">
          <label for="newPassword" class="form-label">Neues Passwort</label>
          <input type="password" class="form-control" id="newpassword" name="newPassword" required>
          <div name="newPassword_label" id="newPassword_label" class="invalid-feedback">
            Bitte gebe dein neues Passwort ein!
          </div>
        </div>
        <div class="col-12">
          <label for="user_newPassword_repeated" class="form-label">Neues Passwort wiederholen</label>
          <input type="password" class="form-control" id="newPassword_repeated" name="newPassword_repeated" required>
          <div name="newPassword_repeated_label" id="newPassword_repeated_label" class="invalid-feedback">
            Bitte wiederhole dein neues Passwort!
          </div>
        </div>
			</div>
			<div class="card-footer">
				<button class="btn btn-success" type="submit">Speichern</button>
			</div>
		</div>
	</form>
	<script>

  var form = document.querySelector('.update-password');
  var oldPassword = form.elements.namedItem('oldPassword');
  var password = form.elements.namedItem('newPassword');
  var passwordLabel = document.querySelector('#newPassword_label');
  var repeatedPassword = form.elements.namedItem('newPassword_repeated');
  var repeatedPasswordLabel = document.querySelector('#newPassword_repeated_label');
  var password_regex = new RegExp(<?= json_encode(getVariable("password_regex")) ?>);
  var submitted = false;

  function checkInputs() {

    var validity = true;

    if (oldPassword.value == '') {
      oldPassword.classList.add('is-invalid');
      oldPassword.classList.remove('is-valid');
      validity = false;
    } else {
      oldPassword.classList.add('is-valid');
      oldPassword.classList.remove('is-invalid');
    }

    if (password.value == '') {
      password.classList.add('is-invalid');
      password.classList.remove('is-valid');
      validity = false;
    } else if (oldPassword.value == password.value) {
      password.classList.add('is-invalid');
      password.classList.remove('is-valid');
      passwordLabel.innerHTML = 'Das neue Passwort muss sich vom akutellen unterscheiden!';
      validity = false;
    } else if (!password_regex.test(password.value)) {
      password.classList.add('is-invalid');
      password.classList.remove('is-valid');
      passwordLabel.innerHTML = 'Passwort stimmt nicht mit den Richtlinien überein!';
      validity = false;
    } else {
      password.classList.add('is-valid');
      password.classList.remove('is-invalid');
    }

    if(repeatedPassword.value == ''){
      repeatedPassword.classList.add('is-invalid');
      repeatedPassword.classList.remove('is-valid');
      repeatedPasswordLabel.innerHTML = 'Bitte wiederhole dein neues Passwort!';
      validity = false;
    } else if (password.value != repeatedPassword.value){
        repeatedPassword.classList.add('is-invalid');
        repeatedPassword.classList.remove('is-valid');
        repeatedPasswordLabel.innerHTML = 'Passwörter stimmen nicht überein!';
        validity = false;
    } else {
      repeatedPassword.classList.add('is-valid');
      repeatedPassword.classList.remove('is-invalid');
    }

    return validity;
  }

  form.addEventListener('submit', function(e) {
    submitted = true;
    event.preventDefault();
    event.stopPropagation();

    if(checkInputs()) {

      var formData = new FormData(form);

      $.ajax({
        type: 'POST',
        url: '/ajax/update-password',
        data: "oldPassword=" + oldPassword.value + "&newPassword=" + password.value + "&newPassword_repeated=" + repeatedPassword.value,
        success: function(data){

          data = JSON.parse(data);

          var color = 'red';

          if(data['success']) {
            color = 'green';
						form.reset();	
          }

          displayNotification(data['message'], color);
        }
      });

      oldPassword.classList.remove('is-valid');
      password.classList.remove('is-valid');
      repeatedPassword.classList.remove('is-valid');
      submitted = false;
      }
  }, false);

  repeatedPassword.addEventListener('keyup', function () {
    if(submitted){
      checkInputs();
    }
  }, false );

  password.addEventListener('keyup', function () {
    if(submitted){
      checkInputs();
    }
  }, false );

  oldPassword.addEventListener('keyup', function () {
    if(submitted){
      checkInputs();
    }
  }, false );
</script>
</section>
