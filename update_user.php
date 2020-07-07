<?php

include("baglanti.php");

$update_sql = "update users set firstname='" . $firstname . "' , surname='" . $surname . "' , email='" . $email . "',
userabout='" . $userabout . "', username='" . $username . "', password= '" . $password . "' where id='" . $user_sonuc["id"] . "'";
if (mysqli_query($conn, $update_sql)) {
$_SESSION["username"]=$username;
} else {
echo "Error updating record: " . mysqli_error($conn);
}
?>