<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>YERF Web Portal</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="YERF Web Portal">
    <meta name="author" content="Datamatics Eswatini">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-404-page">   	
   
    <div class="container mb-5">
	    <div class="row">
		    <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
			    <div class="app-branding text-center mb-5">
		            <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">PORTAL</span></a>
	
		        </div><!--//app-branding-->  
			    <div class="app-card p-5 text-center shadow-sm">
				    <h1 class="page-title mb-4">404<br><span class="font-weight-light">Page Not Found</span></h1>
				    <div class="mb-4">
					    Sorry, we can't find the page you're looking for. 
				    </div>
				    <a class="btn app-btn-primary" href="index.html">Go to home page</a>
			    </div>
		    </div><!--//col-->
	    </div><!--//row-->
    </div><!--//container-->
   
    
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

    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    

    
    
    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script> 
    <script src="assets/js/charts-custom.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

