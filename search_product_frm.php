<?php
    require 'connectdb.php';
    
    $pro_search = $_POST['pro_search'];
    $p = '%'.$pro_search.'%';
    $q = "SELECT * FROM product WHERE pro_name LIKE '$p'";
    $result = mysqli_query($dbcon, $q);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ค้นหาข้อมูลสินค้า</title>
        <style>
            table,th,td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>   
    </head>
    <body>
        <h2>ค้นหาข้อมูลสินค้า</h2>
        <form action="search_product_frm.php" method="post">
            <label>ชื่อสินค้า： </label><input type="text" size="40px" name="pro_search" />
            <input name="submit" type="submit" id="submit" value="ค้นหาข้อมูล">
        </form>
        <br>
        <table style="width: 500px;">
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคาสินค้า</th>
            </tr>
            <?php 
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['pro_id']; ?></td>
                <td><?php echo $row['pro_name'] ;?></td>
                <td><?php echo number_format($row['pro_price'],2) ;?></td>
            </tr>
            <?php
                }
                mysqli_close($dbcon);
            ?>
    </body>
</html>
