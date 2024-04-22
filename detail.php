<?php
	session_start();
?>
<?php 
	include "head.php";
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
	<div id="page-content" class="single-page">
	<?php
    require 'inc/myconnect.php';
    $id = $_GET["id"];
    $query="SELECT p.ma_sp,p.ten_sp,p.ma_loai,p.hinh,p.don_gia,p.nha_san_xuat,p.mo_ta
    from product p 
    LEFT JOIN category c on c.ma_loai = p.ma_loai
	WHERE  p.ma_sp =".$id;
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if(isset($_POST['submit']))
    {
        $idsp = $_POST["idsp"];
        $sl;
            if(isset($_SESSION['cart'][$idsp]))
            {
                $sl = $_SESSION['cart'][$idsp] +1;
            }
            else
            {
                $sl=1;
            }
            $_SESSION['cart'][$idsp] = $sl;
    }

    ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a></li>
						<li><a href="#"><?php echo $row["ten_sp"]?></a></li>
					</ul>
				</div>
			</div>
			<div class="row">

				<div id="main-content" class="col-md-8">
					<div class="product">
						<div class="col-md-6">
							<div class="image">
								<img src="img/<?php echo $row["hinh"]?>" style="width:300px;height:300px" />
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="caption">
								<div class="name"><h5><?php echo $row["ten_sp"]?></h5></div>
                                <div class="info">
									<ul>
										<li><h5>Nhà sản xuất: <?php echo $row["nha_san_xuat"]?></h5></li>
									</ul>
								</div>
								<div class="price">Giá bán: <?php echo $row["don_gia"]?>.0 VNĐ<span></span></div>
								<div class="well">
                                    <form name="form3" id="ff3" method="POST" action="">
                                        <input type="submit" name="submit" id="add-to-cart" class="btn btn-2" value="Thêm vào giỏ hàng" />
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Mua ngay</a>
                                        <input type="hidden" name="acction" value="them vao gio hang" />
                                        <input type="hidden" name="idsp" value="<?php echo $row["ma_sp"] ?>" />
                                    </form>
								</div>							
								<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
    
	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" style="text-align: center">Thông tin khách hàng</h4>
	  </div>
	  <div class="modal-body">
	  <p>Chức năng mua ngay giúp bạn mua nhanh mà không cần đăng nhập hoặc đặt hàng với một thông tin khác với thông tin trên tài khoản. Tuy nhiên bạn chỉ có thể mua một loại sản phẩm trong một lần đặt hàng, bạn nên đăng nhập để không phải nhập lại thông tin cũng như mua nhiều loại sản phẩm cùng lúc.</p>
	  <form name="form6" id="ff6" method="POST" action="<?php include "cartnow.php" ?>">
	  <div class="form-group">
	  <input type="text" class="form-control" placeholder="Tên:" name="name" id="name" required>
	  </div>
					  <div class="form-group">
						  <input type="email" class="form-control" placeholder="Email :" name="email" id="email" required>
					  </div>
					  <div class="form-group">
						  <input type="tel" class="form-control" placeholder="Điện thoại :" name="phone" id="phone" required>
					  </div>
					  <div class="form-group">
						  <input type="text" class="form-control" placeholder="Địa chỉ :" name="txtdiachi" id="txtdiachi" required>
					  </div>
					  <div class="form-group">
						  <input type="number" class="form-control" placeholder="Số lượng:" name="txtsoluong" id="txtsoluong" required>
					  </div>
					  <div class="form-group">
					  <label><input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose"  required ></label>
					  </div>
					  <div class="form-group">
					  <label> Hình thức thanh toán :<select class="selectpicker" name="hinhthuctt">
										  <option value="ATM">Chuyển khoản</option>
										  <option value="Live">COD</option>
											</optgroup>
									  </select>
									  </lable>
					  </div>
			  
					  <input type="hidden" name="idsp" value="<?php echo $row["ma_sp"] ?>" />
					  <input type="hidden" name="gia" value="<?php echo $row["don_gia"] ?>" />
					  <button type="submit" name="muangay"  class="btn btn-1">Đặt hàng</button>
	  </form>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
	  </div>
	</div>
	
  </div>
                                </div>
							</div>
						</div>
						<div class="clear"></div>
					</div>	
					<div class="product-desc">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#description">Thông tin sản phẩm</a></li>
						</ul>
						<div class="tab-content">
							<div id="description" class="tab-pane fade in active">
								
								<div innerHTML>
                      <p><?php echo $row["mo_ta"]?></p>
                    </div>						
							</div>
							
						</div>
					</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>	

	<?php 
	include "footer.php"
	?>
	<!-- IMG-thumb -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">                
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	
	<script>
	$(document).ready(function(){
		$(".nav-tabs a").click(function(){
			$(this).tab('show');
		});
		$('.nav-tabs a').on('shown.bs.tab', function(event){
			var x = $(event.target).text();         // active tab
			var y = $(event.relatedTarget).text();  // previous tab
			$(".act span").text(x);
			$(".prev span").text(y);
		});
	});
	</script>
</body>
</html>
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

