<?php
$servername="localhost";
$username="root";
$password="";
$con=new mysqli($servername,$username,$password,"studentforms");

if($con)
echo "Connection estabilished"."<br>";
else
echo "error in connection";
$reg=$_POST["reg"];
$place=$_POST["place"];
$outdate= date('Y-m-d',strtotime($_POST["outdate"]));
$indate= date('Y-m-d', strtotime($_POST["indate"]));

$outtime= date('h:i a', strtotime($_POST['outtime']));
$outtime = DateTime::createFromFormat( 'H:i A', $outtime);
$outtime = $outtime->format( 'H:i:s');

$intime= date('h:i a', strtotime($_POST['intime']));
$intime = DateTime::createFromFormat( 'H:i A', $intime);
$intime = $intime->format( 'H:i:s');

$phone=$_POST["phone"];
$mess=$_POST["mess"];
$purpose=$_POST["purpose"];







echo $outtime."<br>".$intime."<br>".$outdate."<br>".$indate."<br>";
$query="insert into form (reg,place,outdate,outtime,indate,intime,phone,mess,purpose) values ('$reg','$place','$outdate','$outtime','$indate','$intime','$phone','$mess','$purpose')";

if($con->query($query)==TRUE)
{
	header('location: successful_submission.html');
}

else
{
	echo "Failed".$con->error;
}
$con->close();
?>