<?php
ob_start();

 ?>
<?php
 require "login.php";
      if(!isset($_SESSION['txtus']))
       {
           header("Location:account.php");  
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

  <form name="form6" id="ff6" method="POST" action="<?php include 'saveorder.php'?>">
	<div id="page-content" class="single-page">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a style="text-align:center">Xác nhận đơn hàng</a></li>
					</ul>
				</div>
			</div>
			
			<div class="row">
		
			<div class="col-lg-6">
				    <div class="panel panel-default">
					<div class="panel-heading">Thông tin khách hàng</div>
             <div class="panel-body">		 
			 <div class="col-md-8" style="margin-left: 130px;">
			 <label>Tên khách hàng : <?php echo  $_SESSION['HoTen']?></label>
			 <label>Điện thoại: <?php echo  $_SESSION['dienthoai']?></label><br>
			 <label>Email:<?php echo    $_SESSION['email']?></label>     
			 <label><input type="text"  class="form-control" placeholder="Nhập địa chỉ giao hàng   :" name="diachi"  required ></label>
			 <br/>

			<label><input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose"  required ></label>
			<label> Hình thức thanh toán :<select class="selectpicker" name="hinhthuctt">
    										<option value="ATM">Chuyển khoản</option>
    										<option value="Live">COD</option>
  											</optgroup>
										</select>
				</label>	
			 </div>			 
				   </div>		 		 
			</div>								
		</div>        
		<div class="col-lg-5">
		<div class="panel panel-default">
			<div class="panel-heading">Thông tin đơn hàng</div>
             <div class="panel-body">		 
			 <div class="col-md-12">
			 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
      </tr>
    </thead>
    <tbody>
	<?php
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
			<tr>
				<td><?php  echo $s["ten_sp"]?></td>
				<td><?php echo $_SESSION['cart'][$s["ma_sp"]]?></td>
				<td><?php  echo $s["don_gia"]?>.0 VNĐ</td>
			</tr>
			<?php
				$total +=$_SESSION['cart'][$s["ma_sp"]] * $s["don_gia"]  ?>
				<?php 
				}
				?>
	  		<?php 
			}
			?>
    </tbody>
  </table>
  <table class="table">
    <thead>
      <tr>
        <th>Thành tiền:</th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th  name="result"  style="color:red"><strong style="color:red" id="result" name="total"><?php echo  $total    ?>.0 VNĐ</strong></th>  
		<input type="hidden" name="total" id="total" value="" />  
      </tr>
    </thead>
    <tbody>
      <tr>
      </tr>
    </tbody>
  </table>
  </div>
	</div>            
	</div>
		</div>
		</div> 
		</div> 
					<div class="row">
			<div class="panel panel-default">	
			<div class="panel-heading">Sản phẩm (<?php  echo count($_SESSION['cart'])?>)</div>
             <div class="panel-body">		
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
							<!-- <label>Số lượng: </label>  -->
							<input class="form-inline quantity"  type="hidden" name ="qty[<?php echo $s["ma_sp"] ?>]" value="<?php echo $_SESSION['cart'][$s["ma_sp"]]?>"> 
							<hr>
					
							<lable>Số lượng: <?php echo $_SESSION['cart'][$s["ma_sp"]] ?></lable>
							<input type="hidden" name="idsprm" value="<?php echo $s["ma_sp"] ?>" />
						</div>
					</div>

					<div class="clear"></div>
				</div>	

			<?php 
				 $total +=$_SESSION['cart'][$s["ma_sp"]] * $s["don_gia"]?>
				 	<?php 
				}
			}?>
			</div>
			</div>
			</div>	
				<input type="submit" name="Dat" value="Đặt hàng" class="btn btn-1" />	
			</div>
	</div>	
    </form>		
	<?php 
	include "footer.php"
	?>
</body>
</html>
<!-- Lấy ngày hiện tại -->
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>
  <script src="plugins/select2/select2.full.min.js"></script>
<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
      });
</script>
<?php ob_end_flush(); ?>