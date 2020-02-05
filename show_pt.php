<?php
    require 'connectdb.php';
    $q = "SELECT * FROM producttype";
    $result = mysqli_query($dbcon, $q);
    if ($result) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "รหัสหมวดสินค้า".$row['pt_id']."<br>";
            echo "รายละเอียดหมวดสินค้า".$row['pt_name']."<br>";
            echo "<hr>";            
        }
        mysqli_free_result($result);
        
    } else {
        echo "ไม่สามารถแสดงข้อมูลได้ เกิดข้อผิดพลาด";
    }
    
    mysqli_close($dbcon);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

