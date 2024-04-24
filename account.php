<?php
ob_start();
session_start();
 ?>


<?php 
	include "head.php"
	?>
<?php
$title ="Watch Shop Online";
$name ="Watch Shop";
?>
<?php 
	include "top.php"
    ?>
    <?php 
	include "header.php"
	?>
	<?php 
	include "navigation.php"
	?>
<?php
$tk = "" ;
$mk = "" ;
$kq = "";
if(isset($_POST['submit']))
{
    require 'inc/myconnect.php';
    $tk = $_POST['txtus'] ;
    $mk = $_POST['txtem'];
    $sql="SELECT * FROM user  where tai_khoan = '$tk'  and mat_khau = '$mk'  ";
    $result = $conn->query($sql);
    // echo  $mk;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        $_SESSION['txtus'] = $tk ;
        $_SESSION['HoTen'] = $row["ho_ten"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['dienthoai'] = $row["sdt"];
            header('Location: index.php');
            $row = $result->fetch_assoc();  
        }         
    }
    else
    {
        $kq ="Thông tin không đúng vui lòng kiềm tra lại";
    }
}
?>
<?php
// $name = "" ;
// $email = "" ;
// $dt= "";
// $mk= "";
// $kqdk ="";
// $repass ="";
// $role ="user";

// if(isset($_POST['dangky']))
// {
//     require 'inc/myconnect.php';
//     $name  = $_POST['fullname'] ;
// 	$tk = $_POST['username'];
//     $email = $_POST['email'];
//     $dt = $_POST['phone'];
//     $mk = $_POST['password'];
//     $repass = $_POST['repass'];
//     if($repass != $mk  )
//     {
//         $kqdk = "Mật khẩu nhập lại không chính xác";
//     }
//     else
//     {
//         $sql="INSERT INTO  user (tai_khoan,email,mat_khau,ho_ten,sdt,role) 
//         VALUES ('$tk','$email','$mk' ,'$name','$dt','$role') ";
//         // echo  $mk;
//         if (mysqli_query($conn, $sql)) {
//             $name = "" ;
// 			$tk = "" ;
//             $email = "" ;
//             $dt= "";
//             $mk= "";
//             $repass ="";
// 			$role = "user";
//             $kqdk = "Đăng ký thành công";
//         } else {
//             $kqdk = "Đăng ký không thành công xin hay kiểm tra lại thông tin";
//         }
//     }
//     mysqli_close($conn);
// }
?>
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="account.php">Đăng nhập</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="heading"><h2>Đăng nhập</h2></div>
					<form name="form1" id="ff1" method="POST" action="#">
						<div class="form-group">
							<input type="username" class="form-control" placeholder="Tài khoản" name="txtus" required value="">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Mật khẩu" name="txtem"required value="">
						</div>
						<button type="submit" name="submit" class="btn btn-1" name="login" id="login">Đăng nhập</button>
						<P style="color:red"><?php echo $kq; ?></p>
						<a href="#"></a>
						<br>
						<i>* Bạn chưa có tài khoản? Vui lòng</i><a href="register.php"><i> đăng ký</i></a>
					
					</form>
				</div>
			
			</div>
		</div>
	</div>
	<?php 
	include "footer.php"
	?>
</body>
</html>
<?php ob_end_flush(); ?>
