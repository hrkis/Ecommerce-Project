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
$pname = "";
$price = "";
$piece="";
$available = "";
$category = "";
$type = "";
$item = "";
$pCode = "";
$descri = "";

if (isset($_POST['signup'])) {
//declere veriable
$pname = $_POST['pname'];
$price = $_POST['price'];
$piece=$_POST['piece'];
$available = $_POST['available'];
$type = $_POST['type'];
$pCode = $_POST['code'];
$descri = $_POST['descri'];
//triming name
$_POST['pname'] = trim($_POST['pname']);

//finding file extention
$profile_pic_name = @$_FILES['profilepic']['name'];
$file_basename = substr($profile_pic_name, 0, strripos($profile_pic_name, '.'));
$file_ext = substr($profile_pic_name, strripos($profile_pic_name, '.'));

if (((@$_FILES['profilepic']['type']=='image/jpeg') || (@$_FILES['profilepic']['type']=='image/png') || (@$_FILES['profilepic']['type']=='image/gif')) && (@$_FILES['profilepic']['size'] < 1000000)) {

	$item = $item;
	if (file_exists("../image/product/")) {
		//nothing
	}else {
		mkdir("../image/product/");
	}
	
	
	$filename = strtotime(date('Y-m-d H:i:s')).$file_ext;

	if (file_exists("../image/product/".$filename)) {
		echo @$_FILES["profilepic"]["name"]."Already exists";
	}else {
		if(move_uploaded_file(@$_FILES["profilepic"]["tmp_name"], "../image/product/".$filename)){
			$photos = $filename;
			$result = mysqli_query($con, "INSERT INTO products(pName,price,piece,description,available,category,type,item,pCode,picture) VALUES ('$_POST[pname]','$_POST[price]','$_POST[piece]','$_POST[descri]','$_POST[available]','$_POST[category]','$_POST[type]','$_POST[item]','$_POST[code]','$photos')");
				header("Location: allproducts.php");
		}else {
			echo "Something Worng on upload!!!";
		}
		//echo "Uploaded and stored in: userdata/profile_pics/$item/".@$_FILES["profilepic"]["name"];
		
		
	}
	}
	else {
		$error_message = 'Add picture!';
	}
}
$search_value = "";

?>


<!doctype html>
<html>
	<head>
		<title>Welcome to Our Store</title>
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
							echo '<a style="text-decoration: none;color: #fff;" href="update_admin.php">Hi '.$uname_db.' <span style="color: #fff;">'. $utype_db.'</span></a>';						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 60px; width: 130px;" src="../image/cart.png">
				</a>
			</div>
			<div id="srcheader">
				<form id="newsearch" method="get" action="search.php">
				        <?php 
				        	echo '<input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..." value="'.$search_value.'"><input type="submit" value="search" class="srcbutton" >';
				         ?>
				</form>
			<div class="srcclear"></div>
			</div>
		</div>
		<div class="categolis">
			
			<table>
				<tr>
					<th>
						<a href="index.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;font-size: 15px;">Home</a>
					</th>
					<th><a href="addproduct.php" style="text-decoration: none;color: #040403;padding: 4px 12px;border-radius: 12px;font-size: 15px;">Add Product</a></th>
					
					<th><a href="orders.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;font-size: 15px;">Orders</a></th>
			
					<?php 
						if($utype_db == 'admin'){
							echo '<th><a href="report.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;font-size: 15px;">Products</a></th>
								<th><a href="newadmin.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;font-size: 15px;">New Admin</a></th>';
						}
					?>

				</tr>
			</table>
		</div>
		<?php 
			if(isset($success_message)) {echo $success_message;}
			else {
				echo '
					<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 20px;">
						<div class="container">
							<div>
								<div>
									<div class="signupform_content">
										<h2 style="margin-left:149px">Add Product Form!</h2>
										<div class="signup_error_msg">';
											if (isset($error_message)) {echo $error_message;}
										echo '</div>
										<div class="signupform_text"></div>
										<div>

											<form action="" method="POST" class="registration" enctype="multipart/form-data">
												<div class="signup_form">

											<div>
											<div class="label_content" style="float: left;">
  											<h5>Product Name:</h5>
  											</div>
														
												<input name="pname" " style="margin-left: 50px;  id="first_name"  required="required" class="first_name signupbox" type="text" size="30" value="'.$pname.'" >
											</div></br>
											<div>
											<div class="label_content1" style="float: left;">
  											<h5>Price:</h5>
  											</div>
												<td >
												<input name="price" style="margin-left: 152px; id="last_name" required="required" class="last_name signupbox" type="text" size="30" value="'.$price.'" >
												</td>
											</div></br>

											<div>
											<div class="label_content1" style="float: left;">
  											<h5>Stock Available:</h5>
  											</div>
												<td>
												<input name="available" style="margin-left: 38px; placeholder="Available Quantity" required="required" class="email signupbox" type="text" size="30" value="'.$available.'">
												</td>
											</div></br>
													

											<div>
											<div class="label_content1" style="float: left;">
  											<h5>Description:</h5>
  											</div>
												<td >
												<input name="descri" style="margin-left: 90px; id="first_name" required="required" class="first_name signupbox" type="text" size="30" value="'.$descri.'" >
												</td>
											</div></br>
													
													
											<div>
											
											<div class="label_content1" style="float: left;">
  											<h5>Product Code:</h5>
  											</div>
												<td>
												<input name="code" id="password-1" style="margin-left: 60px;   required="required"  placeholder="Code" class="password signupbox " type="text" size="30" value="'.$pCode.'">
												<input type="hidden" value="acme" name="item" size="30">
												</td>
											</div></br>
											

											<div>
											<div class="label_content1" style="float: left;">
  											<h5>Product Image:</h5>
  											</div>
											<input name="profilepic"style=" font-size: 20px;margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #000;color: #000;margin-left: 48px;width: 270px;background-color: transparent;" class="password signupbox" type="file" value="Add Pic">
											</div></br>


											<div>
											<input name="signup"  style=" font-size: 20px;color:#000! important;margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #000;color: #ffff;margin-left: 260px;width: 304px;background-color: transparent;" class="uisignupbutton signupbutton" type="submit" value="Add Product">
											</div>
											</div>
											</form>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				';
			}

		 ?>
	</body>
</html>