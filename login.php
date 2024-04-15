<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["signin-email"];
    $password = $_POST["signin-password"];

    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "db_yerf";

    // Create connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);


    // Check connection
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
        die("There was a problem connecting to the database. Please try again later.");
    }

	try{
    // Prepare and execute a query to retrieve the user's information
    $sql = "SELECT user_id, username, password_hash, email, failed_attempts, last_failed_attempt FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();  // Store the result for later use
    $stmt->bind_result($user_id, $db_username, $db_password_hash, $db_email, $failed_attempts, $last_failed_attempt);
    $stmt->fetch();

    // Check if the username is valid
    if ($stmt->num_rows > 0) {
        // Verify the password only if the username is valid
        if ($password === $db_password_hash) {
            // Regenerate the session ID after a successful login
            session_regenerate_id();

            // Store user information in session variables
            $_SESSION["user_id"] = $user_id;
            $_SESSION["username"] = $db_username;
            $_SESSION["email"] = $db_email;

            // Reset the failed attempts and last failed attempt time if the login is successful
            $sql = "UPDATE Users SET failed_attempts = 0, last_failed_attempt = NULL WHERE user_id = ?";
            $reset_stmt = $conn->prepare($sql);
            $reset_stmt->bind_param("i", $user_id);
            $reset_stmt->execute();
            $reset_stmt->close();

            // Check if 'Remember Me'  is selected 
            if (isset($_POST['remember-me'])) {
                // User wants to be remembered – set cookies
                $cookieExpiry = time() + 60 * 60 * 24 * 30; // 30 days
                setcookie("username", $username, $cookieExpiry);
                setcookie("password", $password, $cookieExpiry);
            } else {
                // User doesn't want to be remembered – delete cookies if they exist
                if (isset($_COOKIE["username"])) {
                    setcookie("username", "", time() - 3600); // Expire in the past
                }
                if (isset($_COOKIE["password"])) {
                    setcookie("password", "", time() - 3600);
                }
            }

            echo "<script>alert('Login successful! Welcome, $_SESSION[username]'); window.location='index.html';</script>";
            // Additional actions after successful login can be added here
        } else {
            // Increment the failed attempts and update the last failed attempt time if the login fails
            $ip_address = $_SERVER["REMOTE_ADDR"];
            $timestamp = date("Y-m-d H:i:s");

            // Insert failed login attempt into the log
            $log_sql = "INSERT INTO failed_logins (username, ip_address, timestamp) VALUES (?, ?, ?)";
            $log_stmt = $conn->prepare($log_sql);
            $log_stmt->bind_param("sss", $username, $ip_address, $timestamp);
            $log_stmt->execute();
            $log_stmt->close();

            // Update user's failed attempts and last failed attempt time
            $failed_attempts++;
            $last_failed_attempt = date("Y-m-d H:i:s");

            $update_sql = "UPDATE Users SET failed_attempts = ?, last_failed_attempt = ? WHERE user_id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("isi", $failed_attempts, $last_failed_attempt, $user_id);
            $update_stmt->execute();
            $update_stmt->close();

            if ($failed_attempts >= 3 && $failed_attempts < 10) {
                // Delay the next login attempt by a certain amount of time based on the number of failed attempts
                $delay_times = [60, 1800, 3600, 86400, 172800, 345600, 864000];
                $delay_seconds = isset($delay_times[$failed_attempts - 3]) ? $delay_times[$failed_attempts - 3] : 0;
                sleep($delay_seconds);
            } elseif ($failed_attempts >= 10) {
                // Lock the user's account if there are too many failed attempts
                $lock_sql = "UPDATE Users SET locked = 1 WHERE user_id = ?";
                $lock_stmt = $conn->prepare($lock_sql);
                $lock_stmt->bind_param("i", $user_id);
                $lock_stmt->execute();
                $lock_stmt->close();

                echo "<script>alert('Login failed. Your account has been locked due to too many failed attempts.'); window.location='login.php';</script>";
            } else {
                echo "<script>alert('Login failed. Invalid username or password'); window.location='login.php';</script>";
            }
        }
    } else {
        echo "<script>alert('Login failed. Invalid username or password.'); window.location='login.php';</script>";
    }

   
} catch (Exception $e) {
// Log the error for debugging
error_log("Login script error: " . $e->getMessage());
// Display a generic error message to the user
echo "<script>alert('Login failed. Please try again later.'); window.location='login.php';</script>";
}
	// Close the statement and connection
	$stmt->close();
    $conn->close();
}

// Unset and destroy the session
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
    
    <meta name="description" content="YERF Web Portal">
    <meta name="author" content="Datamatics Eswatini">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
			        <div class="auth-form-container text-start">


						<form class="auth-form login-form" action="login.php" method="post">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="signin-email" type="email" class="form-control signin-email" placeholder="Email address" required="required" value="<?php echo isset($_COOKIE["username"]) ? $_COOKIE["username"] : ''; ?>">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="signin-password" type="password" class="form-control signin-password" placeholder="Password" required="required" value="<?php echo isset($_COOKIE["password"]) ? $_COOKIE["password"] : ''; ?>">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="remember-me" id="remember-me" name="remember-me">
                                            <label class="form-check-label" for="remember-me">
											Remember me
											</label>
										</div>
									</div><!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="reset-password.php">Forgot password?</a>
										</div>
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.php" >here</a>.</div>
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

