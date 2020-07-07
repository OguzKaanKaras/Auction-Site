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
	<link rel="stylesheet" type="text/css" href="css/singup.css" />
	<link rel="shortcut icon" type="images/x-icon" href="./images/favicon.png">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Kayıt Ol</h5>
            <form class="form-signin" method="POST">

             <div class="form-label-group">
                <input type="text" id="inputname" class="form-control" name="name" placeholder="name" required autofocus>
                <label for="inputname">İsim</label>
              </div>
            
            
              <div class="form-label-group">
                <input type="text" id="inputsurname" class="form-control" name="surname" placeholder="surname" required autofocus>
                <label for="inputsurname">Soyisim</label>
              </div>

              <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
                <label for="inputUsername">Kullanıcı Adı</label>
              </div>
             

              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required>
                <label for="inputEmail">Email</label>
              </div>
              
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputPassword">Şifre</label>
              </div>


              <div class="form-label-group">
                <input type="password" id="inputConfirmPassword" class="form-control" name="confirmPassword" placeholder="Password" required>
                <label for="inputConfirmPassword">Şifreyi Doğrulayın</label>
              </div>    

              <button class="btn btn-lg btn-primary btn-block btn-warning" type="submit" name="kayit_button">Kayıt Ol</button>
              <a class="d-block text-center mt-2 small" href="login.php">Giriş Yap</a>
              <hr class="my-4">
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
     if(isset($_POST['kayit_button'])){

       $ad=$_POST['name'];
       $soyad=$_POST['surname'];
       $kullaniciadi=$_POST['username'];
       $mail=$_POST['email'];
       $sifre=$_POST['password'];
       $sifreiki=$_POST['confirmPassword'];

       if($sifre == $sifreiki){
       $bilgi = mysqli_query($conn,"SELECT * FROM USER where username = '".$kullaniciadi."' and mail = '".$mail."'");
       $kontrol = mysqli_fetch_assoc($bilgi);

       if ($kontrol == 0){

         mysqli_query($conn,"insert into users (firstname,surname,email,password,username) 
         VALUES('".$ad."','".$soyad."','".$mail."','".md5($sifre)."','".$kullaniciadi."')");
         
         header("Location:login.php");
       }
     }
     else
     {
        echo ' <script>
          function myFunction() {
            alert("Şifreleriniz Eşleşmşyor lütfen kontrol edin!!");
          }
          myFunction();
          </script>';
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
