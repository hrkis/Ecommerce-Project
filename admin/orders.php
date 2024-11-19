<?php include ( "../inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['admin_login'])) {
	header("location: login.php");
	$user = "";
}
else {
	$user = $_SESSION['admin_login'];
	$result = mysqli_query($con, "SELECT * FROM admin WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$utype_db=$get_user_email['type'];
}

?>


<!doctype html>
<html>
	<head>
		<title>Welcome to KIS online shop</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body class="home-welcome-text" style="">
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="logout.php">LOG OUT</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">Hi '.$uname_db.' <span style="color: #fff;">'. $utype_db.'</span></a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 60px; width: 130px;" src="../image/cart.png">
				</a>
			</div>
			<div class="">
				<div id="srcheader">
					<form id="newsearch" method="get" action="http://www.google.com">
					        <input type="text" class="srctextinput" name="q" size="21" maxlength="120"  placeholder="Search Here..."><input type="submit" value="search" class="srcbutton" >
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
		<div class="categolis">
			
			<table>
				<tr>
					<th>
						<a href="index.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;font-size: 15px;">Home</a>
					</th>
					<th><a href="addproduct.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;font-size: 15px;">Add Product</a></th>
					
					<th><a href="orders.php" style="text-decoration: none;color: #040403;padding: 4px 12px;border-radius: 12px;font-size: 15px;">Orders</a></th>
			
					<?php 
						if($utype_db == 'admin'){
							echo '<th><a href="report.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;font-size: 15px;">Products</a></th>
								<th><a href="newadmin.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;font-size: 15px;">New Admin</a></th>';
						}
					?>

				</tr>
			</table>
		</div>
		<div>
			<table class="rightsidemenu">
				<tr style="font-weight: bold;color:#fff;" colspan="10" bgcolor="#000">
					<th width="10%">Id</th>
					<th width="10%">Product Id</th>
					<th width="20%">Order Place</th>
					<th width="10%">Order Status</th>
					<th width="20%">Order Date</th>
					<th width="20%">User Name</th>
					<th width="10%">User Mobile</th>
					<th width="10%">User Email</th>
					<th width="10%">Image</th>
				</tr>
				<tr>
					<?php include ( "../inc/connect.inc.php");
					$query = "SELECT * FROM orders ORDER BY id DESC";
					$run = mysqli_query($con, $query);
					$i=1;
					while ($row=mysqli_fetch_assoc($run)) {
						$oid = $row['id'];
						$ouid = $row['uid'];
						$opid = $row['pid'];
						$oplace = $row['oplace'];
						$omobile = $row['mobile'];
						$odstatus = $row['dstatus'];
						$odate = $row['odate'];
						$ddate = $row['ddate'];
						//getting user info
						$query1 = "SELECT * FROM user WHERE id='$ouid'";
						$run1 = mysqli_query($con, $query1);
						$row1=mysqli_fetch_assoc($run1);
						$ofname = $row1['firstName'];
						$oumobile = $row1['mobile'];
						$ouemail = $row1['email'];

						//product info
						$query2 = "SELECT * FROM products WHERE id='$opid'";
						$run2 = mysqli_query($con, $query2);
						$row2=mysqli_fetch_assoc($run2);
						$opcate = $row2['category'];
						$opitem = $row2['item'];
						$oppicture = $row2['picture'];
						$oprice = $row2['price'];

					
					 ?>
					<th><?php echo $i; ?></th>
					<th><?php echo $opid; ?></th>
					<th><?php echo $oplace; ?></th>
					<th><?php echo $odstatus; ?></th>
					<th><?php echo $odate; ?></th>

					<th><?php echo $ofname; ?></th>
					<th><?php echo $oumobile; ?></th>
					<th><?php echo $ouemail; ?></th>
					<th><?php echo '<div class="home-prodlist-img">
									<img src="../image/product/'.$oppicture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
									
								</div>' ?></th>
				</tr>
				<?php 
			$i++;} ?>
			</table>
		</div>
	</body>
</html>