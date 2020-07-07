<?php 
include("baglanti.php");
   
    $update_sql = "update product set guncelPrice='" . (float)$_POST['inputPrice']  . "', guncelPriceOwner='" . $_POST['username']  . "'  where urun_id='" . (float)$_POST['urun_id']  . "'";
                    if (mysqli_query($conn, $update_sql)) {
                        echo "data updated";
                    }

?>                    
  
