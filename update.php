<?php
    require 'connectdb.php';
    $pro_id = 2;
    $pro_name = "บะหมี่กึ่งสำเร็จรูป";
    $pro_price = "30.25";
    
    $q = "UPDATE product SET pro_name='$pro_name',pro_price='$pro_price' WHERE pro_id='$pro_id'";
    $result = mysqli_query($dbcon, $q);
    
    if ($result) {
        echo "แก้ไขข้อมูลเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

