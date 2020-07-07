<?php 
include("baglanti.php");
session_start();
session_write_close();
// Check if form was submited 
if(isset($_POST['submit'])) { 

    if(isset($_POST['urunName']) && !empty($_POST['urunName'])){
        if(isset($_POST['urunPrice']) && !empty($_POST['urunPrice'])){
            if(isset($_POST['urunCategori']) && !empty($_POST['urunCategori'])){
                if(isset($_POST['urunDescription']) && !empty($_POST['urunDescription'])){
                    if(isset($_POST['ihaleTime']) && !empty($_POST['ihaleTime'])){

                    // Configure upload directory and allowed file types 
                    $upload_dir = 'uploads/'.DIRECTORY_SEPARATOR; 
                    $allowed_types = array('jpg', 'png', 'jpeg', 'gif'); 
                    // Define maxsize for files i.e 2MB 
                    $maxsize = 2 * 1024 * 1024; 

                    // Checks if user sent an empty form 
                    if(!empty(array_filter($_FILES['files']['name']))) { 

                        // Loop through each file in files[] array 
                        foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
                            
                            $file_tmpname = $_FILES['files']['tmp_name'][$key]; 
                            $file_name = $_FILES['files']['name'][$key]; 
                            $file_size = $_FILES['files']['size'][$key]; 
                            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 

                            // Set upload file path 
                            $filepath = $upload_dir.$file_name; 

                            // Check file type is allowed or not 
                            if(in_array(strtolower($file_ext), $allowed_types)) { 

                                // Verify file size - 2MB max 
                                if ($file_size > $maxsize)		 
                                    echo "Error: File size is larger than the allowed limit."; 

                                // If file with name already exist then append time in 
                                // front of name of the file to avoid overwriting of file 
                                if(file_exists($filepath)) { 
                                    $filepath = $upload_dir.time().$file_name; 
                                    
                                    if( move_uploaded_file($file_tmpname, $filepath)) { 
                                        echo "{$file_name} successfully uploaded <br />"; 
                                        $insert_sql = "insert into product (urunname,description,price,imagepath,category,userid,guncelPrice,endTime) values ('".$_POST['urunName']."','".$_POST['urunDescription']."','".$_POST['urunPrice']."','".$filepath."','".$_POST['urunCategori']."','".$_SESSION["user_id"]."','".$_POST['urunPrice']."','".$_POST['ihaleTime']."')";
                                        if (mysqli_query($conn, $insert_sql)) {
                                            echo "<script>
                                            window.location.href='index.php';    
                                            alert('IHALE EKLENDI');
                                            </script>";
                                        }    
                                    } 
                                    else {					 
                                        echo "Error uploading {$file_name} <br />"; 
                                    } 
                                } 
                                else { 
                                
                                    if( move_uploaded_file($file_tmpname, $filepath)) { 
                                        echo "{$file_name} successfully uploaded <br />"; 
                                        $insert_sql = "insert into product (urunname,description,price,imagepath,category,userid,guncelPrice,endTime) values ('".$_POST['urunName']."','".$_POST['urunDescription']."','".$_POST['urunPrice']."','".$filepath."','".$_POST['urunCategori']."','".$_SESSION["user_id"]."','".$_POST['urunPrice']."','".$_POST['ihaleTime']."')";
                                        if (mysqli_query($conn, $insert_sql)) {
                                            echo "<script>
                                            window.location.href='index.php';    
                                            alert('IHALE EKLENDI');
                                            </script>";
                                        }    
                                    } 
                                    else {					 
                                        echo "Error uploading {$file_name} <br />"; 
                                    } 
                                } 
                            } 
                            else { 
                                
                                // If file extention not valid 
                                echo "Error uploading {$file_name} "; 
                                echo "({$file_ext} file type is not allowed)<br / >"; 
                            } 
                        } 
                    } else{ 
                        echo    "<script>
                                window.location.href='profile.php?username=".$_SESSION["username"]."';    
                                alert('LÜTFEN FOTOĞRAF SEÇİNİZ');
                                </script>";
                    } 
                }else{
                    echo    "<script>
                                window.location.href='profile.php?username=".$_SESSION["username"]."';    
                                alert('LÜTFEN IHALE BITIS TARIHI GIRINIZ');
                                </script>";
                }

                }else{
                    echo    "<script>
                                window.location.href='profile.php?username=".$_SESSION["username"]."';    
                                alert('LÜTFEN URUN AÇIKLAMASI GIRINIZ');
                                </script>";
                }

            }else{
                echo    "<script>
                                window.location.href='profile.php?username=".$_SESSION["username"]."';    
                                alert('LÜTFEN URUN KATEGORISI GIRINIZ');
                                </script>";
            }
        }else{
            echo    "<script>
                                window.location.href='profile.php?username=".$_SESSION["username"]."';    
                                alert('LÜTFEN URUN FIYATI GIRINIZ');
                                </script>";
        }

    }else{
        echo    "<script>
                                window.location.href='profile.php?username=".$_SESSION["username"]."';    
                                alert('LÜTFEN URUN ADINI GIRINIZ');
                                </script>";
    }
	
}
