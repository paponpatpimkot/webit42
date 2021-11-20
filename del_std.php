<?php
    require_once 'config.php';
    $std_id=$_GET['std_id'];
    $sql="DELETE FROM javfy WHERE std_id='$std_id'";
    $result=$con->query($sql);
    if(!$result){

        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }else{
        echo "<script>window.location.href='show_student.php'</script>";

    }
?>