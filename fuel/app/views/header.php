<!DOCTYPE html>
<html>
<head>
	<title>My test website</title>
</head>
<body>
	<h3>my header</h3>
	
	<?php
		if (\Session::get_flash('success') || \Session::get_flash('error'))
		{
			if (\Session::get_flash('success')) {
				echo '<div style="color:green;">'.\Session::get_flash('success').'</div>';
			}

			if (\Session::get_flash('error')) {
				echo '<div style="color:red;">'.\Session::get_flash('error').'</div>';
			}
		}
	?>

