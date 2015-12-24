<?php 
session_start();
require("php/quyenadmin.php");
require("php/sql.php");
require("php/giatien.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="admin1.css">
	<script type="text/javascript" src="java/js1.js"></script>
	<link rel="stylesheet" href="font/css/font-awesome.min.css">
	<script src="sweetalert2/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert2/dist/sweetalert2.css">
</head>
<body>
	<header>
		<section id="logo">Shop Bán điện thoại</section>
		<section id='timkiem'>
			<?php
			if(isset($_GET['ql']) && $_GET['ql']!='phanhoi') {
				$a = $_GET['ql'];
				echo "<form method='post' action='admin.php?ql=$a' ><input placeholder='Tìm kiếm...' type='text' name='timkiem' > <input type='submit' value='Tìm kiếm' name='oke' ></form>";
			}
			?>
		</section>
		<section id="outandtime">
			<p><i class="fa fa-globe"></i> <a href="index.php">Truy cập website </a></p>
			<p><i class="fa fa-user"></i> Xin chào <?php $a = $_SESSION['fullname']; echo $a ; ?></p>
			<p>Bây giờ là: <input type="text" id="clock" disabled /> </p>
			<script>
				var int=self.setInterval(function(){clock()},1000);
				function clock()
				{
					var d=new Date();
					var t=d.toLocaleTimeString();
					document.getElementById("clock").value=t;
				}
			</script>
			<p onclick="xacnhan();"><i class="fa fa-sign-out"></i> Đăng xuất </p>
		</section>
		<ul>
			<li class="quanli"><a href="?ql=thanhvien" <?php if(isset($_GET['ql']) && ($_GET['ql']=='thanhvien')) {
				echo "style='background:#F77C16'";
			} ?>>Thành Viên</a></li>
			<li class="quanli"><a href="?ql=sanpham" <?php if(isset($_GET['ql']) && ($_GET['ql']=='sanpham')) {
				echo "style='background:#F77C16'";
			} ?>>Sản Phẩm</a></li>
			<li class="quanli"><a href="?ql=donhang" <?php if(isset($_GET['ql']) && ($_GET['ql']=='donhang')) {
				echo "style='background:#F77C16'";
			} ?>>Đơn Hàng</a></li>
			<li class="quanli"><a href="?ql=phanhoi" <?php if(isset($_GET['ql']) && ($_GET['ql']=='phanhoi')) {
				echo "style='background:#F77C16'";
			} ?>>Phản Hồi</a></li>
		</ul>
	</header>
	<article>
		<?php
		if (isset($_GET['ql'])) {
			$a = $_GET['ql'];
			switch ($a) {
				case 'thanhvien':
				include("php/list_user.php");
				break;
				case 'sanpham':
				include("php/list_sp.php");
				break;
				case 'donhang':
				include("php/donhang.php");
				break;
				case 'phanhoi':
				include("php/phanhoi.php");
				break;
				default:
				include("php/list_user.php");
				break;
			}
		}
		?>
	</article>
</body>
</html>
