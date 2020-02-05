<?php
    require 'connectdb.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>สินค้า</title>
        <style>
            label {
                display: block;
            }
        </style>
    </head>
    <body>
        <h2>ข้อมุลสินค้า</h2>
        <form action="product_insert.php" method="post" enctype="multipart/form-data" id="form1">
            <fieldset>
                <legend>เพิ่มสินค้า</legend>
                <label>ซื้อสินค้า: </label><input name="pro_name" type="text" id="pro_name" size="40">
                <label>ราคา： </label><input name="pro_price" type="text" id="pro_price" size="20">
                <label>วันที่เพิ่มสินค้า: </label><input name="pro_dateadd" type="date" id="pro_dateadd">
                <label>สถานะสินค้า:</label>
                <label>
                    <input type="radio" name="pro_status" value="0" id="pro_status_0">ใช้ซื้อขายได้
                </label>
                <label>
                    <input type="radio" name="pro_status" value="1" id="pro_status_1">อยู่ระหว่างปรับปรุง
                </label>
                <label>ประเภทสินค้า: </label>
                <?php
                    $q = "SELECT * FROM producttype";
                    $result = mysqli_query($dbcon, $q);
                ?>
                <select name="pt_id" id="pt_id">
                    <option value="">---เลือกประเภทสินค้า---</option>
                    <?php 
                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            echo "<option value='$row[0]]'>$row[1]</option>";
                        }
                    ?>
                </select>
                <label>รูปภาพสินค้า</label>
                <input type="file" name="pro_image" />
                <br><br>
                
                <input name="submit" type="submit" id="submit" value="เพิ่มข้อมูล">
            </fieldset>
        </form>
    </body>
</html>
