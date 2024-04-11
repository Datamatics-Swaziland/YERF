<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-reset-password p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Password Reset</h2>

					<div class="auth-intro mb-4 text-center">Enter your email address below. We'll email you a link to a page where you can easily create a new password.</div>
	
					<div class="auth-form-container text-left">
						
						<form class="auth-form resetpass-form">                
							<div class="email mb-3">
								<label class="sr-only" for="reg-email">Your Email</label>
								<input id="reg-email" name="reg-email" type="email" class="form-control login-email" placeholder="Your Email" required="required">
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Reset Password</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5"><a class="app-link" href="login.php" >Log in</a> <span class="px-2">|</span> <a class="app-link" href="signup.php" >Sign up</a></div>
					</div><!--//auth-form-container-->


			    </div><!--//auth-body-->
		    
			    <footer class="app-footer">
			<div class="container text-center py-3">
			  <small class="copyright">
				Developed by 
				<a class="app-link" href="http://datamatics.co.sz" target="_blank">
				  <img src="assets/images/datamatics.png" alt="Datamatics Logo" class="me-1" style="height: 1em; width: 1em;">
				  Datamatics Eswatini
				</a> 
				© <span id="currentYear"></span>
			  </small>
			  <br>
			  <p class="text-muted">Contact us: <a href="mailto:info@datamatics.co.sz">info@datamatics.co.sz</a> | Phone: +268 2404 7198</p>
			  
			  <a href="https://www.facebook.com/people/Datamatics-Swaziland/100067344042962/" class="text-muted mx-1">
				<i class="fab fa-facebook-f"></i> </a>
			  <a href="https://linkedin.com/company/datamatics-swaziland" class="text-muted mx-1">
				<i class="fab fa-linkedin"></i> </a>
			  
			  <a href="#" class="text-muted mx-1">Privacy Policy</a>
			  <a href="#" class="text-muted mx-1">Terms of Service</a>
			</div>
		</footer>
		
		<script>
		  const currentYear = new Date().getFullYear();
		  document.getElementById("currentYear").textContent = currentYear; 
		</script>
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore More About Youth Enterprise Revolving Fund</h5>
					    <div> Discover the Youth Enterprise Revolving Fund and ignite your entrepreneurial journey! Learn more <a href="https://www.yef.co.sz/">here</a>.</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

