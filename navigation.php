<nav id="menu" class="navbar">
		<div class="container">
			<div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
			  <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Trang chủ</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Danh sách hãng</a>
						<div class="dropdown-menu">
							<div class="dropdown-inner">
								<ul class="list-unstyled">
								<?php
									require 'inc/myconnect.php';
									$laydanhsachsp="SELECT ma_loai as ma_loai,ten_loai from category";
									$rstenloai = $conn->query($laydanhsachsp);
									if ($rstenloai->num_rows > 0) {
										while($row = $rstenloai->fetch_assoc()) {

								?>
										<li><a href="category.php?ma_loai=<?php echo $row["ma_loai"]?>"><?php echo $row["ten_loai"]?></a></li>
										<?php
											}
										}
										?>
								</ul>
								<li><a href="cart.php">Giỏ hàng</a></li>
								<li><a href="contact.php">Liên hệ</a></li>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>