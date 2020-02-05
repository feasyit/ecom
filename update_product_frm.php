<?php 
    require 'connectdb.php';
    
    $pro_id = $_GET['pro_id'];
    $qpro = "SELECT * FROM product WHERE pro_id='$pro_id'";
    $respro = mysqli_query($dbcon, $qpro);
    $rowpro = mysqli_fetch_array($respro, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>แก้ไขข้อมูลสินค้า</title>
        <style>
            label {
                display: block;
            }
        </style>
    </head>    
    <body>
        <form action="product_update.php" method="post" enctype="multipart/forn-data" id="form1">
            <fieldset>
                <legend>แก้ไขสินค้า</legend>
                <label>ซื่อสินค้า: </label><input name="pro_name" type="text" id="pro_name" size="40" value="<?php echo $rowpro['pro_name']; ?>">
                <label>ราคา： </label><input name="pro_price" type="text" id="pro_price" size="20" value="<?php echo $rowpro['pro_price']; ?>">
                <label>วันที่เพิ่มสินค้า: </label><input name="pro_dateadd" type="date" id="pro_dateadd" value="<?php echo $rowpro['pro_dateadd']; ?>">
                <label>สถานะสินค้า:</label>
                <label>
                    <input type="radio" name="pro_status" value="0" id="pro_status_0" <?php if ($rowpro['pro_status']=='0') echo "checked"; ?>>ใช้ซื้อขายได้
                </label>
                <label>
                    <input type="radio" name="pro_status" value="1" id="pro_status_1" <?php if ($rowpro['pro_status']=='1') echo "checked";?>>อยู่ระหว่างปรับปรุง
                </label>
                <label>ประเภทสินค้า: </label>
                <?php
                    $q = "SELECT * FROM producttype";
                    $result = mysqli_query($dbcon, $q);
                ?>
                <select name="pt_id" id="pt_id">

                    <?php 
                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            if ($row[0]==$rowpro['pt_id']) {
                                echo "<option value='$row[0]' selected>$row[1]</option>";
                            } else {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                        }
                    ?>
                </select>
                <br><br>
                
                <input type="hidden" name="pro_id" value="<?php echo $rowpro['pro_id']; ?>">
                <input name="submit" type="submit" id="submit" value="แก้ไขข้อมูล">
            </fieldset>
        </form>
    </body>
</html>
