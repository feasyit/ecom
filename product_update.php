<?php

    require 'connectdb.php';
    
    $pro_id = $_POST['pro_id'];
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_dateadd = $_POST['pro_dateadd'];
    $pro_status = $_POST['pro_status'];
    $pt_id = $_POST['pt_id'];

    $q = "UPDATE product SET pro_name='$pro_name',pro_price='$pro_price',pro_dateadd='$pro_dateadd',pt_id='$pt_id' WHERE pro_id='$pro_id'";
    $result = mysqli_query($dbcon, $q);
    
    if ($result) {
        echo "แก้ไขข้อมูลเรียบร้อยแล้ว";
        echo "<hr>";
        echo "<a href='show_product.php'>แสดงข้อมูลสินค้า</a>";
    } else {
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);
    