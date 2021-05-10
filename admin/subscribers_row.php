<?php 
	include 'includes/session1.php';

	if(isset($_POST['email'])){
		$email = $_POST['email'];
		
		$pdo = new pdo("mysql:host=localhost;dbname=ecomm","root","");
		$email = $_POST['email'];
		$sql = "select * from subscribers";

		
		$sql->execute(['email'=>$email]);
		$row = $sql->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>



