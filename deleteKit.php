<?php
session_start();
if (isset($_SESSION['mailu'])) {

	require "db.php";
	$imei = $_GET['imei'];

	$stmt = mysqli_prepare($bdd, 'DELETE FROM kit where  imei = ? LIMIT 1');
	mysqli_stmt_bind_param($stmt, "s", $imei);
	mysqli_stmt_execute($stmt);
	echo "<script language='javascript' type='text/javascript'>";
	echo 'window.location.href = "listeKits.php"';
	echo "</script>";
}
