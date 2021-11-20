<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include 'navbar.php';
    require_once 'config.php';
    $std_id=$_GET['std_id'];
    $sql="SELECT *FROM javfy WHERE std_id='$std_id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);

    if(isset($_POST['submit'])){
        $std_name=$_POST['std_name'];
        $std_tel=$_POST['std_tel'];
        $std_email=$_POST['std_email'];
        $update="UPDATE javfy SET std_name='$std_name',std_tel='$std_tel',std_email='$std_email' WHERE std_id='$std_id'";
        $result=$con->query($update);
        if(!$result){
            echo "<script>
            alert('แก้ไขข้อมูลไม่สำเร็จ');
            window.history.back();
            </script>";
        }else{

            echo "<script>window.location.href='show_student.php'</script>";
        }
    }

    ?>
<div class="container mt-5 w-25">
   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="mb-3 row">
            <label for="" class="col-form-label col-sm-4">ชื่อ-นามสกุล</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="std_name" value="<?php echo $row['std_name'] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-form-label col-sm-4">เบอร์โทรศัพท์</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="std_tel" value="<?php echo $row['std_tel'] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-form-label col-sm-4">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" name="std_email" value="<?php echo $row['std_email'] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-form-label col-sm-4"></label>
            <div class="col-sm-8">
                <input type="submit" class="btn btn-primary" name="submit" value="แก้ไขข้อมูล">
            </div>
        </div>
</form>   
</div> 
</body>
</html>