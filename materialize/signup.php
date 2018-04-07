<?php
$s="localhost";
$u="root";
$p="lenovo";
$dbname="fon";
$conn = mysqli_connect($s,$u,$p,$dbname);
if($conn)
{
	echo "connectd successfully";
}
else
{
	echo "not connected";
}
echo "<br>";

$a=$_POST['first_name'];
$b=$_POST['last_name'];
$c=$_POST['password'];
$d=$_POST['email'];
$e=$_POST['dob'];
$f=$_POST['contact'];
$g=$_POST['g1'];
$h=$_POST['blood'];
$i=$_POST['address'];
$j=$_POST['pincode'];
$k=$_POST['state'];
$l=$_POST['country'];
$m=$_POST['city'];
$sql="insert into register values($a,'$b','$c','$d','$e','$f','$g','$h','$i','$m','$j','$k','$l')";
if(mysqli_query($conn,$sql))
{
echo "data inserted";
}
else
{
echo "data not inserted";
}

$conn->close();
?>