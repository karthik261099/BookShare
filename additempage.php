<?php

  session_start();

  if(!isset($_SESSION['name'])){
    header("Location: login.php");
  }

  $user='root';
  $pass='';
  $db='bookshare';

  $link=mysqli_connect('localhost',$user,$pass,$db);
  $error=null;
  $msg=null;


  if(mysqli_connect_error()){
    $error="There was an error connecting to DB!";
  }else{
    //SUCCESSFULLLY CONNECTED TO DB
    // echo "connected";
    if(array_key_exists("title", $_POST) AND array_key_exists("description", $_POST) AND array_key_exists("course", $_POST) AND array_key_exists("branch", $_POST) AND array_key_exists("sem", $_POST) AND array_key_exists("address", $_POST) AND array_key_exists("phone", $_POST)){

      $target="images/".basename($_FILES['image']['name']);//Basename gets the file name any changes made here do it in query too********

      $image=$_FILES['image']['name'];//File name

      $userid=$_SESSION['id'];
      $title=ucwords($_POST['title']);
      $description=ucfirst($_POST['description']);
      $course=$_POST['course'];
      $branch=$_POST['branch'];
      $sem=$_POST['sem'];
      $price=$_POST['price'];
      $address=ucfirst($_POST['address']);
      $phone=$_POST['phone'];

      $query="INSERT INTO books (userid,title,description,course,branch,sem,price,image,address,phone) VALUES('$userid','$title','$description','$course','$branch','$sem','$price','$image','$address','$phone')";

      //ADD PICTUREEE!!!!! userid
      // $query="INSERT INTO books (userid,title,description,course,branch,sem,price,image,address,phone) VALUES('".$_SESSION['id']."','".$_POST['title']."','".$_POST['description']."','".$_POST['course']."','".$_POST['course']."','".$_POST['sem']."','".$_POST['price']."','".$image."','".$_POST['address']."','".$_POST['phone']."')";   
        
        
        if(mysqli_query($link,$query) AND move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $msg="Congratulations! Book added succefully.";
            //header("Location: login.php");
          }else{
            $error="Problem adding book. Try again!";
          }
    }

  }



?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="additempage.css"> -->
  <style type="text/css">
    <?php 
      include 'additempage.css';
    ?>
  </style>
  
</head>
<body>

<nav class="navbar navbar-dark bg-dark"> 
  <a href="index.php"><span class="navbar-brand mb-0 h1">BookShare.com</span></a>
  <form class="form-inline">

    <a href="productpage.php">
      <button id="viewProducts" class="btn btn-outline-success" type="button" value="login">
        <b>View Products</b>
      </button>
    </a>
    
    <a href="logoutClicked.php">
      <button type="button" class="btn btn-danger">LOGOUT</button>
    </a>

    </form>
</nav>


<!-- SECOND NAV BAAR CONSISTING OF BRANCH NAMES (STATIC NAV) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light secondnav">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <span class="navbar-brand mb-0 h1">
  <?php
    if(isset($_SESSION['name'])){
      $str="Hey, <b>".ucwords($_SESSION['name'])."</b>!";
      echo $str;
    } 
  ?>
  </span>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link secondNavItems" href="productpage.php?branch=it">IT</a>
      </li>

      <li class="nav-item">
        <a class="nav-link secondNavItems" href="productpage.php?branch=computers">COMPUTERS</a>
      </li>

      <li class="nav-item">
        <a class="nav-link secondNavItems" href="productpage.php?branch=electronics">ELECTRONICS</a>
      </li>

      <li class="nav-item">
        <a class="nav-link secondNavItems" href="productpage.php?branch=extc">EXTC</a>
      </li>

      <li class="nav-item">
        <a class="nav-link secondNavItems" href="productpage.php?branch=mechanical">MECHANICAL</a>
      </li>

      <li class="nav-item">
        <a class="nav-link secondNavItems" href="productpage.php?branch=civil">CIVIL</a>
      </li>

      <li class="nav-item">
        <a class="nav-link secondNavItems" href="productpage.php?branch=instrumentation">INSTRUMENTATION</a>
      </li>

      <li class="nav-item">
        <a class="nav-link secondNavItems" href="productpage.php?branch=chemical">CHEMICAL</a>
      </li>

    </ul>
  </div>
</nav>


<form id="additemform" method="POST" enctype="multipart/form-data" action="additempage.php">

  <?php 
    if ($msg) {
      echo "<div class=\"alert alert-success\" role=\"alert\">".$msg."</div>";
    }else if($error){
      echo "<div class=\"alert alert-danger\" role=\"alert\">".$error."</div>";
    }
  ?>
	

	 <div class="form-group">
    	<label for="formGroupExampleInput"><b>Title</b></label>
    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title" name="title" autocomplete="off">
  	</div>

  	<div class="form-group">
    	<label for="exampleFormControlTextarea1"><b>Description</b></label>
    	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" autocomplete="off"></textarea>
  	</div>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Price (Rs.)</b></label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="500" name="price" autocomplete="off">
    </div>

  	<div>
  		<select class="custom-select" name="course">
		  <option value="Engineering">Engineering</option>
		</select>
  	</div>

  	<div>
  		<select class="custom-select" name="branch">
			  <option selected>Branch</option>
			  <option value="IT">IT</option>
			  <option value="Computers">COMPUTERS</option>
			  <option value="Electronics">ELECTRONICS</option>
			  <option value="Extc">EXTC</option>
        <option value="Mechanical">MECHANICAL</option>
        <option value="Civil">CIVIL</option>
        <option value="Instrumentation">INSTRUMENTATION</option>
        <option value="Chemical">CHEMICAL</option>
		</select>
  	</div>

  	<div>
  		<select class="custom-select" name="sem">
		  <option selected>Semester</option>
		  <option value="I">I</option>
		  <option value="II">II</option>
		  <option value="III">III</option>
      <option value="IV">IV</option>
      <option value="V">V</option>
      <option value="VI">VI</option>
      <option value="VII">VII</option>
      <option value="VII">VIII</option>
		</select>
  	</div>

  	<div class="custom-file">
  		<input type="file" class="custom-file-input" id="customFile" name="image">
  		<label class="custom-file-label" for="customFile">Choose an Image</label>
	</div>

	<div class="form-group">
    	<label for="exampleFormControlTextarea1"><b>Address</b></label>
    	<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="address" autocomplete="off"></textarea>
  	</div>

  	<div class="form-group">
    	<label for="formGroupExampleInput"><b>Phone (+91)</b></label>
    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="9029192669" name="phone" autocomplete="off">
  	</div>

  	<div class="postBtn">
   		<button type="submit" class="btn btn-primary btn-lg"><b>POST</b></button> 		
  	</div>

</form>

	
<script type="text/javascript" src="bootstrap/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="bootstrap/popper.min.js"></script>
<script type="text/javascript" src="bootstrap/bootstrap.js"></script>
</body>
</html>