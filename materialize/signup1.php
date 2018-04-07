
      <?php
 
 $con = mysql_connect("localhost","root","lenovo") or die("Couldn't connect");
			mysql_select_db("fon");
if(isset($_POST['submit']))
		{
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
$sql="INSERT into register values('$a','$b','$c','$d','$e',$f,'$g','$h','$i',$j,'$k','$l',,'$m')";
$res= mysql_query($sql);
if($res)
{
echo "data inserted";
}
else
{
echo "data not inserted";
}
}

?>
