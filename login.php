<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
        mysql_select_db("fon") or die("failed to connect db");
        $a=$_POST["email"];
        $b=$_POST["pwd"];
        echo $a;
        $sql_query = "select email from register where email='$a' and pwd='$b';";
        $result = mysql_query($sql_query);
        $check = mysql_fetch_array($result);
        if(!empty($check)) {
            
            header("location:home.html");
        }
        else{

            echo '{"query_result":"FAILURE"}';



        }
    }
    
    ?>

 <div class="row">
        <div class="col s6 offset-s3">
            <div class="card">

                <span class="card-title"><b>LOGIN</b></span>

                <div class="card-content">

                    <div class="row">
                        <form class="col s12" action="" method="POST">
                            <div class="row">
                                <div class="input-field col s10">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="email" name="email" type="email" class="validate">
                                    <label for="email">EMAIL</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s10">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="pwd" name="pwd" type="password" class="validate">
                                    <label for="pwd">PASSWORD</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">
                                        LOGIN
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

              </div>
            </div>
        </div>
    </div>


</body>
</html>
