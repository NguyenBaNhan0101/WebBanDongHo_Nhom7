<div class="row">
			<div class="col-lg-12">
				<div class="heading"><h2>Sản phẩm</h2></div>
				<div class="products">
				<?php
					require 'inc/myconnect.php';
					$result = mysqli_query($conn, 'select count(ma_sp) as total from product' );
					$row = mysqli_fetch_assoc($result);
					$total_records = $row['total'];		
					if($row['total'] == 0)
					{
					  header('Location: noproduct.php');
					}					   
					$offset =1;
					$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
					$limit = 4;
					$total_page = ceil($total_records / $limit);
					if ($current_page > $total_page){
						$current_page = $total_page;
					}
					else if ($current_page < 1){
						$current_page = 1;
					}		 
					$start = ($current_page - 1) * $limit;
					
					$query="SELECT * from product ORDER BY ma_sp DESC LIMIT $start, $limit;";
					$rs = $conn->query($query);
					if ($rs->num_rows > 0) {
					while($row = $rs->fetch_assoc()) {

					?>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="product">
							<div class="image"><a href="detail.php?id=<?php echo $row["ma_sp"]?>"><img src="img/<?php echo $row["hinh"]?>" style="width:300px;height:300px"/></a></div>
							<div class="caption">
								<div class="name"><h3><a href="detail.php?id=<?php echo $row["ma_sp"]?>"><?php echo $row["ten_sp"]?></a></h3></div>
								<div class="price"><?php echo $row["don_gia"] ?>.0 VNĐ</div>
							</div>
						</div>
		
					</div>
					<?php
	}
}
				?>
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
			 	  <li><?php echo '<a href="index.php?page='.$i.'">'.$i.'</a> '; ?></li>
			 <?php
			}
			  ?>	
						  <?php 
			}
						  ?>
						</ul>
					</div>
				
		
				</div>