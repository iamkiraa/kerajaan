<?php

			if(isset($_POST['add'])){ // if button Add clicked
			$name = $_POST['name'];
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			

			$check = mysqli_query($connection, "SELECT * FROM contact WHERE contactID ='$contactID'"); // query for selected ic number
			if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database
			$insert = mysqli_query($connection, "INSERT INTO contact(contactID, name, email, subject, message) 
			 VALUES('$contactID','$name', '$email', '$subject', '$message')") or die(mysqli_error()); // query for adding data into database
			 
			 if($insert){ // if query executed successfully
			echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Mesej anda telah di hantar. Terima kasih! <a href="index.php"><- Kembali</a></div>'; // display message data saved successfully.'
			}else{ // if query unsuccessfull
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ops,tidak dapat menghantar mesej, Sila cuba lagi!<a href="index.php"><- Kembali</a></div>'; // display message data unsuccessfull added!'
			}
			}else{ // if ic number exist in database
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Anda adalah menghantar mesej!<a href="index.php"><- Kembali</a></div>'; // display message ic number already exist..!'
			}
			}
		?>