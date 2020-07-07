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
        <form class="form-inline my-2 my-lg-0" action="index.php" method="GET">
          <button type="submit" name="profile" class="btn btn-primary ml-2 btn-warning" style="background-color: #ec971f; color:white;">
            <i class="fas fa-home"></i><a href="index.php" style="color: white; text-decoration: none"> Anasayfa </a>
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
  <div class="container">
    <?php
    $urun_sorgu = mysqli_query($conn, "select * from product  where urun_id='" . $_GET["id"] . "'");
    if (mysqli_num_rows($urun_sorgu) == 1) {
      $urun_sonuc = mysqli_fetch_assoc($urun_sorgu);
      $dt = $urun_sonuc["endTime"];
      $urun_id = $urun_sonuc["urun_id"];
      if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
        $username = $_SESSION["username"];
        $isLogin = $_SESSION["login"];
      } else {
        $isLogin = false;
      }

    ?>
      <div class="row">
        <div class="col-6">
          <div style="text-align: center;">
            <img src=<?= $urun_sonuc["imagepath"] ?> class="img-fluid" alt="Responsive image" style="height:64vh; width:98vh;">
            <hr />
          </div>
          <div class="row" style="color: #ec971f;">
            <div class="col-5">
              <h4 style="margin-top: 1vh;">Ürün Adı :</h4>
            </div>
            <div class="col-7">
              <h4 style="margin-top: 1vh; "><span class="badge badge-warning" style="background-color: #ec971f; color:white;"><?= $urun_sonuc["urunname"] ?></span></h4>
            </div>
            <div class="w-100"></div>
            <div class="col-5">
              <h4 style="margin-top: 1vh;">Ürün Fiyatı :</h4>
            </div>
            <div class="col-7">
              <h4 style="margin-top: 1vh;"><span class="badge badge-warning" style="background-color: #ec971f; color:white;"><?= $urun_sonuc["price"] ?></span></h4>
            </div>
            <div class="w-100"></div>
            <div class="col-5">
              <h4 style="margin-top: 1vh;">Ürün Açıklaması :</h4>
            </div>
            <div class="col-7">
              <h4 style="margin-top: 1vh; "><span class="badge badge-warning" style="background-color: #ec971f; color:white;"><?= $urun_sonuc["description"] ?></span></h4>
            </div>
            <div class="w-100"></div>
          </div>
        </div>
        <div class="col-6">

          <div class="alert alert-warning" role="alert">
            <div class="container" style="padding-left: 0px;">
              <p id="timer" style="color:#856404; margin-bottom:0px; margin-left:0px;">
                <span id="timer-gunler"></span>
                <span id="timer-saatler"></span>
                <span id="timer-dakikalar"></span>
                <span id="timer-saniyeler"></span>
              </p>
            </div>
          </div>
          <div class="alert alert-warning" role="alert" style="display: flex;">
            <b> Güncel Fiyat : </b>
            <div id="guncelPrice"><?= $urun_sonuc["guncelPrice"] ?></div>
          </div>
          <div class="alert alert-warning" role="alert">
            <form class="form-inline" style="margin-bottom:0px;" method="POSt">
              <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" id="inputPrice" name="inputPrice" placeholder="Miktarı Giriniz" style="margin-bottom:0px;">
              </div>
              <button type="submit" name="inputPriceButton" id="inputPriceButton" class="btn btn-warning mb-2" style="color:white; background-color:#ec971f; margin-bottom:0px;">Teklif Ver</button>
              <p style="margin-left: 1vh; margin-right:1vh;color:#856404;"> </b> veya</b> </p> <button type="submit" id="inputPriceButton_2" class="btn btn-warning mb-2" style="color:white; background-color:#ec971f; margin-bottom:0px;">%5 Yükselt</button>
            </form>

          </div>
          <div class="alert alert-warning" role="alert" style="display: flex;">
            <b>En Yüksek Fiyat Sahibi: </b>
            <div id="guncelPriceOwner"><?= $urun_sonuc["guncelPriceOwner"] ?></div>
          </div>
          <div>
            <h5 style="text-align: center; color:#856404;   font-weight: bold;">Canlı Sohbet</h5>
            <hr>
            <form class="form-inline">
              <input type="text" class="form-control" id="comment" placeholder="Sohbete Başlayın." style="width: 83.5%; margin-bottom:1vh;">
              <button type="submit" id="sendComment" class="btn btn-primary mb-2" style="margin-left:1vh; background-color: #ec971f; color:white; border-color:#ec971f">Gönder</button>
            </form>
            <hr>
          </div>


          <div style="height: 46vh; width:100%; overflow-y: auto; background-color:#fff3cd;" id="comment-div">
            <?php
            $sorgu = mysqli_query($conn, "select * from comments where urun_id='" . $urun_id . "' ORDER BY comment_id DESC");
            if (mysqli_num_rows($sorgu) > 0) {
              while ($comment = mysqli_fetch_assoc($sorgu)) {
            ?>
                <h5 style="color:#856404; margin-top:0.5vh; margin-left:0.5vh;"> <span class="badge badge-warning" style="background-color: #ec971f; color:white;"><?= $comment["commentOwner"] ?> : </span> <?= $comment["comment"] ?></h5>

            <?php
              }
            }
            ?>
          </div>


        </div>
      </div>
    <?php
    }
    ?>
  </div>

  <footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="#" style="color: #ec971f;"> Texas Software Inc.</a>
    </div>
    <!-- Copyright -->

  </footer>
</body>
<script>
  var endDate = new Date('<?php echo $dt; ?>').getTime();
  var timer = setInterval(function() {
    var dt = '<?php echo $dt; ?>'
    let now = new Date().getTime();
    let t = endDate - now;

    if (t >= 0) {

      let gunler = Math.floor(t / (1000 * 60 * 60 * 24));
      let saatler = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let dakikalar = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
      let saniyeler = Math.floor((t % (1000 * 60)) / 1000);

      document.getElementById("timer-gunler").innerHTML = "<b> Kalan Süre : </b> " + gunler +
        "<span class='label'> gün</span>";

      document.getElementById("timer-saatler").innerHTML = ("0" + saatler).slice(-2) +
        "<span class='label'> sa</span>";

      document.getElementById("timer-dakikalar").innerHTML = ("0" + dakikalar).slice(-2) +
        "<span class='label'> dk</span>";

      document.getElementById("timer-saniyeler").innerHTML = ("0" + saniyeler).slice(-2) +
        "<span class='label'> sn</span>";
    } else {
      document.getElementById("timer").innerHTML = "Zaman bitti!";
    }


  }, 1000);
</script>

<script>
  $(document).ready(function() {
    var urun_id = '<?php echo $urun_id; ?>'
    var username = '<?php echo $username; ?>'
    var isLogin = '<?php echo $isLogin; ?>'
    $("#inputPriceButton").click(function(e) {
      e.preventDefault();
      if (isLogin == true) {
        var guncelPrice = parseFloat($("#guncelPrice").text());
        var inputPrice = parseFloat($('#inputPrice').val());

        if (inputPrice <= guncelPrice) {
          alert("Güncel Fiyattan daha düşük değer veremezsiniz!");
        } else {
          $.ajax({
            method: "POST",
            url: "update_Price.php",
            data: {
              inputPrice,
              urun_id,
              username
            },
            success: function(response) {
              $("#guncelPrice").load(" #guncelPrice");
              $("#guncelPriceOwner").load(" #guncelPriceOwner");
            }
          });
        }
      } else {
        alert("Fiyat Verebilmek İçin Giriş Yapmalısınız!");
      }
    });

    $("#inputPriceButton_2").click(function(e) {
      e.preventDefault();
      if (isLogin == true) {
        var inputPrice = parseFloat($("#guncelPrice").text());
        inputPrice = inputPrice + inputPrice * 5 / 100;
        $.ajax({
          method: "POST",
          url: "update_Price.php",
          data: {
            inputPrice,
            urun_id,
            username
          },
          success: function(response) {
            $("#guncelPrice").load(" #guncelPrice");
            $("#guncelPriceOwner").load(" #guncelPriceOwner");
          }
        });
      } else {
        alert("Fiyat Verebilmek İçin Giriş Yapmalısınız!");
      }
    });

    $("#sendComment").click(function(e) {
      e.preventDefault();
      if (isLogin == true) {
        var comment = $("#comment").val();
        $.ajax({
          method: "POST",
          url: "addComment.php",
          data: {
            comment,
            urun_id,
            username
          },
          success: function(response) {
            $("#comment-div").load(" #comment-div");
          }
        });
      } else {
        alert("Yazabilmek İçin Giriş Yapmalısınız!");
      }
    });

    setInterval(function(){  $("#comment-div").load(" #comment-div"); }, 1000);

  });
</script>

</html>