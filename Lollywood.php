<?php 
session_start();
require_once("include/conn.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- $sql=" SELECT * FROM users WHERE fname like '%".$name."%' OR user_email ='%".$email."%'";
    $q=mysql_query($sql); -->
<div>
	<div class="header" style="width: 88.5%;margin-left: 70px;height: 200px;background:#8B0000;">
		<form align="right">
		<label style="color: white;size: 20px;">Search Movies</label> &nbsp;&nbsp;&nbsp;<input style="size: 20px;" type="text" name="search_box">
		<button type="submit" name="submit">Fillter</button>
		<input type="submit"  value="Show All Data"  name="AllData">
		</form>
	</div>
					
									<?php 
										$query = "select * from lollywood";
										if (isset($_GET['submit'])) {
											extract($_GET);	

											$query = "SELECT * FROM lollywood WHERE name LIKE '%".$search_box."%'";
										}
										$run = mysqli_query($conn,$query);
										while ($row = mysqli_fetch_array($run)) {
											$m_name = $row['name'];
											$m_image = $row['address'];
											?>

											<div style="border:5px solid #8B0000 ;margin-left:70px;margin-top:10px ;float: left; background:#8B0000; height: 210px;  width: 300px">
												<img src="<?php if(empty($row)){echo "No Data Found";} else  echo $m_image; ?>" style="width: 300px;height: 170px;">
												<center><h2  style="margin-top: 0px;color: white;"><?php  echo $m_name; ?></h2></center>
											</div>
											<?php   }  ?> 
</div>
</body>

</html>
<!--
SELECT * FROM patients WHERE name like '%"."addi"."%' ;
-->