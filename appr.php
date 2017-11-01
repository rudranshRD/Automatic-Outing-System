<?php
$servername="localhost";
$username="root";
$password="";
$con=new mysqli($servername,$username,$password,"studentforms");
$db=mysqli_connect('localhost','root','','studentforms');
if($con)
echo "Connection estabilished"."<br>";
else
echo "error in connection";
$reg=ltrim($_POST["reg"]);
$place=ltrim($_POST["place"]);
$outdate=ltrim($_POST["outdate"]);
$outtime=ltrim($_POST["outtime"]);
$indate=ltrim($_POST["indate"]);
$intime=ltrim($_POST["intime"]);
$phone=ltrim($_POST["phone"]);
$mess=ltrim($_POST["mess"]);
$purpose=ltrim($_POST["purpose"]);

$query="insert into approved (reg,place,outdate,outtime,indate,intime,phone,mess,purpose) values ('$reg','$place','$outdate','$outtime','$indate','$intime','$phone','$mess','$purpose')";
if($con->query($query)==TRUE)
{
	$sql = "delete FROM form where reg='".ltrim($reg)."'";
	$result =mysqli_query($db,$sql);

	header('location: successful_approval.html');
}

else
{
	echo "Failed".$con->error;
}
$con->close();
?>