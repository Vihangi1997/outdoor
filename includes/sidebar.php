<div class="row">
	<div class='box box-solid'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'><b>Visit Us</b></h3>
	  	</div>
	  	<center><div class='box-body'>
	    	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d393.8586984400442!2d80.101268!3d6.131176!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe76a1579ee0d490!2sOutdoor%20Textiles!5e1!3m2!1sen!2slk!4v1619686244519!5m2!1sen!2slk" width="250" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	  	</div>
	  </center>
	</div>
</div>
<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Most Viewed Today</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul id="trending">
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
	  				echo "<li><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></li>";
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
	</div>
</div>
<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Become a Subscriber</b></h3>
	  	</div>
	  	<div class="box-body">
	    	<p>Get free updates on the latest products and discounts, straight to your inbox.</p>
	    	<form method="POST" action="">
		    	  
		    	   <input type="text" name="email" class="form-control" placeholder="Type Your Email Here" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" required><br>
    
	               <style> input[type=submit] {border: none;background-color: #21a5ef;color: white;}</style>

	               <center><input type="submit" name="s" value="subscribe"><center>
	 
		    </form>
		    <?php

		    if (isset($_POST['s'])) {
		    	$pdo = new pdo("mysql:host=localhost;dbname=ecomm","root","");
		    	$email = $_POST['email'];
		    	$sql = "insert into subscribers(email)values(:e)";
		    	$r =$pdo->prepare($sql);
		    	$r->execute(array(":e"=>$email));
		    	echo "Thank you for Subscribed";
		    }
		    ?>

	  	</div>
	</div>
</div>

<div class="row">
	<div class='box box-solid'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'><b>Follow us on Social Media</b></h3>
	  	</div>
	  	<center><div class='box-body'>
	    	<a href="https://www.facebook.com/Outdoor-104735865059179/" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook" ></i></a>
	    	<a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
	    	
	  	</div>
	  </center>
	</div>
</div>

<div class="row">
	<div class='box box-solid'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'><b>Contact Us</b></h3>
	  	</div>
	  	<center><div class='box-body'>
	  		<a class="fa fa-phone">0912275231</a>
	  	</div>
	  </center>
	</div>
</div>

