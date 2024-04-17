<?php
ob_start();
?>
<?php
 require "login.php";
      if(!isset($_SESSION['txtus']))
       {
           header("Location:cartnosignin.php");  
       }

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
	if(is_countable($_SESSION['cart']) == 0|| !is_array($_SESSION['cart']) || empty($_SESSION['cart']))
	{
		header('Location: emptycart.php');
		exit;
	}
	?>
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="cart.php">Giỏ hàng</a></li>
					</ul>
				</div>
			</div>
			<div class="cart">
			<p><?php
			$ok=1;
			 if(isset($_SESSION['cart']))
			 {
				 foreach($_SESSION['cart'] as $key => $value)
				 {
					 if(isset($key))
					 {
						$ok=2;
					 }
				 }
			 }
			
			 if($ok == 2)
			 {
				echo "Có ".count($_SESSION['cart']). " sản phẩm trong giỏ hàng ";
			 }
			else
			{
				echo   "<p>Không có sản phẩm nào trong giỏ hàng</p>";
			}
			
			$sl = count($_SESSION['cart']);
			?>
			</p>			
			</div>
			<?php

			require "inc/myconnect.php";
			
			if(isset($_SESSION['cart']))
			{
				foreach($_SESSION['cart'] as $key  => $value)
				{
					$item[]=$key;
				}
				// echo $item;
				$str= implode(",",$item);
			    $query = "SELECT p.ma_sp,p.ten_sp,p.don_gia,p.hinh,p.mo_ta,p.nha_san_xuat
				from product p
				LEFT JOIN category c on c.ma_loai = p.ma_loai
				 WHERE  p.ma_sp  in ($str)";
				$result = $conn->query($query);
				$total=0;
				foreach($result as $s)
				{
			?>

			<div class="row">
				<form name="form5" id="ff5" method="POST" action="updatecart.php">
					<div class="product well">
						<div class="col-md-3">
							<div class="image">
								<img src="img/<?php  echo $s["hinh"]?>" style="width:300px;height:300px" />
							</div>
						</div>
						<div class="col-md-9">
							<div class="caption">
								<div class="name"><h3><a href="detail.php?id=<?php  echo $s["ma_sp"]?>"><?php  echo $s["ten_sp"]?></a></h3></div>
								<div class="info">	
									<ul>
										<li>Nhà sản xuất: <?php  echo $s["nha_san_xuat"]?></li>
									</ul>
								</div>
									<div class="price"><?php  echo $s["don_gia"]?>.0 VNĐ</div>
								<label>Số lượng: </label> 
								<input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max ="99" type="number" name ="qty[<?php echo $s["ma_sp"] ?>]" value="<?php echo $_SESSION['cart'][$s["ma_sp"]]?>"> 
								<div>
									<input type="submit" name="update" style="margin-top:31px"  value="Cập nhật" class="btn btn-2" />
								</div>
								<hr>
								<input type="submit" name="remove" value="Xóa sản phẩm này" class="btn btn-default pull-right" />	
								<input type="hidden" name="idsprm" value="<?php echo $s["ma_sp"] ?>" />
										<label style="color:red">Thành tiền: <?php ;
									echo  $_SESSION['cart'][$s["ma_sp"]] * $s["don_gia"]?>.0 VNĐ</label> 
							</div>
						</div>
						<div class="clear"></div>
					</div>	
				</form>
								<?php 
				              		$total +=$_SESSION['cart'][$s["ma_sp"]] * $s["don_gia"]?>
				<?php 
					}
				?>
				<?php 
					}
				?>
			</div>
			<div class="row">
			<a href="removeallcart.php" class="btn btn-2" style="margin-bottom:31px">Xóa hết giỏ hàng</a>
				<div class="col-md-4 col-md-offset-8 ">
					<center><a href="index.php" class="btn btn-1" style="margin-left:-76px">Chọn những sản phẩm khác</a></center>
				</div>
			<div class="row">
				<div class="pricedetails">
					<div class="col-md-4 col-md-offset-8" >
						<table style="margin-right:31px">
							<h6>Chi tiết hóa đơn</h6>
							<tr>
								<td>Số lượng sản phẩm </td>
								<td><?php echo $sl ?></td>
							</tr>
							<tr style="border-top: 1px solid #333">
								<td><h5>Tổng cộng</h5></td>
								<td><?php echo $total ?>.0</td>
							</tr>
						</table>
						<center><a href="dathang.php" class="btn btn-1">Đặt hàng</a></center>
					</div>
				</div>
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

