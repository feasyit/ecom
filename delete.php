<?php
    require 'connectdb.php';
    
    $pro_id = 2;
    
    $q = "DELETE FROM product WHERE pro_id='$pro_id'";
    $result = mysqli_query($dbcon, $q);
    
    if ($result) {
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาด". mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

