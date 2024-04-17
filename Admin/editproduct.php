<?php
ob_start();
?>
<?php 
 include "head.php";
?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <?php 
 include "Header.php";
?> 
    <?php 
 include "aside.php";
?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php
   require '../inc/myconnect.php';
   //lay san pham theo id
   $id = $_GET["id"];
   $query = "SELECT p.ma_sp,p.ten_sp,p.don_gia,p.hinh,p.mo_ta,p.nha_san_xuat
				from product p
				LEFT JOIN category c on c.ma_loai = p.ma_loai
	WHERE  p.ma_sp =".$id;
   $result = $conn->query($query);
$row = $result->fetch_assoc();

?>
        <section class="content-header">
          <h1>
            Sửa
            <small>Sản phẩm</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang quản trị</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Sửa Sản phẩm</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal"  method="POST" action="<?php include 'xulysuasp.php'?>" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?php echo $row["ten_sp"] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Hình ảnh</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinhanh" value="<?php echo $row["hinh"] ?>">
                      </div>
                      </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nhà sản xuất</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nsx" value="<?php echo $row["nha_san_xuat"] ?>" required>
                      </div>
                    </div>
                      <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Ảnh hiện tại:   </label>
                        <div class="col-sm-10">
                      <img src="../img/<?php echo $row["hinh"]?>" style="width:300px;height:300px">
                        </div>
                      </div>
                      <input type="hidden" class="form-control" name="anh" value="<?php echo $row["hinh"] ?>">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $row["ma_sp"] ?>">
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Loại</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="maloai">
                      <!-- <option selected="selected" value="<?php echo $row["ma_loai"] ?>"><?php echo $row["ten_loai"] ?></option> -->
                      <?php
                         require '../inc/myconnect.php';
                         $sqls="SELECT ma_loai,ten_loai from category where ma_loai !=3".$row["ma_loai"] ;
                         $results = $conn->query($sqls); 
                         if ($results->num_rows > 0) {
                          // output data of each row
                          while($rows = $results->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $rows["ma_loai"] ?>"><?php echo $rows["ten_loai"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Giá</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="gia" required value="<?php echo $row["don_gia"] ?>">
                    </div>
                    </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                    <textarea id="editor1" name="mota" rows="10" cols="80">
                    <?php echo $row["mo_ta"] ?>
                    </textarea>
                    </div>
                  </div>
               
                  <div class="box-footer">
                  <a href="qlysanpham.php"><button type="button" name="cancel" class="btn btn-default">Quay về</button></a>
                    <button type="submit" name="Edit" class="btn btn-info pull-right">Lưu</button>
                    </div><!-- /.box-body -->
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            <!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
           
      <?php 
      include "footer.php";
     ?>

      </div><!-- /.content-wrapper -->
  
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>

