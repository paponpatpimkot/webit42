<?php
    require_once 'config.php';
    $sub_id=$_GET['sub_id'];
    $sql="DELETE FROM subject WHERE sub_id='$sub_id'";
    $result=$con->query($sql);
    if(!$result){

        echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
    }else{
        echo "<script>window.location.href='show_subject.php'</script>";

    }
?>