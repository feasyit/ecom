<?php
    require 'connectdb.php';
    
    $q = "SELECT * FROM product INNER JOIN producttype ON product.pt_id=producttype.pt_id ORDER BY product.pt_id";
    $result = mysqli_query($dbcon, $q);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>แสดงรายการสินค้า</title>
        <style>
            table,th,td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style> 
    </head>
    <body>
        <h2>รายการสินค้า</h2>
        <table style="width: 900px">
            <tr>
                <th>รหัสสินค้า</th>
                <th>ซื่อสินค้า</th>
                <th>ราคา</th>
                <th>วันที่เพิ่ม</th>
                <th>หมวดสินค้า</th>
                <th>รูปภาพ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {                    
            ?>
            <tr>
                <td><?php echo $row['pro_id']; ?></td>
                <td><?php echo $row['pro_name']; ?></td>
                <td><?php echo number_format ($row['pro_price'],2); ?></td>
                <td><?php echo $row['pro_dateadd']; ?></td>
                <td><?php echo $row['pt_name'];?></td>
                <td><img src="images/<?php echo $row['pro_image']; ?>" width="100px" height="100px"></td>
                <td><a href="update_product_frm.php?pro_id=<?php echo $row['pro_id']; ?>">แก้ไข</a></td>
                <td><a href="delete_product.php?pro_id=<?php echo $row['pro_id']; ?>">ลบ</a></td>
            </tr>
            <?php 
                }
                mysqli_free_result($result);
                mysqli_close($dbcon);
            ?>
            
        </table>
    </body>
</html>
