<?php
include("baglanti.php");
session_start();

if (!isset($_SESSION["login"])) {
  if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    $kontrol = mysqli_query($conn, "select * from USER where username='" . $username . "' and password='" . $password . "' ");
    if ($kontrol) {
      $sonuc = mysqli_fetch_assoc($kontrol);
      if (count($sonuc) > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $sonuc["id"];
        $_SESSION["login"] = true;
      }
    }
  }
}
session_write_close();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!------------------------------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html>

<head>
  <title>Mezatçım</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css" />
  <link rel="shortcut icon" type="images/x-icon" href="./images/logo2.png">

</head>
<!--Coded with love by Mutiullah Samim-->

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:20px;">
    <a class="navbar-brand" href="index.php">
      <img src="images/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Mezatçım
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

      </ul>

      <form class="form-inline my-2 my-lg-0" method="GET">
        <input class="form-control mr-sm-2" type="text" placeholder="Ara" aria-label="Search" name="aramasorgusu">
        <button class="btn  my-2 my-sm-0 btn-warning" type="submit" style="background-color: #ec971f; color:white;"> <i class="fas fa-search"></i> Ara </button>
      </form>

      <?php
      if (isset($_SESSION['login'])) {
      ?>
        <form class="form-inline my-2 my-lg-0" action="profile.php" method="GET">
          <button type="submit" name="profile" class="btn btn-primary ml-2 btn-warning" style="background-color: #ec971f; color:white;">
            <i class="fas fa-user"></i><a href="profile.php?username=<?= $_SESSION["username"] ?>" style="color: white; text-decoration: none"> Profil </a>
          </button>
        </form>
        <form class="form-inline my-2 my-lg-0">
          <button type="submit" class="btn btn-primary ml-2 btn-warning " style="background-color: #ec971f; color:white;">
            <i class="fas fa-sign-in-alt"></i> <a href="logout.php" style="color: white; text-decoration: none">Çıkış Yap</a>
          </button>
        </form>
      <?php
      } else {
      ?>
        <form class="form-inline my-2 my-lg-0">
          <button type="submit" class="btn btn-primary ml-2 btn-warning " style="background-color: #ec971f; color:white;">
            <i class="fas fa-sign-in-alt"></i> <a href="login.php" style="color: white; text-decoration: none">Giriş Yap</a>
          </button>
        </form>
      <?php
      }
      ?>

    </div>
  </nav>


  <div class="container-fluid">
    <div class="row mt-2 ">
      <div class="col-md-2 ml-0">
        <div class="list-group ml-0">

          <a href="#" class="list-group-item active"> <i class="fas fa-align-justify"></i> <span>Kategoriler</span></a>
          <a href="?category=Sanat" class="list-group-item"> <span>Sanat</span></a>
          <a href="?category=Bilim" class="list-group-item"><span>Bilim</span></a>
          <a href="?category=Araba" class="list-group-item"> <span>Araba</span></a>
          <a href="?category=Okul" class="list-group-item"> <span>Okul</span></a>
          <a href="?category=Kitap" class="list-group-item"><span>Kitap</span></a>


        </div>
      </div>
      <!-- card view -->

      <!------------------------------------------------------------------------------------------------------------------------------------------->

      <div class="col-md-10 ml-0">
        <div class="row mt-0">

          <?php
          if (isset($_GET["aramasorgusu"]) && !empty($_GET["aramasorgusu"])) {
            $aramasorgusu = $_GET['aramasorgusu'];
            $sorgu = mysqli_query($conn, "SELECT * FROM PRODUCT inner join users on product.userid = users.id WHERE urunname LIKE '%" . $aramasorgusu . "%'");
            if (mysqli_num_rows($sorgu) > 0) {
              while ($urun = mysqli_fetch_assoc($sorgu)) { ?>
                <div class="col-md-3">
                  <div class="card mb">
                    <div style="display: flex; margin-bottom:1%;">
                      <div class="d-flex justify-content-center h-100">
                        <div class="image_outer_container">
                          <div class="image_inner_container">
                            <img src="images/favicon.png">
                          </div>
                        </div>
                      </div>
                      <a href="profile.php?username=<?= $urun["username"] ?>" style="color:#ec971f; margin-top:3%; margin-left:2%; margin-bottom:1%;">
                        <?php echo $urun["username"]; ?>
                      </a>
                    </div>
                    <img class="card-img-top" width="286px" height="200px" src="<?php echo $urun["imagepath"] ?>" alt="Card image cap">
                    <div class="card-body mb">
                      <h4 class="card-title" name="baslik"> <?php echo $urun["urunname"] ?> </h4>
                      <h6 class="card-title" name="fiyat"> <?php echo $urun["price"] ?> </h6>
                      <p class="card-text" name="aciklama"> <?php echo $urun["description"] ?></p>

                      <?php
                      $date = date('Y-m-d h:i:s ', time());
                      if (strtotime($urun["endTime"]) > strtotime($date)) {
                      ?>
                        <button type="submit" class="btn btn-primary ml-2 btn-warning " style="background-color: #ec971f; color:white;">
                          <i class="fas fa-arrow-right"></i> <a href="ihale.php?id=<?= $urun["urun_id"] ?>" style="color: white; text-decoration: none">İhaleye Katıl</a>
                        </button>
                      <?php
                      } else {
                      ?>
                        <button type="submit" class="btn btn-primary ml-2 btn-warning " style="background-color: #ec971f; color:white;" disabled>
                          İhale Bitti
                        </button>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
              <?php
              }
            } else {
              echo "Aradığınız İçerik Bulunamadı";
            }
          } else if (isset($_GET["category"])) {

            $kategori = $_GET["category"];
            $sorgu = mysqli_query($conn, "select * from PRODUCT inner join users  on product.userid=users.id where category='" . $kategori . "'");

            if (mysqli_num_rows($sorgu) > 0) {
              while ($urun = mysqli_fetch_assoc($sorgu)) { ?>
                <div class="col-md-3">
                  <div class="card mb">
                    <div style="display: flex; margin-bottom:1%;">
                      <div class="d-flex justify-content-center h-100">
                        <div class="image_outer_container">
                          <div class="image_inner_container">
                            <img src="images/favicon.png">
                          </div>
                        </div>
                      </div>

                      <a href="profile.php?username=<?= $urun["username"] ?>" style="color:#ec971f; margin-top:3%; margin-left:2%; margin-bottom:1%;">
                        <?php echo $urun["username"]; ?>
                      </a>
                    </div>

                    <img class="card-img-top" width="286px" height="200px" src="<?php echo $urun["imagepath"] ?>" alt="Card image cap">
                    <div class="card-body mb">
                      <h4 class="card-title" name="baslik"> <?php echo $urun["urunname"] ?> </h4>
                      <h6 class="card-title" name="fiyat"> <?php echo $urun["price"] ?> </h6>
                      <p class="card-text" name="aciklama"> <?php echo $urun["description"] ?></p>

                      <?php
                      $date = date('Y-m-d h:i:s ', time());
                      if (strtotime($urun["endTime"]) > strtotime($date)) {
                      ?>
                        <button type="submit" class="btn btn-primary ml-2 btn-warning " style="background-color: #ec971f; color:white;">
                          <i class="fas fa-arrow-right"></i> <a href="ihale.php?id=<?= $urun["urun_id"] ?>" style="color: white; text-decoration: none">İhaleye Katıl</a>
                        </button>
                      <?php
                      } else {
                      ?>
                        <button type="submit" class="btn btn-primary ml-2 btn-warning " style="background-color: #ec971f; color:white;" disabled>
                          İhale Bitti
                        </button>
                      <?php
                      }
                      ?>

                    </div>
                  </div>
                </div>
              <?php    }
            }
          } else {
            $sorgu = mysqli_query($conn, "select * from product inner join users on product.userid=users.id ");
            if (mysqli_num_rows($sorgu) > 0) {
              while ($urun = mysqli_fetch_assoc($sorgu)) {

              ?>

                <div class="col-md-3">
                  <div class="card mb">
                    <div style="display: flex; margin-bottom:1%;">
                      <div class="d-flex justify-content-center h-100">
                        <div class="image_outer_container">
                          <div class="image_inner_container">
                            <img src="images/favicon.png">
                          </div>
                        </div>
                      </div>
                      <a href="profile.php?username=<?= $urun["username"] ?>" style="color:#ec971f; margin-top:3%; margin-left:2%; margin-bottom:1%;">
                        <?php echo $urun["username"]; ?>
                      </a>
                    </div>
                    <img class="card-img-top" width="286px" height="200px" src="<?php echo $urun["imagepath"] ?>" alt="Card image cap">
                    <div class="card-body mb">
                      <h4 class="card-title" name="baslik"> <?php echo $urun["urunname"] ?> </h4>
                      <h6 class="card-title" name="fiyat"> <?php echo $urun["price"] ?> </h6>
                      <p class="card-text" name="aciklama"> <?php echo $urun["description"] ?></p>

                      <?php
                      $date = date('Y-m-d h:i:s ', time());
                      if (strtotime($urun["endTime"]) > strtotime($date)) {
                      ?>
                        <button type="submit" class="btn btn-primary ml-2 btn-warning " style="background-color: #ec971f; color:white;">
                          <i class="fas fa-arrow-right"></i> <a href="ihale.php?id=<?= $urun["urun_id"] ?>" style="color: white; text-decoration: none">İhaleye Katıl</a>
                        </button>
                      <?php
                      } else {
                      ?>
                        <button type="submit" class="btn btn-primary ml-2 btn-warning " style="background-color: #ec971f; color:white;" disabled>
                          İhale Bitti
                        </button>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
          <?php  }
            }
          } ?>
        </div>

      </div>

      <!-- end card view -->
    </div>
  </div>

  <footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="#" style="color: #ec971f;"> Texas Software Inc.</a>
    </div>
    <!-- Copyright -->

  </footer>
</body>

</html>