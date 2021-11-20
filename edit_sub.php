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
    $sub_id=$_GET['sub_id'];
    $sql="SELECT *FROM subject WHERE sub_id='$sub_id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);

    if(isset($_POST['submit'])){
        $sub_name=$_POST['sub_name'];
        $t_hour=$_POST['t_hour'];
        $p_hour=$_POST['p_hour'];
        $credit=$_POST['credit'];
        $teacher=$_POST['teacher'];
        $update="UPDATE subject SET sub_name='$sub_name',t_hour='$t_hour',p_hour='$p_hour',credit='$credit',teacher='$teacher' WHERE sub_id='$sub_id'";
        $result=$con->query($update);
        if(!$result){
            echo "<script>
            alert('แก้ไขข้อมูลไม่สำเร็จ');
            window.history.back();
            </script>";
        }else{

            echo "<script>window.location.href='show_subject.php'</script>";
        }
    }

    ?>
<div class="container mt-5 w-25">
   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
   <div class="mb-3">
            <label for="" class="form-label ">รหัสวิชา</label>
            <input type="text" class="form-control" name="sub_id" value="<?php echo $row['sub_id'] ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ชื่อวิชา</label>
            <input type="text" class="form-control"  name="sub_name" value="<?php echo $row['sub_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ชั่วโมงปฏิบัติ</label>
            <input type="text" class="form-control"  name="t_hour" value="<?php echo $row['t_hour'] ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ชั่วโมงทฤษฎี</label>
            <input type="text" class="form-control"  name="p_hour" value="<?php echo $row['p_hour'] ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">หน่วยดิต</label>
            <input type="text" class="form-control"  name="credit" value="<?php echo $row['credit'] ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ครูผู้สอน</label>
            <input type="text" class="form-control"  name="teacher" value="<?php echo $row['teacher'] ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label"></label>
            <input type="submit" class="btn btn-primary" name="submit" value="แก้ไขข้อมูล">
        </div>
</form>   
</div> 
</body>
</html>