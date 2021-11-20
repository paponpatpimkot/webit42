<?php
    require_once 'config.php';
    $sql="SELECT * FROM javfy";
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
        <a href="add_student.php" class="btn btn-primary mx-auto">+เพิ่มข้อมูล</a><br><br>
        <table class="table table-striped">
            <tr class="bg-primary">

            <th>ลำดับที่</th>
            <th>เลขประจำตัว</th>
            <th>ชื่อ-นามสกุล</th>
            <th>เบอร์โทร</th>
            <th>Email</th>
            <th>การจัดการ</th>
            </tr>
            
            <?php
                $i = 1;
                while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['std_id']  ?></td>
                <td><?php echo $row['std_name']  ?></td>
                <td><?php echo $row['std_tel']  ?></td>
                <td><?php echo $row['std_email']  ?></td>
                <td>
                    <a href="edit_std.php?std_id=<?php echo $row['std_id']?>" class="btn btn-success">Edit</a>
                    <a href="del_std.php?std_id=<?php echo $row['std_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>

            </tr>
            <?php 
        $i++;
        } ?>
        </table>

    </div>
    
</body>
</html>