<?php include("baglanti.php");
session_start();

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title>Mezatçım</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/login.css" />
	<link rel="shortcut icon" type="images/x-icon" href="./images/favicon.png">
</head>
<!--Coded with love by Mutiullah Samim-->

<body>

	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="images/logo.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="Kullanıcı Adı">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Şifre">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline" name="hatirla">
								<label class="custom-control-label" for="customControlInline">Beni Hatırla</label>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" class="btn login_btn" name="giris_button">Giriş Yap</button>
						</div>
					</form>
				</div>

				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Hala Bir Hesabın Yok Mu ? <a href="signup.php" class="ml-2">Kayıt Ol</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Şifremi Unuttum?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (
		isset($_POST['giris_button']) && !empty($_POST['username'])
		&& !empty($_POST['password'])
	) {
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		$sorgu = mysqli_query($conn, "select * from USERS where username='" . $username . "' and password='" . $password . "'");
		$giris = mysqli_num_rows($sorgu);
		if ($giris == 1) {
			$sonuc = mysqli_fetch_assoc($sorgu);
			if (count($sonuc > 0)) {
				$_SESSION["user_id"] = $sonuc["id"];
				$_SESSION["username"] = $username;
				$_SESSION["login"] = true;
				if (isset($_POST["hatirla"])) {
					setcookie("username", "", strtotime("15 Days"));
					setcookie("password", "", strtotime("15 Days")); 
				}
				session_write_close();
				header("Location:index.php");
			} else {
	?>
				<script>
                     alert('Kullanıcı Adı veya Parola Hatalı');
            	</script>
			<?php
			}
		} else {
			?>
			<script>
                     alert('Kullanıcı Adı veya Parola Hatalı');
            </script>
	<?php
		}
	}
	?>
	<footer class="page-footer font-small blue">

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">© 2020 Copyright:
			<a href="#" style="color: #ec971f;"> Texas Software Inc.</a>
		</div>
		<!-- Copyright -->

	</footer>
</body>

</html>