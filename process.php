<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
    <link rel="stylesheet" type="text/css" href="for1.css">

</head>


<body>
<div class="navbar">
    <ul>
  <li style="float: left; align-items: center;";><img src="vit_logo.png" height="45px" width="150px"></li>
  <li><a href="home2.html">Home</a></li>
  <li><a href="new_and_login.html">Login</a></li>
  <li><a href="form.html">New Request</a></li>
  <li><a href="about.asp">About</a></li>
</ul>
    </div>
<div class="container" align="center">  
  <div id="contact" style="">
<?php

$db=mysqli_connect('localhost','root','','studentforms');
if($db)
	echo "";
else
	echo "error in connection";
if(isset($_POST['submit'])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	$profile=$_POST["profile"];
	$query="select * from login where username='$username' and password='$password' and profile='$profile'";
	$result=mysqli_query($db,$query);
	$row = $result->fetch_assoc();
	if(mysqli_num_rows($result)==1 && strcmp($row["profile"],"warden")==0 )
	{
		echo "";
		$sql = "SELECT * FROM form";
		$result =mysqli_query($db,$sql);
		//$c="<table border=1><tr><th>Reg No.</th><th>Place</th><th>Purpose</th></tr>";
		if ($result->num_rows > 0) {
    // output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<b>' . $row["reg"] . '</b>' . ' &nbsp &nbsp &nbsp &nbsp' . $row["place"]. ' &nbsp &nbsp &nbsp &nbsp' . $row["outdate"]. ' &nbsp &nbsp &nbsp &nbsp' . $row["outtime"]. ' &nbsp &nbsp &nbsp &nbsp' . $row["indate"]. ' &nbsp &nbsp &nbsp &nbsp' . $row["intime"]. ' &nbsp &nbsp &nbsp &nbsp' . $row["phone"]. ' &nbsp &nbsp &nbsp &nbsp' . $row["mess"]. ' &nbsp &nbsp &nbsp &nbsp' . $row["purpose"];
				?>
				
				
				
				<form id="approved" action="appr.php" method="post">
					<input name="reg" type="hidden" value=" <?php echo $row["reg"] ?>">
					<input name="place" type="hidden" value=" <?php echo $row["place"] ?>">
					<input name="outdate" type="hidden" value=" <?php echo $row["outdate"] ?>">
					<input name="outtime" type="hidden" value=" <?php echo $row["outtime"] ?>">
					<input name="indate" type="hidden" value=" <?php echo $row["indate"] ?>">
					<input name="intime" type="hidden" value=" <?php echo $row["intime"] ?>">
					<input name="phone" type="hidden" value=" <?php echo $row["phone"] ?>">
					<input name="mess" type="hidden" value=" <?php echo $row["mess"] ?>">
					<input name="purpose" type="hidden" value=" <?php echo $row["purpose"] ?>">

					<!--input type="submit" value="Approve"-->
					<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Approve</button><br>
				</form>
				<?php
				//echo  "br";
			}
		} 

		else {
			echo "0 results";
		}
	}
	else if(mysqli_num_rows($result)==1 && strcmp($row["profile"],"guard")==0 )
	{
		echo "Log in successful"."<br>";
		$sql = "SELECT * FROM approved";
		$result =mysqli_query($db,$sql);
		$c = "<table border=1><tr><th>Reg</th><th>Place</th><th>Outdate</th><th>Outtime</th><th>Indate</th><th>Intime</th><th>Phone</th><th>Mess</th><th>Purpose</th></tr>";
		if ($result->num_rows > 0) {
    // output data of each row
			while($row = $result->fetch_assoc()) {
				//echo "reg: " . $row["reg"]. " - place: " . $row["place"]. " " . $row["purpose"];
				$c = $c."<tr><td><b>" . $row["reg"]. "</b></td><td>" . $row["place"]. "</td><td>". $row["outdate"] ."</td><td>". $row["outtime"]."</td><td>".$row["indate"]."</td><td>".$row["intime"]."</td><td>".$row["phone"]."</td><td>".$row["mess"]."</td><td>".$row["purpose"]."</td></tr>";
				//echo  "<br>";
			}
			$c = $c."</table>";
			echo $c;
		} 

		else {
			echo "0 results";
		}
	}
	else
	{
		echo "The username/password combination doesn't exist";
	}
	$db->close();
}

?>

    <!--p class="copyright">Designed by <a href="https://colorlib.com" target="_blank" title="Manzil M">E L I X E R</a></p-->
  </div>
</div>
</body>
</html>