<?php

    require 'connectdb.php';
    
    $pro_id = $_GET['pro_id'];
    
    $qdel = "SELECT pro_image FROM product WHERE pro_id='$pro_id'";
    $resdel = mysqli_query($dbcon, $qdel);
    $pro_image = mysqli_fetch_array($resdel, MYSQLI_NUM);
    $filename = $pro_image[0];
    
    @unlink('images/'.$filename);
    
    $q = "DELETE FROM product WHERE pro_id='$pro_id'";
    $result = mysqli_query($dbcon, $q);
    
    if ($result) {
        header("Location: show_product.php");
    } else {
        echo "เกิดข้อผิดพลาดในการลบข้อมูล" . mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);