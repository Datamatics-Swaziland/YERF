<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["signup-name"];
    $email = $_POST["signup-email"];
    $birthday = $_POST["signup-birthday"];
    $password = $_POST["signup-password"];
    $confirm_password = $_POST["signup-confirm-password"];

    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match. Please try again.";
    } else {
        $servername = "localhost";
        $usernameDB = "root";
        $passwordDB = "";
        $dbname = "db_yerf";

        $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

        if ($conn->connect_error) {
            error_log("Connection failed: " . $conn->connect_error);
            $error_message = "There was a problem connecting to the database. Please try again later.";
        } else {
            try {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (username, email, birthdate, password_hash) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    throw new Exception("Statement preparation failed: " . $conn->error);
                }

                $stmt->bind_param("ssss", $fullname, $email, $birthday, $password_hash);

                if (!$stmt->execute()) {
                    if ($conn->errno === 1062) {  // Duplicate entry error code
                        $error_message = "The email address is already in use.";
                    } else {
                        throw new Exception("Statement execution failed: " . $stmt->error);
                    }
                } else {
                    echo "<script>alert('Signup successful! You can now log in.'); window.location='login.php';</script>";
                }
            } catch (Exception $e) {
                error_log("Signup script error: " . $e->getMessage());
                $error_message = "Signup failed. Please try again later.";
            } finally {
                $stmt->close();
                $conn->close();
            }
        }
    }
}
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>YERF Web Portal</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Datamatics Eswatini">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

    <style>
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    
</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Sign up to Portal</h2>					

                    <?php
                    if (isset($error_message)) {
                        echo "<div class='alert alert-danger'>$error_message</div>";
                    }
                    ?>
	
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" action="signup.php" method="post">         
							<div class="email mb-3">
								<label class="sr-only" for="signup-name">Your Name</label>
								<input id="signup-name" name="signup-name" type="text" class="form-control signup-name" placeholder="Full name" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Email</label>
								<input id="signup-email" name="signup-email" type="email" class="form-control signup-email" placeholder="Email" required="required">
							</div>
							<div class="birthday mb-3">
								<label class="sr-only" for="signup-birthday">Your Birthday</label>
								<input type="date" id="signup-birthday" name="signup-birthday" class="form-control" required="required" placeholder="Select your birthday"> 
							</div>
							<div class="password mb-3" style="position: relative;">
								<label class="sr-only" for="signup-password">Password</label>
								<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
								<span class="toggle-password" onclick="togglePassword('signup-password')">
                                    <i class="far fa-eye" id="toggleSignupPassword"></i>
                                </span>
							</div>
                            <div class="password mb-3" style="position: relative;">
								<label class="sr-only" for="signup-confirm-password">Confirm Password</label>
								<input id="signup-confirm-password" name="signup-confirm-password" type="password" class="form-control signup-password" placeholder="Confirm your password" required="required">
								<span class="toggle-password" onclick="togglePassword('signup-confirm-password')">
                                    <i class="far fa-eye" id="toggleConfirmPassword"></i>
                                </span>
							</div>
							<div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="RememberPassword" required="required">
									<label class="form-check-label" for="RememberPassword">
									I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
									</label>
								</div>
							</div><!--//extra-->
							
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
							</div>
						</form><!--//auth-form-->
						
						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="login.php" >Log in</a></div>
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

          function togglePassword(fieldId) {
            var passwordField = document.getElementById(fieldId);
            var toggleIcon = document.querySelector(`#toggle${capitalize(fieldId)}`);
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
          }

          function capitalize(str) {
              return str.charAt(0).toUpperCase() + str.slice(1);
          }
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
