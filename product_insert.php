<?php
    require 'connectdb.php';
    
    if (empty($_POST['pro_name'])){
        echo "กรุณากรอกข้อมูลสินค้า";
        exit();
    } else {
        $pro_name = mysqli_real_escape_string($dbcon,$_POST['pro_name']);
    }
        
    $pro_price = $_POST['pro_price'];
    $pro_dateadd = $_POST['pro_dateadd'];
    $pro_status = $_POST['pro_status'];
    $pt_id = $_POST['pt_id'];
    
    //upload image
    $ext = pathinfo(basename($_FILES['pro_image']['name']), PATHINFO_EXTENSION);
    $new_image_name = 'img_'.uniqid().".".$ext;
    $image_path = "images/";
    $upload_path = $image_path.$new_image_name;
    
    //uploading
    $success = move_uploaded_file($_FILES['pro_image']['tmp_name'],$upload_path);
    if ($success==FALSE) {
        echo "ไม่สามารถ upload รูปภาพได้";
        exit();
    }
    
    $pro_image = $new_image_name;
    
$q = "INSERT INTO product (pro_name,pro_price,pro_dateadd,pro_status,pt_id,pro_image) VALUES ('$pro_name','$pro_price','$pro_dateadd','$pro_status','$pt_id','$pro_image')";
$result = mysqli_query($dbcon, $q);

if ($result) {
    echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_error($dbcon);
}

mysqli_close($dbcon);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

