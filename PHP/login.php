<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 02/08/2018
 * Time: 18:56
 */
include 'functions.php';
session_start();
if (!isset($_SESSION['admin'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $admin = authenticate($email, $password);
        if ($admin) {
            $_SESSION['admin'] = $admin;
            header('Location: index.php');
        } else {?>
            <script>alert('Nom d\'utilisateur ou mot de passe incorrect');</script>
        <?php
        }
    }
}else header('Location: index.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Authentification</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="./assets_login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="./assets_login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./assets_login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="./assets_login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="./assets_login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="./assets_login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="./assets_login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="./assets_login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="./assets_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="./assets_login/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
Gym Manager
					</span>
					<span class="login100-form-title p-b-48">
						<i class="material-icons">fitness_center</i>
					</span>

					<div class="wrap-input100">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Entrez votre mot de passe">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
Login
							</button>

						</div>
					</div>


					<div class="text-center p-t-115">
						<span class="txt1">
Don’t have an account?
						</span>

						<a class="txt2" href="#">
    Sign Up
</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<script src="./assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="./assets_login/vendor/animsition/js/animsition.min.js"></script>
	<script src="./assets_login/vendor/bootstrap/js/popper.js"></script>
	<script src="./assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="./assets_login/vendor/select2/select2.min.js"></script>
	<script src="./assets_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="./assets_login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="./assets_login/vendor/countdowntime/countdowntime.js"></script>
	<script src="./assets_login/js/main.js"></script>

</body>
</html>