<?php
    require_once 'config.php';
    $sql="SELECT * FROM subject";
    $result = $con->query($sql);  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php 
include 'navbar.php';
?>
    <div class="container mt-5">
        <a href="add_subject.php" class="btn btn-primary mx-auto">+เพิ่มข้อมูล</a><br><br>
        <table class="table table-striped">
            <tr class="bg-primary">

            <th>ลำดับที่</th>
            <th>รหัสวิชา</th>
            <th>ชื่อวิชา</th>
            <th>ชัวโมงปฏิบัติ</th>
            <th>ชั่วโมงทฤษฎี</th>
            <th>หน่วยกิต</th>
            <th>ครูผู้สอน</th>
            <th>การจัดการ</th>
            </tr>
            
            <?php
                $i = 1;
                while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['sub_id']  ?></td>
                <td><?php echo $row['sub_name']  ?></td>
                <td><?php echo $row['t_hour']  ?></td>
                <td><?php echo $row['p_hour']  ?></td>
                <td><?php echo $row['credit']  ?></td>
                <td><?php echo $row['teacher']  ?></td>
                <td>
                    <a href="edit_sub.php?sub_id=<?php echo $row['sub_id']?>" class="btn btn-success">Edit</a>
                    <a href="del_sub.php?sub_id=<?php echo $row['sub_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php 
        $i++;
        } ?>
        </table>

    </div>
    
</body>
</html>