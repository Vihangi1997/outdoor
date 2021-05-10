<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: ../landing.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM subscribers WHERE email=:email");
	$stmt->execute(['email'=>$_SESSION['admin']]);
	$admin = $stmt->fetch();

	$pdo->close();

?>