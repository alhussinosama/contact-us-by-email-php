<?php
	//message var
	$msg = '' ;
	$msgClass = '';
	

	// chech for the submit
	if (filter_has_var(INPUT_POST, 'submit')) {
		//get form data
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

		

		// check required fields
		if (!empty($email) && !empty($name) && !empty($message)) {
			//passed
			// echo 'PASSED' ;

			//check Email
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				//faild
					$msg = 'please use a valid email';
					$msgClass = 'alert-danger';
			} else {
				//passed
				// echo 'PASSED';
				//recipient the Email  - we couldl insert the email of the company 
				$toEmail = '';
				$subject = ' contact request from' . $name;
				$body = ' <h2> Contact Request </h2>
				<h4> Name </h4> <p> '. $name .'</p> 
				<h4> Email </h4> <p> '. $email .'</p>
				<h4> message </h4> <p> '. $message .'</p>';

				// email header
				$headers = "mein-version: 1.0" . "\r\n";
				$headers .= "content-type :text/html;charset=utf-8" . "\r\n";
				// additional headers
				$headers .= "from" . $name . ">" . $email . ">" . "\r\n" ;
				//check the email sent or not 
				if (mail($toEmail, $subject, $body, $headers)) {
					//email sent
					$msg = 'your email has been sent';
					$msgClass = 'alert-success';
				} else {
					//failed
					$msg = 'your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else{
				//failed
			$msg = 'please fill all our fields';
			$msgClass = 'alert-danger';
		}

	}
	
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/cosmo/bootstrap.min.css">

	<!-- css bootstap --> 

				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

							<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


</head>
<body>


	<!-- the image -->

<div class="card bg-dark text-white">
  <img src="image/contact-us.jpg" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h1 class="card-title">Contact US</h1>
    <h2 class="card-text">you can send us an Email or call us or visit us in our office.</h2>
    <h3 class="card-text">189-A, Anand Estate, NavaBharat 

Sane Guruji Marg, Parel

Mumbai, Maharashtra - 400011.</h3>
  </div>
</div>

		

	<!-- nav bar -->

				<nav class="navbar navbar-light bg-light">
			  		<a class="navbar-brand" href="#">
			    <img src="image/contact1.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
			    CONTACT US 
			  </a>
			</nav>

			<!-- the form - name email and text  -->

			<div class="container">
					<?php if ($msg != ''): ?>
						<div class=" alert <?php echo $msgClass;?> "> <?php echo $msg; ?> </div>

					<?php endif; ?>

				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<label> Name </label>
						<input type="text" name="name" class="form-control" value=" <?php echo isset($_POST['name']) ? $name : '' ; ?>">
					</div>
					<div class="form-group">
						<label> Email </label>
						<input type="text" name="email" class="form-control" value=" <?php echo isset($_POST['email']) ? $email : '' ; ?>">
					</div>
					<div class="form-group">
						<label> Message </label>
						<textarea type="text" name="message" class="form-control" > <?php echo isset($_POST['message']) ? $message : '' ; ?> </textarea>
						<br>
						<button type="submit" name="submit" class="btn btn-primary"> Submit</button>
					</div>
						
					
					
				</form>
				
			</div>


<!-- the cards -->


<div class="container">
 
 
<div class="row">
 
  <div class="col-sm-4">
 
    <div class="card text-dark bg-warning">
 
    <div class="card-header bg-info text-left text-light"><h4>OFFICE</h4></div>
 
      <div class="card-body ">
 
        <h5 class="card-title">Adress</h5>
 
        <p class="card-text text-left">Vinna -189-A, Anand Estate, NavaBharat . </p>
 
      </div>
 
      <div class="card-footer bg-info text-right text-danger">
 
      <a href="#" class="btn btn-outline-light btn-sm">More info</a>
 
      </div>
 
    </div>
 
  </div>
 
  <div class="col-sm-4">
 
    <div class="card text-dark bg-warning">
 
    <div class="card-header bg-info text-left text-light"><h4>Call Us</h4></div>
 
      <div class="card-body ">
 
        <h5 class="card-title">Tel-Number</h5>
 
        <p class="card-text text-left">+43 666 6666 666 </p>
 
      </div>
 
      <div class="card-footer bg-info text-right text-danger">
 
       <a href="#" class="btn btn-outline-light btn-sm">More info</a>
 
      </div>
 
    </div>
 
  </div>
 
  <div class="col-sm-4">
 
    <div class="card text-dark bg-warning">
 
    <div class="card-header bg-info text-left text-light"><h4>To make an appointment</h4></div>
 
      <div class="card-body ">
 
        <h5 class="card-title">tel.Number</h5>
 
        <p class="card-text text-left">+43 666 666 555 </p>
 
      </div>
 
      <div class="card-footer bg-info text-right text-danger">
 
       <a href="#" class="btn btn-outline-light btn-sm">More info</a>
 
      </div>
 
    </div>
 
  </div>
 
</div>
 
</div>

<!-- the bar icons  -->
<style>p#hb_socialicons img {
 /* Spinning Social Icons Widget By All Tech Story */
    -moz-transition: all 0.8s ease-in-out;
    -webkit-transition: all 0.8s ease-in-out;
    -o-transition: all 0.8s ease-in-out;
    -ms-transition: all 0.8s ease-in-out;
    transition: all 0.8s ease-in-out;
}
 
p#hb_socialicons img:hover {
    -moz-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
}
 
/* Spinning Social Icons By All Tech Story*/
</style> 
 
 
 
<center><p id="hb_socialicons">
    <a href="http://www.facebook.com/AllTechStory">
<img border="0" src="http://4.bp.blogspot.com/-e0JJBIibMZA/UVGB6AYvN_I/AAAAAAAAB4w/slsBpW9P2uQ/s1600/alltechstory_facebook.png" /></a>
    <a href="http://www.twitter.com/AllTechStory/">
<img border="0" src="http://4.bp.blogspot.com/-gDKfQjpvPSM/UVGB63YVyFI/AAAAAAAAB48/YDprklElLio/s1600/alltechstory_twitter.png" /></a>
    <a href="https://plus.google.com/u/0/106527290580119996124">
<img border="0" src="http://4.bp.blogspot.com/-B_WbuqoCimA/UVGB57PbUAI/AAAAAAAAB4o/te0h3Zv2lpI/s1600/alltechstory_googleplus.png" /></a>
    <a href="http://www.feeds.feedburner.com/AllTechStory/">
<img border="0" src="http://3.bp.blogspot.com/-M1T4kadZgSs/UVGB6N0cTwI/AAAAAAAAB4s/Wg0VJaXzcvo/s1600/alltechstory_rss.png" /></a>
    <a href="http://www.youtube.com/AllTechStory/">
<img border="0" src="http://1.bp.blogspot.com/-9IQovhGAqY8/UVGB7JG9tgI/AAAAAAAAB5E/ttZmXcGs9os/s1600/alltechstory_youtube.png" /></a>
</p></center>


 

</body>
</html>