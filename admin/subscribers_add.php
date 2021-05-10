<?php
	include 'includes/session1.php';

	if(isset($_POST['add'])){
		$email = $_POST['email'];
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM subscribers WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email already taken';
		}
		else{
			
			try{
				$stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (:email)");
				$stmt->execute(['email'=>$email]);
				$_SESSION['success'] = 'Subscriber added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up user form first';
	}

	header('location: subscribers.php');

?>