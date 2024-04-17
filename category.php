<?php
ob_start();
?>
<?php 
	include "login.php"
	?>
<?php 
	include "head.php"
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
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
					<li><a href="index.php">Trang chủ</a></li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="products">
							<?php
							   require 'inc/myconnect.php';
							   $maloai = $_GET["ma_loai"];
							   $result = mysqli_query($conn, "select count(ma_loai) as total from product where ma_loai = '$maloai'" );
							   $row = mysqli_fetch_assoc($result);
							   $total_records = $row['total'];		
							   if($row['total'] == 0)
							   {
								 header('Location: noproduct.php');
							   }					   
							   $offset =1;
							   $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
							   $limit = 6;
							   $total_page = ceil($total_records / $limit);
							   if ($current_page > $total_page){
								   $current_page = $total_page;
							   }
							   else if ($current_page < 1){
								   $current_page = 1;
							   }
							   $start = ($current_page - 1) * $limit;
							   $result = mysqli_query($conn, "SELECT * FROM product where ma_loai = '$maloai' LIMIT $start, $limit " );
	while ($row = mysqli_fetch_assoc($result)){

?>

								<div class="col-lg-4 col-md-4 col-xs-12">
								<div class="product">
								<div class="image"><a href="detail.php?id=<?php echo $row["ma_sp"]?>"><img src="img/<?php echo $row["hinh"]?>" style="width:300px;height:250px"/></a></div>
								<div class="caption">
									<div class="name"><h3><a href="detail.php?id=<?php echo $row["ma_sp"]?>"><?php echo $row["ten_sp"]?></a></h3></div>
									<div class="price"><?php echo $row["don_gia"] ?>.0 VNĐ</div>
								</div>
							</div>
								</div>
								<?php
		}
					?>
							</div>
						</div>
	
					</div>
					<div class="row text-center">
						<ul class="pagination">
						<?php 
			for ($i = 1; $i <= $total_page; $i++){
				if ($i == $current_page){

					   ?>
					   <li class="active"><a href="#"><?php echo $i  ?></a></li>					   
						  <?php 
				}

			?>
			<?php
			if($i != $current_page){
			 ?>	
			 	  <li><?php echo '<a href="category.php?ma_loai='.$maloai.'&page='.$i.'">'.$i.'</a> '; ?></li>
			 <?php
			}
			  ?>	
						  <?php 
			}
						  ?>
						</ul>
					</div>
				
		
				</div>
				<?php 
	
	//include "sidebar.php"
	?>
			</div>
		</div>
	</div>	
	<?php 
	include "footer.php"
	?>
    </body>
</html>
<?php ob_end_flush(); ?>

