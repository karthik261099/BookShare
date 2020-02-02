<?php
  session_start();

  if(!isset($_SESSION['name'])){
    //user is no logged in. So redirect to login
    header("Location: login.php");
  }
  

?>

<?php
  $user='root';
  $pass='';
  $db='bookshare';

  $link=mysqli_connect('localhost',$user,$pass,$db);
  $error=null;
  $msg=null;

  if(!isset($_GET['bookid'])){
  	header("Location: productpage.php");
  }

  $bookid=$_GET['bookid'];

  if(mysqli_connect_error()){
    $error="There was an error connecting to DB!";
  }else{
  	$query="SELECT * FROM books WHERE bookid=$bookid";
  }
  $result=mysqli_query($link,$query);
  $row=mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="showitem.css"> -->
		<style type="text/css">
				<?php 
						include 'showitem.css';
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

	

<div class="container">
	
		<div class="row row-grid">
				<div class="col-lg-6">
						<div class="imgksm">
							
							<?php
									echo "<img class=\"card-img-top img-fluid\" src='images/".$row['image']."' alt=\"Card image cap\">";
							?>

						</div>
				</div>
				<div class="col-lg-6">

						<div class="pl-lg-5">

								<!-- Product title -->
								<h4 class="h4" id="titleksm">Title : <?php echo ($row['title']) ?> </h4>
								<h5 class="text-sm">Price(Rs) : <?php echo ($row['price']) ?></h5>
						</div>

								<!-- Description -->
								<div class="py-4 my-4 border-top border-bottom">
										<h6 class="text-sm">Description:</h6>
										<p class="text-sm mb-0">
											<?php echo ($row['description']) ?>
										</p>
								</div>

								<dl class="row">
										<dt class="col-sm-3"><span class="h6 text-sm mb-0">Course</span></dt>
										<dd class="col-sm-9"><span class="text-sm"><?php echo ($row['course']) ?></span></dd>

										<dt class="col-sm-3"><span class="h6 text-sm mb-0">Branch</span></dt>
										<dd class="col-sm-9"><span class="text-sm"><?php echo ($row['branch']) ?></span></dd>

										<dt class="col-sm-3"><span class="h6 text-sm mb-0">Semester</span></dt>
										<dd class="col-sm-9"><span class="text-sm"><?php echo ($row['sem']) ?></span></dd>
								</dl>


								<!-- Description -->
								<div class="py-4 my-4 border-top border-bottom">
										<h6 class="text-sm">Address:</h6>
										<p class="text-sm mb-0">
											<?php echo ($row['address']) ?>
										</p>
								</div>

								<dl class="row">
										<dt class="col-sm-3"><span class="h6 text-sm mb-0">Sold By</span></dt>
										<dd class="col-sm-9">
											<span class="text-sm">
												<?php 
													$userid=($row['userid']);
													$query1="SELECT * FROM users WHERE id=$userid";
													$result1=mysqli_query($link,$query1);
													$row1=mysqli_fetch_array($result1);
													echo ucwords($row1['name']);
												?>
													
												</span>
										</dd>


										<dt class="col-sm-3"><span class="h6 text-sm mb-0">Phone (+91)</span></dt>
										<dd class="col-sm-9"><span class="text-sm"><?php echo ($row['phone']) ?></span></dd>
								</dl>
								

								<!-- Add to cart -->
								<?php
									echo "<a href=\"https://wa.me/91".$row['phone']."/?text=I%20saw%20your%20AD%20on%20BookShare.com%21%20I%27m%20interested%20in%20buying.\""." target=\"_blank\" class=\"btn btn-success btn-lg\">WhatsApp</a>"
								?>

												</div>
										</div>
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