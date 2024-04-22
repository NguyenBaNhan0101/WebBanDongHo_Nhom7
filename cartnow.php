
<?php 
require "inc/myconnect.php";
if(isset($_POST['muangay']))
			{
				// echo $item;
                $total="";
                $email =  $_POST['email']; 
                $ngaygiao = $_POST['date'];
                $tenkh = $_POST['name']; 
                $diachi = $_POST['txtdiachi'];
                $dienthoai =  $_POST['dienthoai']; 
                $hinhthucthanhtoan = $_POST['hinhthuctt']; 
                $sql1="INSERT INTO orders (email,ten_kh,dien_thoai,dia_chi,ngay_giao,hinh_thuc)
                VALUES ('$email','$tenkh','$dienthoai','$diachi','$ngaygiao','$hinhthucthanhtoan');";
               if ($conn->query($sql1) === TRUE) 
                {
                       $masp= $_POST['idsp']; 
                       $dongia= $_POST['gia']; 
                       $sl= $_POST['txtsoluong'];
                       $thanhtien =  $sl* $dongia;
                       $hd =  mysqli_insert_id($conn);
                       $sql2="INSERT INTO  orderdetail (id_hd,ma_sp,so_luong,don_gia,thanh_tien)
                       VALUES ('$hd ','$masp' ,'$sl','$dongia','$thanhtien');";         
       
                if ($conn->query($sql2) === TRUE) {
                    // destroy the session 
                    session_destroy(); 
                } else {
                    echo "Error: " . $sql2 . "<br>" . $conn->error;
                }
                                }

        }
			?>
