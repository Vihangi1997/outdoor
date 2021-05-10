<?php
	include 'includes/session1.php';

	if(isset($_POST['delete'])){
		$email = $_POST['email'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM subscribers WHERE id=:id");
			$stmt->execute(['email'=>$email]);

			$_SESSION['success'] = 'Subscriber deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select subscriber to delete first';
	}

	header('location: subscribers.php');
	
?>