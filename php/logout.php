<?php

	session_start();
	session_unset();
	session_destroy();
	
	echo "<script>alert('Se ha cerrado su sesion.');window.location='../index.html';</script>";

?>