<?php
include("baglanti.php");
session_start();
session_write_close();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <title>İhale Sirketi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="images/x-icon" href="./images/logo2.png">
    <link rel="stylesheet" type="text/css" href="css/profile.css" />
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-0" style="padding-top:0.5%; padding-bottom:0.5%;">
        <div class="container-fluid mt-0">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="padding-right:0px;">
                    <img alt="" src="images/favicon.png" width="30" height="30" class="d-inline-block align-top">
                </a>
                <p class="navbar-text" style="margin-left: 5px; margin-bottom:0px; height:100%; font-size:150%;"><a href="index.php" style="color: black; text-decoration:none;">Mezatçım</a></p>
            </div>
            <div style="float: right; height:100%; margin-top:0px; margin-bottom:0%;">
                <form class="navbar-form navbar-left" role="search" style="padding-right:2px; ">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ara">
                    </div>
                    <button type="submit" class="btn btn-default" style="background-color: #ec971f; color:white;"><i class="fas fa-search"></i> Ara</button>
                </form>
                <button type="button" class="btn btn-default navbar-btn" style="background-color: #ec971f; color:white;"><i class="fas fa-home"></i>
                    <a href="index.php" style="color: white; text-decoration: none">Anasayfa</a>
                </button>
                <button type="button" class="btn btn-default navbar-btn" style="background-color: #ec971f; color:white;"><i class="fas fa-sign-in-alt"></i><a href="logout.php" style="color: white; text-decoration: none">Çıkış Yap</a></button>

            </div>
        </div>
    </nav>

    <div class="container">
        <?php

        $user_sorgu = mysqli_query($conn, "select * from users  where username='".$_GET["username"]."'");
        if (mysqli_num_rows($user_sorgu) == 1) {
            $user_sonuc = mysqli_fetch_assoc($user_sorgu);
            $ihale_sorgu = mysqli_query($conn, "select * from product inner join users on product.userid = users.id where userid='" . $user_sonuc["id"] . "'");
        ?>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="text-center card-box">
                        <div class="member-card">
                            <div class="thumb-xl member-thumb m-b-10 center-block">
                                <img src="images/logo2.png" class="img-circle img-thumbnail" alt="profile-image">
                            </div>

                            <div class="">
                                <h4 class="m-b-5"><?= $user_sonuc["firstname"] ?></h4>
                                <p class="text-muted"><?= $user_sonuc["username"] ?></p>
                            </div>

                            <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">Takip Et</button>
                            <button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Mesaj Gönder</button>

                            <div class="text-left m-t-40" style="margin-top:3%; ">
                                <p class="text-muted font-13"><strong>İhale Sahibi :</strong> <span class="m-l-15"><?= $user_sonuc["firstname"] ?></span></p>
                                <p class="text-muted font-13"><strong>Numara :</strong><span class="m-l-15">0 (XXX) XXX XX XX</span></p>
                                <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?= $user_sonuc["email"] ?></span></p>
                                <p class="text-muted font-13"><strong>Lokasyon :</strong> <span class="m-l-15">Türkiye </span></p>
                            </div>

                            <ul class="social-links list-inline m-t-30">
                                <li>
                                    <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end card-box -->

                    <div class="card-box">
                        <h4 class="m-t-0 m-b-20 header-title">Puanlama</h4>
                        <div class="p-b-10">
                            <p>Ürün Kalitesi</p>
                            <div class="progress progress-sm">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                </div>
                            </div>
                            <p>Hız</p>
                            <div class="progress progress-sm">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                </div>
                            </div>
                            <p>Güvenirlik</p>
                            <div class="progress progress-sm m-b-0">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->


                <div class="col-md-8 col-lg-9">
                    <div class="">
                        <div class="">
                            <ul class="nav nav-tabs navtab-custom">
                                <li class="">
                                    <a href="#home" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-user"></i></span>
                                        <span class="hidden-xs">HAKKINDA</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#profile" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="fa fa-photo"></i></span>
                                        <span class="hidden-xs">İHALELER</span>
                                    </a>
                                </li>
                                <?php
                                if (isset($_SESSION["username"]) && $_SESSION["username"] == $_GET["username"]) {
                                ?>
                                    <li class="">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false">
                                            <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                            <span class="hidden-xs">AYARLAR</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#add-ihale" data-toggle="tab" aria-expanded="false">
                                            <span class="visible-xs"><i class="fa fa-bid"></i></span>
                                            <span class="hidden-xs">İHALE OLUŞTUR</span>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="home">
                                    <p class="m-b-5"><?= $user_sonuc["userabout"] ?></p>

                                </div>
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <?php
                                        if (mysqli_num_rows($ihale_sorgu) > 0) {
                                            while ($ihale_sonuc = mysqli_fetch_assoc($ihale_sorgu)) {

                                        ?>
                                                <div class="col-md-3">
                                                    <div class="card mb">

                                                        <h6 class="card-title" name="ihaleSahibi" style="color: #ec971f;"><?= $ihale_sonuc["username"] ?></h6>
                                                        <img class="card-img-top" src=<?= $ihale_sonuc["imagepath"] ?> style="width: 100%; height:100%; " alt="Card image cap">
                                                        <div class="card-body mb">
                                                            <h4 class="card-title" name="baslik"><?= $ihale_sonuc["firstname"] ?> </h4>
                                                            <h6 class="card-title" name="fiyat"> <?= $ihale_sonuc["price"] ?> </h6>
                                                            <p class="card-text" name="aciklama"><?= $ihale_sonuc["description"] ?></p>
                                                            <button type="submit" class="btn btn-primary mb btn-warning" style="background-color: #ec971f; color:white;"><i class="fas fa-arrow-right">
                                                            <a href="ihale.php?id=<?= $ihale_sonuc["urun_id"] ?>" style="color: white; text-decoration: none">İhaleye Katıl</a>
                                                            </i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <p>Kullanıcı henüz ihale oluşturmamıştır.</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="FirstName">İhale Sahibi Adı</label>
                                            <input type="text" placeholder=<?= $user_sonuc["firstname"] ?> id="FirstName" name="firstname" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="SurName">İhale Sahibi Soyadı</label>
                                            <input type="text" placeholder=<?= $user_sonuc["surname"] ?> id="SurName" name="surname" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="email" placeholder=<?= $user_sonuc["email"] ?> id="Email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Username">Kullanıcı Adı</label>
                                            <input type="text" placeholder=<?= $user_sonuc["username"] ?> id="Username" name="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" placeholder="6 - 15 Characters" id="Password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="RePassword">Re-Password</label>
                                            <input type="password" placeholder="6 - 15 Characters" id="RePassword" name="re_password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="AboutMe">Hakkında</label>
                                            <textarea style="height: 125px" id="AboutMe" name="userabout" class="form-control" placeholder=<?= $user_sonuc["userabout"] ?>></textarea>
                                        </div>
                                        <button class="btn btn-primary waves-effect waves-light w-md" name="update_user" type="submit" style="background-color: #ec971f; border-color:#d58512">Kaydet</button>
                                    </form>
                                </div>
                                <?php
                                if (isset($_POST['update_user'])) {

                                    if (isset($_POST["firstname"]) && !empty($_POST["firstname"])) {
                                        $firstname = trim($_POST["firstname"]);
                                    } else {
                                        $firstname = $user_sonuc["firstname"];
                                    }
                                    if (isset($_POST["surname"]) && !empty($_POST["surname"])) {
                                        $surname = trim($_POST["surname"]);
                                    } else {
                                        $surname = $user_sonuc["surname"];
                                    }

                                    if (isset($_POST["email"]) && !empty($_POST["email"])) {
                                        $email = trim($_POST["email"]);
                                    } else {
                                        $email = $user_sonuc["email"];
                                    }

                                    if (isset($_POST["username"]) && !empty($_POST["username"])) {
                                        $username = trim($_POST["username"]);
                                    } else {
                                        $username = $user_sonuc["username"];
                                    }

                                    if (isset($_POST["password"]) && !empty($_POST["password"])) {
                                        $password = md5(trim($_POST["password"]));
                                    } else {
                                        $password = $user_sonuc["password"];
                                    }

                                    if (isset($_POST["re_password"]) && !empty($_POST["re_password"])) {
                                        $repassword = md5(trim($_POST["re_password"]));
                                    } else {
                                        $repassword = $user_sonuc["password"];
                                    }

                                    if (isset($_POST["userabout"]) && !empty($_POST["userabout"])) {
                                        $userabout = trim($_POST["userabout"]);
                                    } else {
                                        $userabout = $user_sonuc["userabout"];
                                    }


                                    if ($password == $repassword) {
                                        if ($username != $user_sonuc["username"]) {
                                            $username_sorgu = mysqli_query($conn, "select * from users  where username='" . $username . "'");
                                            if (mysqli_num_rows($username_sorgu) == 0) {
                                                $update_sql = "update users set firstname='" . $firstname . "' , surname='" . $surname . "' , email='" . $email . "', 
                                userabout='" . $userabout . "', username='" . $username . "', password= '" . $password . "' where id='" . $user_sonuc["id"] . "'";
                                                if (mysqli_query($conn, $update_sql)) {
                                                    session_start();
                                                    $_SESSION["username"] = $username;
                                                    session_write_close();
                                                    $_GET["username"] = $username;
                                                    echo "<script>
                                                    window.location.href='index.php';    
                                                    alert('PROFİLİNİZ GÜNCELLENDİ');
                                                    </script>";
                                                } else {
                                                    echo "Error updating record: " . mysqli_error($conn);
                                                }
                                            } else {
                                                echo "<script>
                                                alert('Bu kullanıcı adı kullanılmaktadır!');
                                                </script>";
                                            }
                                        } else {
                                            $update_sql = "update users set firstname='" . $firstname . "' , surname='" . $surname . "' , email='" . $email . "', 
                                            userabout='" . $userabout . "', username='" . $username . "', password= '" . $password . "' where id='" . $user_sonuc["id"] . "'";
                                            if (mysqli_query($conn, $update_sql)) {
                                                session_start();
                                                $_SESSION["username"] = $username;
                                                session_write_close();
                                                $_GET["username"] = $username;
                                                echo "<script>
                                                window.location.href='index.php';    
                                                alert('PROFİLİNİZ GÜNCELLENDİ');
                                                </script>";
                                            } else {
                                                echo "Error updating record: " . mysqli_error($conn);
                                            }
                                        }
                                    } else {
                                         echo "<script>
                                                alert('Şifreleriniz Eşleşmiyor Lüften Kontrol Edin!');
                                            </script>";
                                    }
                                }
                                ?>
                                <div class="tab-pane" id="add-ihale">
                                    <form role="form-ihale" action="file_upload.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="İhaleBasligi">İhale Basliği</label>
                                            <input type="text" name="urunName" placeholder="Xxxx" id="ihaleBasligi" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="ihaleFiyat">Ürün Fiyatı</label>
                                            <input type="text" name="urunPrice" placeholder="45 $" id="ihaleFiyat" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="ihaleAbouth">Ürün Açıklaması</label>
                                            <textarea style="height: 125px" name="urunDescription" id="ihaleAbouth" class="form-control" placeholder="XXxxxxx"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="ihaleCtgr">Ürün Kategorisi</label>
                                            <input type="text"  id="ihaleCtgr" name="urunCategori" placeholder="Sanat,Bilim,Araba,Okul,Kitap" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="ihaleTime">İhale Bitiş Tarihi</label></br>
                                            <input type="datetime-local" id="ihaleTime" name="ihaleTime" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="ihaleImage">Ürün Fotoğrafı</label></br>
                                            <input type="file" name="files[]" id="ihaleImage" class="form-control">
                                        </div>

                                         
                               <!--         <button class="btn btn-primary waves-effect waves-light w-md" type="submit" name="submit" style="background-color: #ec971f; border-color:#d58512">Ürün Resmi Ekle</button>
                                        <div id="images">

                                        </div>-->
                                        <hr>
                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit" name="submit" style="background-color: #ec971f; border-color:#d58512">Kaydet</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        <?php
        ob_end_flush();
        }
        ?>
        <!-- end row -->
    </div>



    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </script>
    <footer class="page-footer font-small blue">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="#" style="color: #ec971f;"> Texas Software Inc.</a>
        </div>
        <!-- Copyright -->

    </footer>

</body>

</html>