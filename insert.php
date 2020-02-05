<?php
    require 'connectdb.php';
    $pt_name = 'หมวก';
    $query = "INSERT INTO producttype (pt_id,pt_name) VALUES ('','$pt_name')";
    $result = mysqli_query($dbcon, $query);
    if ($result) {
        echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาด". mysqli_error($dbcon);
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

