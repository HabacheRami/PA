<?php
	if(isset($_GET['message']) && !empty($_GET['message']) && isset($_GET['type']) && !empty($_GET['type'])){
		echo '<script>alert("'. htmlspecialchars($_GET['message']) . '")</script>';
	}
?>
