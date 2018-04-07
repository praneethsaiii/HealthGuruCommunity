<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 
		$i = 0;
        $q = $_REQUEST['q'];
		if (strstr($q,"weather") != false) {
			$location = strstr($q,"in");
			$inarray = explode(' ',$location,2);
			$url = file_get_contents('http://api.wunderground.com/api/a144a1d06e94dac6/forecast/q/India/'.$inarray[1].'.json');
            $resarray = json_decode($url);
            $forecast = $resarray->forecast;
            $txt_forecast = $forecast->txt_forecast;
            $forecastday = $txt_forecast->forecastday[0];
            $answer = $forecastday->fcttext_metric;
            exit($answer);
		}
		else if (strstr($q,"who") != false) {
			$url = file_get_contents('http://api.wolframalpha.com/v2/query?&appid=KHU9T4-QKKGKKK5PK&input='.urlencode($q).'');
			$resarray = simplexml_load_string($url);
			if ($resarray['success'] == false) {
				exit("I'm sorry. But I can't process your request.");
			}
			else {
			
			$pod = $resarray->pod[1];
			$subpod = $pod->subpod;
			$plaintext = $subpod->plaintext;
			$dtpos = strpos($plaintext,"date");
			$fullname = substr($plaintext,0,$dtpos-1);
			$dob = substr($plaintext,$dtpos);
			$answer = $fullname."<br>".$dob."<br>";
			exit($answer);
			}
		}
		else if (strstr($q,"meaning") != false || strstr($q,"define") != false || strstr($q,"definition") != false) {
			$url = file_get_contents('http://api.wolframalpha.com/v2/query?&appid=KHU9T4-QKKGKKK5PK&input='.urlencode($q).'');
			$resarray = simplexml_load_string($url);
			if ($resarray['success'] == false) {
				exit("I'm sorry. But I can't process your request.");
			}
			else {
			
			$pod = $resarray->pod[1];
			$subpod = $pod->subpod;
			$plaintext = $subpod->plaintext;
			exit($plaintext);
			}
		}
		else if (strstr($q,"+") != false || strstr($q,"-") != false || strstr($q,"*") != false || strstr($q,"/") != false || strstr($q,"times") != false || strstr($q,"to the power") != false || strstr($q,"plus") != false || strstr($q,"minus") != false || strstr($q,"divided by") != false || strstr($q,"square") != false || strstr($q,"cube") != false || strstr($q,"^") != false) {
			$url = file_get_contents('http://api.wolframalpha.com/v2/query?&appid=KHU9T4-QKKGKKK5PK&input='.urlencode($q).'');
			$resarray = simplexml_load_string($url);
			if ($resarray['success'] == false) {
				exit("I'm sorry. But I can't process your request.");
			}
			else {
			
			$pod = $resarray->pod[1];
			$subpod = $pod->subpod;
			$plaintext = $subpod->plaintext;
			exit($plaintext);
			}
		}
		else if (strstr($q,"convert") != false) {
			$url = file_get_contents('http://api.wolframalpha.com/v2/query?&appid=KHU9T4-QKKGKKK5PK&input='.urlencode($q).'');
			$resarray = simplexml_load_string($url);
			if ($resarray['success'] == false) {
				exit("I'm sorry. But I can't process your request.");
			}
			else {
			
			$pod = $resarray->pod[1];
			$subpod = $pod->subpod;
			$plaintext = $subpod->plaintext;
			exit($plaintext);
			}
		}
		else if(strstr($q,"headache") != false)
		{
			$path="C:\wamp64\www\HealthGuru\diseases\headache.txt";
			$headache=file_get_contents($path);
			exit($headache);
		}
		else if(strstr($q,"hospital") != false || strstr($q,"clinic") != false || strstr($q,"Hospital") != false)
		{
			$url=file_get_contents('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=12.9701,80.2505&radius=2000&type=hospital&key=AIzaSyApUeIeH19vuu6VI-DVbxcU47IdX0Ny1hk',false,stream_context_create($arrContextOptions));
			$resarray=json_decode($url);
			$resultString="";
			for($x=0;$x<10;$x++)
			{
			$results=$resarray->results[$x];
			$name=$results->name;
			#$rating=$results->rating;
			$vicinity=$results->vicinity;
			#$photos=$results->photos;
			#$photoRef=$photos->photo_reference;
			#$photo_url=file_get_contents('https://maps.googleapis.com/maps/api/place/photo?maxwidth=100&photoreference=CmRaAAAAW460zFjpyKmxv01DNsZ42D3L4hEJmepG87qF6qKsyPqocJ7PW9bAzky0G0usDVISMyE21uPwKhmpDgq5UzpSkcEQjYMDvS9BU_0ain3jMF4MnRgvbkAw4j5RMqmWwpPZEhCAxugvjVZ8pVEmCud_2p1AGhQQHw3uK5jmLnfK9I2XAmo9_G8VlQ&key=AIzaSyApUeIeH19vuu6VI-DVbxcU47IdX0Ny1hk',false,stream_context_create($arrContextOptions));
			$arr=array($name,$vicinity);
			$res = join(',', $arr);
			$resultString=$res;
			echo $resultString;
			#echo $photo_url;
			echo "<br>";
			echo("\r\n");
		 	echo "<br>";
			echo("\r\n");
			echo "<br>";
			echo("\r\n");
			}
		exit("&nbsp;");
		}

		else if(strstr($q,"pharmacy") != false || strstr($q,"medical") != false || strstr($q,"Medical") != false || strstr($q,"Pharmacy") != false)
		{
			$url=file_get_contents('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=12.9701,80.2505&radius=2000&type=pharmacy&key=AIzaSyApUeIeH19vuu6VI-DVbxcU47IdX0Ny1hk',false,stream_context_create($arrContextOptions));
			$resarray=json_decode($url);
			$resultString="";
			for($x=0;$x<10;$x++)
			{
			$results=$resarray->results[$x];
			$name=$results->name;
			#$rating=$results->rating;
			$vicinity=$results->vicinity;
			$arr=array($name,$vicinity);
			$res = join(',', $arr);
			$resultString=$res;
			echo $resultString;
			echo "<br>";
			echo("\r\n");
			echo "<br>";
			echo("\r\n");
			echo "<br>";
			echo("\r\n");
			}
		exit("&nbsp;");
		}
		else if(strstr($q,"news") != false)
		{
			$url=file_get_contents('https://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=702b8344622a492a8189cc202fbcbb34');
			$resarray=json_decode($url);
			$resultString="";
			for($x=0;$x<10;$x++)
			{
			$results=$resarray->articles[$x];
			$author=$results->author;
			$title=$results->title;
			$description=$results->description;
			$arr=array($author,$title,$description);
			$res = join(',', $arr);
			$resultString=$res;
			echo $resultString;
			echo "<br>";
			echo("\r\n");
			echo "<br>";
			echo("\r\n");
			echo "<br>";
			echo("\r\n");
			}
		exit("&nbsp;");
		}
		

        else {
			$url = file_get_contents('http://api.wolframalpha.com/v2/query?&appid=KHU9T4-QKKGKKK5PK&input='.urlencode($q).'');
			$resarray = simplexml_load_string($url);
			if ($resarray['success'] == false) {
				exit("I'm sorry. But I can't process your request.");
			}
			else {
			
			$pod = $resarray->pod[1];
			$subpod = $pod->subpod;
			$plaintext = $subpod->plaintext;
			if (strstr($plaintext,"Wolfram|Alpha") != false) {
				$answer = substr_replace($plaintext," SALSA",strpos($plaintext,"Wolfram|Alpha")-1);
				echo $answer;
			}
			else echo $plaintext;
			exit(" ");
			}
		}
        ?>
    </body>
</html>
