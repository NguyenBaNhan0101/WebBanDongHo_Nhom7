<?php
session_start();
if(isset($_POST['create'])&& !isset($_SESSION['request_sent']))
{
    $_SESSION['request_sent'] = true;
    require '../inc/myconnect.php';
    $name = $_POST['name'];
    $hinhanh = $_FILES['hinhanh']['name'];
    move_uploaded_file($_FILES['hinhanh']['tmp_name'] , '../img/'.$_FILES['hinhanh']['name']);
    $maloai = $_POST['maloai'];
    $gia = $_POST['gia'];
    $nsx = $_POST['nsx'];
    $mota = $_POST['mota'];
    $sql="INSERT INTO  product (ten_sp,hinh,nha_san_xuat,ma_loai,don_gia,mo_ta) 
    VALUES ('$name','$hinhanh','$nsx','$maloai','$gia','$mota') ";
    // echo  $mk;
    if (mysqli_query($conn, $sql)) {
        header('Location: qlysanpham.php');
        exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>