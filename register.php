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
?>
<?php
$name = "" ;
$email = "" ;
$dt= "";
$tk = "";
$mk= "";
$kqdk ="";
$repass ="";
$role ="user";

if(isset($_POST['dangky']))
{
    require 'inc/myconnect.php';
    $name  = $_POST['fullname'] ;
	$tk = $_POST['username'];
    $email = $_POST['email'];
    $dt = $_POST['phone'];
    $mk = $_POST['password'];
    $repass = $_POST['repass'];
    if($repass != $mk  )
    {
        $kqdk = "Mật khẩu nhập lại không chính xác";
    }
    else
    {
        $sql="INSERT INTO  user (tai_khoan,email,mat_khau,ho_ten,sdt,role) 
        VALUES ('$tk','$email','$mk' ,'$name','$dt','$role') ";
        // echo  $mk;
        if (mysqli_query($conn, $sql)) {
            $name = "" ;
			$tk = "" ;
            $email = "" ;
            $dt= "";
            $mk= "";
            $repass ="";
			$role = "user";
            $kqdk = "Đăng ký thành công";
        } else {
            $kqdk = "Đăng ký không thành công xin hay kiểm tra lại thông tin";
        }
    }

    
    mysqli_close($conn);
}
?>
?>
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
                        <li><a href="account.php">Đăng nhập</a></li>
						<li><a href="register.php">Đăng ký</a></li>
					</ul>
				</div>
			</div>
            <div class="col-md-6">
					<div class="heading"><h2> Đăng ký</h2></div>
					<form name="form2" id="ff2" method="post" action="#">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Họ Tên" name="fullname" id="firstname" value="<?php echo $name;?>" required >
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Tài khoản" name="username" id="username" value="<?php echo $tk;?>" required >
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="email" id="email"  value="<?php echo $email;?>" required>
						</div>
						<div class="form-group">
						<input type="number" class="form-control" placeholder="Điện thoại" name="phone" id="phone" value="<?php echo $dt;?>" required >
						</div>
						<div class="form-group">
						<input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password"  value="<?php echo $mk;?>"required >
						</div>
						<div class="form-group">
						<input type="password" class="form-control" placeholder="Mật khẩu nhập lại" name="repass" id="repass" value="<?php echo $repass;?>" required >
						</div>
						<button type="submit" name="dangky" class="btn btn-1">Đăng kí</button>
                        <p style="color:red"><?php echo $kqdk; ?></p>
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