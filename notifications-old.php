
  <div class="toast-container position-fixed bottom-0 end-0 p-3 d-flex" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body d-flex">
        <div id="message">No Message!</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>


<script>

var toastLive = document.getElementById('liveToast');
var toastMessage = document.getElementById('message');

function displayNotification(message, color, time, hide){

  if(time == null){
    time = 2000;
  }

  if(hide == null){
    hide = true;
  }

  var option =
  {
    delay: time,
    autohide: hide
  };

  var toast = new bootstrap.Toast(toastLive, option);

  toastMessage.innerHTML = message;
  toastLive.className = "toast";
  var color_text = 'text-white';

  switch(color) {
    case 'grey':
    case 'secondary':
      color = 'bg-secondary';
      color_text = 'text-white';
      break;
    case 'green':
    case 'success':
      color = 'bg-success';
      color_text = 'text-white';
      break;
    case 'red':
    case 'danger':
      color = 'bg-danger';
      color_text = 'text-white';
      break;
    case 'warning':
    case 'yellow':
      color = 'bg-warning';
      color_text = 'text-white';
      break;
    case 'white':
    case 'light':
      color = 'bg-light';
      color_text = 'text-dark';
      break;
    default:
      color = 'bg-primary';
      color_text = 'text-white';
      break;
  };

  toastLive.classList.add(color);
  toastLive.classList.add(color_text);

  toast.show();
}
</script>
