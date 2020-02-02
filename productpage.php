<?php
  session_start();

  if(!isset($_SESSION['name'])){
    //user is no logged in. So redirect to login
    header("Location: login.php");
  }
  

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="productpage.css"> -->

  <style type="text/css">
    <?php 
      include 'productpage.css';
    ?>
  </style>

</head>
<body>

<nav class="navbar navbar-dark bg-dark"> 
  <a href="index.php"><span class="navbar-brand mb-0 h1">BookShare.com</span></a>
  <form class="form-inline">
  	
    <a href="additempage.php">
      <button class="btn btn-outline-success" type="button" value="sell">SELL NOW</button>
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
        <a class="nav-link secondNavItems" href="productpage.php">ALL</a>
      </li>

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

<h3 id="ourproducts">PRODUCTS</h3>

<div class="container">
  <div class="row">

    <?php

      $user='root';
      $pass='';
      $db='bookshare';

      $link=mysqli_connect('localhost',$user,$pass,$db);

      if(mysqli_connect_error()){
        echo "There was an error connecting to DB!";
      }else{
      //connected to db successfully

        if(isset($_GET['branch'])){
          // echo $_GET['branch'];
          $query="SELECT * FROM books WHERE branch='".$_GET['branch']."' ORDER BY bookid DESC";
        }else{
          $query="SELECT * FROM books ORDER BY bookid DESC";
        }

        $result=mysqli_query($link,$query);

        while ($row=mysqli_fetch_array($result)) {

          $bookid=$row['bookid'];
         
          echo "
          <div class=\"col-lg-3 col-md-4 col-sm-6\">
            <div class=\"card\">
              <img class=\"card-img-top\" src='images/".$row['image']."' alt=\"Card image cap\">
              <div class=\"card-body\">
                <h5 class=\"card-title\">".$row['title']."</h5>
                <h6 class=\"card-title\">Rs.".$row['price']."</h6>
                <p class=\"card-text\">".$row['description']."</p>
                <a href=\"showitem.php?bookid=$bookid\" class=\"btn btn-primary btn-lg btn-block\">BUY</a>
              </div>
            </div>
          </div>";

        }
    }

    ?>
    
<!--     <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card">
          <img class="card-img-top" src="assets/LoginRegisterBook.jpeg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">SEM-4</h5>
            <h6 class="card-title">Rs.500</h6>
            <p class="card-text">PHYSICS CHEM MATH</p>
            <a href="showitem.php?bookid=1&title=automata&price=900" class="btn btn-primary btn-lg btn-block">BUY</a>
          </div>
        </div>
    </div> -->


<script type="text/javascript" src="bootstrap/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="bootstrap/popper.min.js"></script>
<script type="text/javascript" src="bootstrap/bootstrap.js"></script>
</body>
</html>