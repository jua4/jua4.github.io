<?php
session_start();
include_once 'header.php';

		$nameError = "";
		$emailError = "";
		$subjectError = "";
		$bodyError = "";
		$name = "";
		$email = "";
		$subject = "";
		$body = "";
		$phoneNumber = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
   		if (empty($_POST["name"])) {
			$nameError = "Name required";
		} else { $name = $_POST["name"];
			if (!preg_match("/^[a-zA-Z -.]*$/",$name)) {
				$nameError = "Enter real name!";
			}
		}
   
		if (empty($_POST["email"])) {
			$emailError = "Email required";
		} else {
			$email = $_POST["email"];
		}
     
   		if (empty($_POST["subject"])) {
     			$subjectError = "No email subject";
		} else {
			$subject = $_POST["subject"];
		}

   		if (empty($_POST["body"])) {
     			$bodyError = "Empty email body";
   		} else {
     			$body = $_POST["body"];
   		}
		
		if (empty($_POST["phoneNumber"])) {
			$phoneNumber = "";
		} else { 
			$phoneNumber = $_POST["phoneNumber"];
		}
}

		?>

		<h2>Contact Us:</h2>
		<p><span class="error">* required field.</span></p>
		<form name= "emailForm" method="post" action="send_email.php"> 
   			Name: <input type="text" name="name">
   			<span class="error">* <?php echo $nameError;?></span>
   			<br><br>
   			E-mail: <input type="text" name="email">
   			<span class="error">* <?php echo $emailError;?></span>
   			<br><br>
   			Subject: <input type="text" name="subject">
   			<span class="error">* <?php echo $subjectError;?></span>
   			<br><br>
   			Body: <textarea name="body" rows="9" cols="50"></textarea>
   			<span class="error">* <?php echo $subjectError;?></span>
			<br><br>
   			Phone Number: (optional)
   			<input type="text" name="phoneNumber">
   			<br><br>
   			<input type="submit" name="submit" value="Submit"> 
		</form>
	</div>
	</body>
</html>