<?php
session_start();
$kq = "";
if(isset($_POST['dnhapadmin']))
{
    require '../inc/myconnect.php';
    $tk = $_POST['txtdangnhap'];
    $mk = $_POST['txtmatkhau'];

    $sql="SELECT * FROM user  where tai_khoan = '$tk'  and mat_khau = '$mk' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            if($row['role'] === 'admin')
            {
                $_SESSION['tai_khoan'] = $row["tai_khoan"];
                header('Location: index.php');
                $row = $result->fetch_assoc();
                exit();
            }
            else{
                header('Location: ../index.php');
                exit();
            }
        }         
    }
    else
    {
        $kq ="Thông tin không đúng vui lòng kiềm tra lại";
    }

}
?>