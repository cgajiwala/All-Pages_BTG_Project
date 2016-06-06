<?php

$name =""; // Sender Name
$email =""; // Sender's email ID
$comments =""; // Sender's comments
$phone="";
$feedback="";


$nameError ="";
$emailError ="";
$commentsError ="";
$feedbackError="";
$phoneError="";

$errors = 0;
$successcomments ="";

if(isset($_POST['submit'])) { 

	$name = $_POST["name"]; // Sender Name
	$email = $_POST["email"]; // Sender's email ID
	$comments = $_POST["comments"]; // Sender's comments
	//$feedback = $_POST["feedback"];
	$phone = $_POST["phone"];
	
	if (empty($_POST["name"])){
		$nameError = "Name is required";
		$errors = 1;
	}
	if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
	{
		$emailError = "Email is not valid";
		$errors = 1;
	}
	
	if (empty($_POST["phone"])){
		$phoneError = "Phone is required";
		$errors = 1;
	}
	
	if (!isset($_POST["feedback"])){
		$feedbackError = "Select one Feedback";
		$errors = 1;
	}

	if (empty($_POST["comments"])){
		$commentsError = "comments is required";
		$errors = 1;
	}
	
	$con = mysqli_connect("localhost","root", "");
	if(!$con) {
		die("can not connect:" .mysql_error());
	}
	
	mysqli_select_db($con,"mydb");
	
	$sql = "INSERT INTO mytable1 (name, email, phone, feedback, comments) VALUES ('$_POST[name]','$_POST[email]','$_POST[phone]', '$_POST[feedback]','$_POST[comments]')";
	
	mysqli_query($con, $sql);
	
	mysqli_close($con);
	
}	


if($errors == 0){
	$successcomments ="Form Submitted successfully..."; // IF no errors
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Customer Comments</title>
		<meta charset="utf-8">
		
		<!-------------Author: Chirag Gajiwala------------------>
		
		
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
			<link rel="stylesheet" href="css/style.css" />
			
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>






<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>
		new WOW().init();
		</script>
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>

<link href="css/style.css" rel='stylesheet' type='text/css' />
		
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>




	</head>
	
	<body>
	
	<div id="header"> 
<h1 id = "metro">
    <a href="home.html">
    <img src="Bostonlogo.png" alt="Boston logo" width="180" height="99">
    </a>
    Schedules and Maps 
    </h1>
  </div>
	<br>
	
	<div class="container-fluid">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">	
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="#">Brand</a>-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="schedules and maps.html">Schedules & Maps<span class="sr-only">(current)</span></a></li>
        <li><a href="Fares.html">Fares</a></li>
		   <li><a href="TipsforT.html">Tips</a></li>
		   <li><a href="AboutBTG.html">About BTG</a></li>
		   <li><a href="CustomerSupport.html">Customer Support</a></li>
		   <li><a href="safety.html">Safety</a></li>
    
      </ul>
    
  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
		<div class="container">
			<div class="main">
				<h2>Comments form</h2><br>
				<p>Your feedback is very important to us. It helps us meet our goal to provide safe, reliable, clean, and 
				accessible service. Please fill out the form below and click the submit button at the bottom. 
				Your comments will be reviewed carefully by our Customer Support Group.</p>
				<p>Items in * are required</p><br>
				<h3>Personal Information</h3><br>
				<p>Please tell us who you are so we can follow up with you.</p>
				
				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
					<label>Name :*</label>
					<input class="input" type="text" name="name" value="<?php echo $name; ?>">
					<div class="error"><?php echo $nameError;?></div>
					
					<label>Email :*</label>
					<input class="input" type="text" name="email" value="<?php echo $email; ?>">
					<div class="error"><?php echo $emailError;?></div>
					
					<label>Phone :*</label>
					<input class="input" type="text" name="phone" value="<?php echo $phone; ?>">
					<div class="error"><?php echo $phoneError;?></div><br>
					
				    <label>Type of Feedback :*</label>
					<div>
					<input type="radio" name="feedback" value="INQUIRY" <?php if (isset($feedback) && $feedback == "INQUIRY") echo "checked"; ?> > INQUIRY
					<input type="radio" name="feedback" value="SUGGESTION" <?php if (isset($feedback) && $feedback == "SUGGESTION") echo "checked"; ?> > SUGGESTION
					<input type="radio" name="feedback" value="COMPLAINT" <?php if (isset($feedback) && $feedback == "COMPLAINT") echo "checked"; ?> > COMPLAINT
					</div>
					<div class="error"><?php echo $feedbackError;?></div>
				
					<label>Comments :*</label>
					<textarea name="comments" val=""><?php echo $comments; ?></textarea>
					<div class="error"><?php echo $commentsError;?></div>
					
					<input class="submit" type="submit" name="submit" value="Submit">
					<div style="background-color:green"><?php echo $successcomments;?></div>
				</form>
			</div>
		</div><br>
		
		
		<!---- footer ---->
			<div class="footer">
				<div class="container">
					<div class="footer-grids">
						<div class="col-md-3 footer-grid ftr-sec wow fadeInLeft" data-wow-delay="0.4s">
							<h3>Navigation</h3>
							<ul>
								<li><a href="home.html">Home</a></li>
								<li><a href="AboutBTG.html">About</a></li>
								<li><a href="CustomerSupport.html">Customer Support</a></li>
								<li><a href="./">Products</a></li>
															
							</ul>
						</div>
						<div class="col-md-3 footer-grid ftr-sec wow fadeInLeft" data-wow-delay="0.4s">
							<h3>For Clients</h3>
							<ul>
								<li><a href="./">Forums</a></li>
							    <li><a href="./">Promotions</a></li>
								<li><a href="SignIn.html">Sign in</a></li>
								<li><a href="WeatherAlerts.html">News</a></li>								
							</ul>
						</div>
						<div class="col-md-3 footer-grid ftr-sec wow fadeInRight" data-wow-delay="0.4s">
							<h3>Follows</h3>
							<ul class="social-icons">

								<li><a class="twitter" href="twitter.com/"><span></span>twitter</a></li>
								<li><a class="facebook" href="facebook.com/"><span> </span>Facebook</a></li>
								<li><a class="googlepluse" href="plus.google.com/"><span> </span>google+</a></li>								
							</ul>
						</div>
						<div class="col-md-3 footer-grid ftr-sec ftr wow fadeInRight" data-wow-delay="0.4s">
							<h3>Our Location</h3>
							<ul class="location">
								<li><a class="hm" href="#"><span> </span>75 Saint Alphonsus Street</a></li>
								<li><a class="phn" href="#"><span> </span>TELEPHONE:8572051051</a></li>
							</ul>							
						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
			</div>
		
		</div>
	</body>
</html>