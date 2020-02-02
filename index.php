<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>BookShare | Welcome</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="index.css"> -->

  <style type="text/css">
    <?php 
      include 'index.css';
    ?>
  </style>
  
</head>
<body>


<!-- FIXED TOP BAR WITH LOGIN AND REGISTER BUTTONS (FIXED NAV)-->
<nav class="navbar navbar-dark bg-dark fixed-top"> 
  <span class="navbar-brand mb-0 h1">BookShare.com</span>
  <form class="form-inline">
    <?php

      if(isset($_SESSION['name'])){
        //MEANS USER IS LOGGED IN
        echo "

        <a href=\"productpage.php\">
          <button id=\"viewProducts\" class=\"btn btn-outline-success\" type=\"button\" value=\"login\">View Products</button>
        </a>

        <a href=\"logoutClicked.php\">
          <button type=\"button\" class=\"btn btn-danger\">LOGOUT</button>
        </a>
        ";
      }else{
        //USER IS NOT LOGGED IN
        echo "
        <a href=\"login.php\">
        <button class=\"btn btn-outline-success\" type=\"button\" value=\"login\">Login</button>
        </a>

        <a href=\"register.php\">
          <button class=\"btn btn-outline-success\" type=\"button\" value=\"register\">Register</button>
        </a>

        ";

      }

    ?>
    

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



<!-- MOVING IMAGES CAROUSEL -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

	 <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100 movingImg" src="assets/sliderk1.jpg" alt="First slide">
	      	<div class="carousel-caption d-none d-md-block">
    			<h5>Books are a uniquely portable magic.</h5>
    			<p></p>
  			</div>
	    </div>

	    <div class="carousel-item">
	      <img class="d-block w-100 movingImg" src="assets/sliderk2.jpg" alt="Second slide">
	     	<div class="carousel-caption d-none d-md-block">
    			<h5>Reading gives us someplace to go when we have to stay where we are.</h5>
    			<p></p>
  			</div>
	    </div>

	    <div class="carousel-item">
	      <img class="d-block w-100 movingImg" src="assets/sliderk3.jpg" alt="Third slide">
	      	<div class="carousel-caption d-none d-md-block">
    			<h5>I have always imagined paradise will be a kind of library.</h5>
    			<p>There is no friend as loyal as a book.</p>
  			</div>
	    </div>
	</div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>

  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>

<h3 id="ourproducts">PRODUCTS THAT ARE SOLD ON OUR WEBSITE</h3>

<!-- SOME PRODUCTS AT LANDING PAGE -->

<div class="container">
  <div class="row">

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
          <a href="productpage.php">
            <img class="card-img-top" src="assets/ip.jpeg" alt="Card image cap">
          </a>
          <div class="card-body">
            <h5 class="card-title">Internet Programming</h5>
            <p class="card-text">IT SEMESTER V </p>
          </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
          <a href="productpage.php">
            <img class="card-img-top" src="assets/dsa.jpeg" alt="Card image cap">
          </a>
          <div class="card-body">
            <h5 class="card-title">Data Structures</h5>
            <p class="card-text">IT SEMESTER III</p>
          </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
          <a href="productpage.php">
            <img class="card-img-top" src="assets/mechanics.jpeg" alt="Card image cap">
          </a>
          <div class="card-body">
            <h5 class="card-title">Engineering Mechanics</h5>
            <p class="card-text">FE SEMESTER I</p>
          </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
          <a href="productpage.php">
            <img class="card-img-top" src="assets/bee.jpeg" alt="Card image cap">
          </a>
          <div class="card-body">
            <h5 class="card-title">Basic Electrical Engineering</h5>
            <p class="card-text">FE SEMESTER I</p>
          </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
          <a href="productpage.php">
            <img class="card-img-top" src="assets/cloudcomp.jpeg" alt="Card image cap">
          </a>
          <div class="card-body">
            <h5 class="card-title">Cloud Computing</h5>
            <p class="card-text">COMPS SEMESTER VI</p>
          </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
          <a href="productpage.php">
            <img class="card-img-top" src="assets/automata.png" alt="Card image cap">
          </a>
          <div class="card-body">
            <h5 class="card-title">Automata Theory</h5>
            <p class="card-text">IT SEMESTER IV</p>
          </div>
        </div>
    </div>

    
  </div>
</div>


<script type="text/javascript" src="bootstrap/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="bootstrap/popper.min.js"></script>
<script type="text/javascript" src="bootstrap/bootstrap.js"></script>
</body>
</html>