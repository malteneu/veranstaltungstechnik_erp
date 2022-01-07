<section id="user-history" class="container mb-4">
		<div class="card">
			<div class="card-header">
				Benutzerhistorie
			</div>
      <table id="history-table" class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Beschreibung</th>
            <th scope="col">Datum</th>
            <th scope="col">IP</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $history = getUserHistory($_SESSION["user_id"]);
          foreach($history as $row): ?>
          <tr>
						<td scope="row"><?= $row["user_history_type"] ?></td>
						<td scope="row"><?= date($time_format, strtotime($row["user_history_timestamp"])) ?></td>
            <td scope="row"><?= $row["user_history_ip"] ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
			<div class="card-footer">
				<button class="btn btn-primary" id="load-more-history">Weitere Einträge laden</button>
			</div>
		</div>
</section>

<script>
var tabel = document.getElementById("history-table");
var button = document.getElementById("load-more-history");

button.addEventListener('click', function () {
	displayNotification("Hello");
}, false );

</script>
