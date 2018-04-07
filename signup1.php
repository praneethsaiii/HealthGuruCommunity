<!DOCTYPE html>
  <html>
   <title>FON</title>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
        <?php
 
 
if(isset($_POST['submit']))
    {
    	$con = mysql_connect("localhost","root","") or die("Couldn't connect");
    	if($con)
{
	echo "connected successfully";
}
else
{
	echo "not connected";
}
      mysql_select_db("fon");
$a=$_POST['first_name'];
$b=$_POST['last_name'];
$c=$_POST['password'];
$d=$_POST['email'];
$e=$_POST['dob'];
$f=$_POST['contact'];
$g=$_POST['group1'];
$h=$_POST['blood'];
$i=$_POST['address'];
$j=$_POST['pincode'];
$k=$_POST['state'];
$l=$_POST['country'];
$m=$_POST['city'];
$sql="INSERT into register (fname,lname,pwd,email,dob,contact,group1,blood,address,pincode,state,country,city)
values('$a','$b','$c','$d','$e','$f','$g','$h','$i',$j,'$k','$l','$m')";
 
if(mysql_query($sql,$con))
{

 header("location:login.php"); 
}
else
{
echo "data not inserted";
}
}

?>


      
<div class="wrapper">
<span class=" black-text text-darken-100"><h2>SignUp</h2></span>
</div>
  <div class="row">
    <form class="col s12" action="" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" name="first_name" type="text" class="validate">
          <label for="f_name">FIRST NAME</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" name="last_name" type="text" class="validate">
          <label for="l_name">LAST NAME</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate">
          <label for="pword">PASSWORD</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate" >
          <label for="emailid">EMAIL</label>
        </div>

      </div>
      <div class="row"> <div class="input-field col s6">
        <input type="date" class="datepicker" placeholder="DOB" id="dob" name="dob">
       </div></div>
      
<div class="row">
      <div class="input-field col s6">
  
          <input id="contact" name="contact" type="tel" class="validate">
          <label for="contactno">CONTACT NUMBER</label>
        </div></div>

<div class="row">
      <div class="input-field col s12">
    <p>
      <input name="group1" type="radio" id="g1" value="Male" />
      <label for="g1">MALE</label>
   

      <input name="group1" type="radio" id="g2" value="Female"/>
      <label for="g2">FEMALE</label>
    </p>
    </div>
    </div>
<div class="row">
    <div class="input-field col s12">
    <select id="blood" name="blood">
      <option value="" disabled selected>Choose your option</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="A+">A+</option>
       <option value="A-">A-</option>
        <option value="B+">B+</option>
         <option value="B-">B-</option>
          <option value="AB+">AB+</option>
           <option value="AB-">AB-</option>
            
    </select>
    <label>BLOOD GROUP</label>
  </div></div>

  <div class="row">
          <div class="input-field col s12">
            <textarea id="address" name="address" class="materialize-textarea" length="300"></textarea>
            <label for="address1">ADDRESS</label>
          </div>
        </div>
        <div class="row">
        <div class="input-field col s6">
          <input  name="city" id="city" type="text" class="validate">
          <label for="city1">CITY</label>
        </div></div>
<div class="row">
<div class="input-field col s6">
          <input id="pincode" name="pincode" type="number" class="validate">
          <label for="pincode1">PIN CODE</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input   id="state" name="state" type="text" class="validate">
          <label for="state1">STATE</label>
        </div></div>
        <div class="row">
        <div class="input-field col s6">
          <input name="country" id="country" type="text" class="validate">
          <label for="country1">COUNTRY</label>
        </div></div>
<div class="row">
<div class="input-field col s6 offset-s3">
<button class="btn waves-effect waves-light"  type="submit" name="submit" id="submit">REGISTER WITH FON
	    	<i class="material-icons right">send</i>
	 	 </button></div></div>
    </form>
  </div>
  </div>

  <script type="text/javascript">
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100 // Creates a dropdown of 15 years to control year
  });
  </script>

  <script type="text/javascript">
     $(document).ready(function() {
    $('select').material_select();
  });
  </script>
  
    </body>
  </html>