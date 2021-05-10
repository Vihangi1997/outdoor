<?php
	include 'includes/session1.php';

	if(isset($_POST['edit'])){
		
		$email = $_POST['email'];
		

		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM subscribers WHERE id=:id");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();


		try{
			$stmt = $conn->prepare("UPDATE subscribers SET email=:email WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$_SESSION['success'] = 'Subscriber updated successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit subscriber form first';
	}

	header('location: subscribers.php');

?>