<?php 
    if(isset($_POST['Edit']))
    {
    require '../inc/myconnect.php';
    move_uploaded_file($_FILES['hinhanh']['tmp_name'] , '../images/'.$_FILES['hinhanh']['name']);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $maloai = $_POST['maloai'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $anh =  $_POST['anh'];
    $nsx = $_POST['nsx'];
    if($hinhanh == null)
    {
        $sql = "UPDATE product SET ten_sp='$name', hinh='$anh', nha_san_xuat='$nsx', ma_loai= '$maloai',don_gia='$gia', mo_ta='$mota'
        WHERE ma_sp= '$id ' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: qlysanpham.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    else{
        $sql = "UPDATE product SET ten_sp='$name', hinh='$anh', nha_san_xuat='$nsx', ma_loai= '$maloai',don_gia='$gia', mo_ta='$mota'
        WHERE ma_sp= '$id ' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: qlysanpham.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        }
    }
  
?>
