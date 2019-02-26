<?php
		setcookie('password', '1', time() + 120, null, null, false, true);
		header('location: pompe.php');
?>
