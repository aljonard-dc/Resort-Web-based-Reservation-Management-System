<?php 
session_start();
$error = array();

require "mail.php";

	if(!$con = mysqli_connect("localhost","u403614883_root","Naturaverde2023!","u403614883_naturaverde_db")){

		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
			
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a Valid Email";
				}elseif(!valid_email($email)){
					$error[] = "That Email was not found!";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "The Reset Code is Correct!"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				// code...
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if($password !== $password2){
					$error[] = "Passwords Do Not Match!";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{
					
					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					header("Location: user-login.php");
					die;
				}
				break;
			
			default:
				
				break;
		}
	}

	function send_email($email){
		
		global $con;

		$expire = time() + (60 * 2);
		$code = rand(100000,999999);
		$email = addslashes($email);

		$query = "UPDATE users SET reset_code='$code', code_expire='$expire' WHERE email='$email'";
		mysqli_query($con,$query);

//send email here
	send_mail($email, 'Password Reset',
	'<pre style="font-size:1.1rem; font-family: Arial, Helvetica, sans-serif; color:black;">
    Thank you for using Natura Verde Farm and Private Resort! To assist with your account reset, 
    please make use of the following reset code:
    <b style="font-size: 25px;">
   	Reset Code: ' . $code . ' 
    </b>
    
    Kindly enter this code on our website or app to complete your account reset process. This step helps ensure the security of your account.
    If you did not request this code, please disregard this message.
   
    We appreciate your choice of Natura Verde Farm and Private Resort and look forward to welcoming you to our community.
   
    Regards,
    <b>The Natura Verde Farm and Private Resort Team</b></pre>');

	}
	
	function save_password($password){
		
		global $con;

		$password = password_hash($password, PASSWORD_DEFAULT);
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "UPDATE users SET password = '$password' where email = '$email' limit 1";
		mysqli_query($con,$query);

	}
	
	function valid_email($email){
		global $con;

		$email = addslashes($email);

		$query = "SELECT * FROM users where email = '$email' limit 1";		
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $con;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);
		//$query = "SELECT * FROM users where verification_code = '$code' && email = '$email' order by id desc limit 1";
		$query = "SELECT * FROM users WHERE reset_code = '$code' && email = '$email'";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['code_expire'] > $expire){
				
					return "The Reset Code is Correct!";
				}else{
					return "The Reset Code is no longer valid!";
				}
			}else{
				return "The Reset Code is Invalid!";
			}
		}

		return "The Reset Code is Incorrect!";
	}

	
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/forgotpassword.css">
<script src="javascript/forgot.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "icon" href = "./assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
</head>
<body>

<header>
<?php include('header_unauthenticated.php') ?> 
</header>

<?php 
	switch ($mode) {
		case 'enter_email':
				// code...?>
			
			<section class="forgot-sec">
				<div class="forgot-container">
				<button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
					<form method="POST" action="forgot.php?mode=enter_email"> 

						<div class="forgot-title">
							<label>Forgot Password ?</label>
						</div>	
						<div class="forgot-desc">
							<div class="desc">
								<p>Don't worry! Please provide your email address below, and we will send you an email containing the reset code.</p>
							</div>
						</div>
							<span style="padding:0.5em;;font-size:16px;color:red; display:grid;place-items:center;">
								<?php 
									foreach ($error as $err) {
							
										echo $err . "<br>";
									}
								?>
							</span>
						<div class="email-textbox">
							<input class="textbox" type="email" name="email" placeholder="Enter you Email Address">
						</div>
				
						<div class="submitbtn-pos">
							<input class="submitbtn" type="submit" value="Submit" style="cursor:pointer;">
						</div>	
						
						</form>
				</div>
			</section>	
			<?php				
					break;

				case 'enter_code':
					// code...
					?>
			<section class="forgot-sec">
				<div class="forgot-container">
				<button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
						
					<form method="POST" action="forgot.php?mode=enter_code">
						
						<div class="forgot-title"> 
							<label>Reset Code Verification</label>
						</div>	
						<div class="forgotcode-desc">
							<div class="codedesc">
								<p>Please enter the code that was sent to your email, and then create your new password.</p>
							</div>
						</div>		
							<span style="font-size: 14px;color:red; display:grid;place-items:center;">
							<?php 
								foreach ($error as $err) {
									
									echo $err . "<br>";
								}
							?>
							</span>
							<div class="forgotcode-textbox">
								<input class="code-textbox" type="text" placeholder="Enter reset code | Ex: 123456"  name="code" id="reset-code"
								required pattern="[0-9]{6}" title="Please enter Reset Code" maxlength="6" oninput="validateResetCode()">
								<span id="code-error" style="color: red;"></span> 
							</div> <br>

					
							<div class="submitcodebtn-pos">
								<input class="submitcodebtn" type="submit" value="Submit Code" style="cursor:pointer;"  onclick="checkResetCode()">
							</div>	
			
							<br><br>
			
						</form>
				</div>
			</section>
					<?php
					break;

				case 'enter_password':
				
					?>
		<section class="forgot-sec">
			<div class="forgot-container">
			<button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
						<form method="POST" action="forgot.php?mode=enter_password"> 
						<div class="forgot-title"> 
							<label>Reset your Password</label>
						</div>	
						<div class="forgotpass-desc">
							<div class="pass-desc">
								<p>Create New Password:</p>
							</div>
						</div>		
							<span style="font-size: 16px;color:red;display:grid;place-items:center;">
							<?php 
								foreach ($error as $err) {
								
									echo $err . "<br>";
								}
							?> 
							</span>
						<div class="forgotpass-textbox">
						
			
							<input class="pass-textbox" id="newpassword" type="text" name="password" placeholder="New Password">
							<img src="./assets/icons/eye-close.png" onclick="togglePassword('newpassword')" class="pass-icon">
						</div>	
						<div class="forgotpass-textbox">

					
							<input class="pass-textbox"  id="retypepassword" type="text" name="password2" placeholder="Confirm Password">
							<img src="./assets/icons/eye-close.png" onclick="togglePassword('retypepassword')" class="pass-icon">
						</div>
						<div class="resetpassbtn-pos">
							<input class="resetpass"type="submit" value="Reset Password" style="cursor:pointer;">
						</div>
					
							
						</form>
			</div>
		</section>
					<?php
					break;
				
				default:
				
					break;
			}

	?>

<footer>
    <?php include './footer.php'; ?>
</footer>

</body>
<script>
function togglePassword(inputId) {
    var passwordInput = document.getElementById(inputId);
    var passIcon = document.querySelector('[onclick="togglePassword(\'' + inputId + '\')"]');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passIcon.src = './assets/icons/eye-open.png';
    } else {
        passwordInput.type = 'password';
        passIcon.src = './assets/icons/eye-close.png';
    }
}

function goBack() {
      window.history.back();
    }
</script>
</html>