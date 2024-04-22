<?php 
require "inc/myconnect.php";
if(isset($_POST['Dat']))
			{
             if(isset($_SESSION['cart']))
            {

				foreach($_SESSION['cart'] as $key  => $value)
				{
					$item[]=$key;
				}
                $str= implode(",",$item);
			    $query = "SELECT p.ma_sp,p.ten_sp,p.don_gia,p.hinh,p.mo_ta,p.nha_san_xuat
				from product p
				LEFT JOIN category c on c.ma_loai = p.ma_loai
                -- LEFT JOIN orders o on o.ma_sp = p.ma_sp
                -- LEFT JOIN orderdetail o1 on o1.id_hd = o.id_hd
				 WHERE  p.ma_sp  in ($str)";
				$result = $conn->query($query);
                $total= $_POST['total'];
                $email =  $_SESSION['email'];
                $ngaygiao = $_POST['ngay_giao'];
                $tenkh = $_SESSION['HoTen'] ;
                $diachi = $_POST['diachi'];
                $dienthoai =  $_SESSION['dienthoai'];
                $hinhthuctt = $_POST['hinhthuctt']; 
                if( $total != 0)
                {
                $sql1="INSERT INTO orders (email,ten_kh,dien_thoai,dia_chi,ngay_giao,hinh_thuc,thanh_tien)
                VALUES ('$email','$tenkh','$dienthoai','$diachi','$ngaygiao','$hinhthuctt','$total');";
                if ($conn->query($sql1) === TRUE) 
                {
                    foreach($result as $s)
                    {
                        $masp= $s["ma_sp"];
                       $sl= $_SESSION['cart'][$s["ma_sp"]];
                       $dongia = $s['don_gia'];
                       $thanhtien =  $sl* $dongia;
                       $hd[] =  mysqli_insert_id($conn);
                       $str= implode(",",$hd);
                       $sql2="INSERT INTO  orderdetail (id_hd,ma_sp,so_luong,don_gia,thanh_tien) 
                       VALUES ('$str','$masp' ,'$sl','$dongia','$thanhtien');";         
       
                        if ($conn->query($sql2) === TRUE) {
                            header('Location: confirmcart.php');
                            unset($_SESSION['cart']);
                        } else {
                            echo "Error: " . $sql2 . "<br>" . $conn->error;
                        }
                    }
                }else {
                    echo "Error: " . $sql1 . "<br>" . $conn->error;
                }
               }
            }
        }
?>
