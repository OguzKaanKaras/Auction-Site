<?php 
include("baglanti.php");
   
$insert_sql = "insert into comments (urun_id,commentOwner,comment) values ('".$_POST['urun_id']."','".$_POST['username']."','".$_POST['comment']."')";
if (mysqli_query($conn, $insert_sql)) {
    echo "yorum eklendi";
}    

?>    