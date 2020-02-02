<?php

	session_start();

	$user='root';
	$pass='';
	$db='bookshare';

	$link=mysqli_connect('localhost',$user,$pass,$db);
	$error=null;
	if(mysqli_connect_error()){
		$error="There was an error connecting to DB!";
	}else{
		if(array_key_exists("email", $_POST) AND array_key_exists("password", $_POST)){
			//page is submitted
			if($_POST["email"]=="" OR $_POST["password"]==""){
				$error="Please enter everything!";
			}else{
				//USER HAS ENTERED EVERYTHING
				$query="SELECT * FROM users WHERE email='".$_POST['email']."'"." AND password='".$_POST['password']."'";
				$result=mysqli_query($link,$query);//IF SUCH USER EXISTS HE WILL BE STORED IN $RESULT

				if(mysqli_num_rows($result)>0){//USER EXISTS WITH GIVE EMAIL AND PASSWORD
					//STORING SESSION VARIABLESS AND REDIRECTING TO productpage.php

					$row=mysqli_fetch_array($result);
					$_SESSION['name']=$row['name'];
					$_SESSION['id']=$row['id'];
					$_SESSION['email']=$row['email'];
					$_SESSION['gender']=$row['gender'];

					header("Location: index.php");
					exit;

				}else{
					$error="Please enter correct Email and Password!";//USER DOES NOT EXITS
				}
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login | BookShare</title>
	<!-- <link rel="stylesheet" type="text/css" href="login.css"> -->

	<style type="text/css">
	    <?php 
	      include 'login.css';
	    ?>
  	</style>
  	
</head>
<body>

<div class="login-box">
	<!-- FOR DISPLAYING ERRORS -->
	<?php
		if($error!=null){
			echo "<div id=\"error\"><p>".$error."</p></div>";
		}
	?>

<form method="post">
	<h1>Login</h1>

	<div class="textbox">
		<label>
			Email<br>
			<input type="Email" placeholder="abc@bookshare.com" name="email" autocomplete="off">  
		</label>
	</div>
	
    <div class="textbox">
    	<label>
    		Password<br>
    		<input type="password" placeholder="********" name="password" value="">  
    	</label>
		
	</div>

	<input class="btn" type="submit" name="" value="Sign-in">
</form>

<a id="anchorSignup" href="register.php">
	<button class="btn" id="registerBtn" name="">Sign-up</button>
</a>

</div>


<script type="text/javascript" src="bootstrap/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="bootstrap/popper.min.js"></script>
<script type="text/javascript" src="bootstrap/bootstrap.js"></script>
</body>
</html>