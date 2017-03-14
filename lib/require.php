<?php require_once('../lib/header.php'); ?>

		<?php require_once('../lib/jsassets.php'); ?>

			<?php require_once('../lib/copyright.php'); ?>
		<?php require_once('../lib/footer.php'); ?>

require_once('../lib/connect_db.php');

           echo '<script>window.location.reload();</script>';

session_write_close($_SESSION['id']);
