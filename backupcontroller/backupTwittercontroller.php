<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class TwitterController extends Controller
{
    //
	public function follower()
	{
	include "twitteroauth/twitteroauth.php";

$consumer_key = "bZ5Y0YaUHztAzxdRSMR0KekGn";
$consumer_secret = "moCSPQRvW0yZrT50FLDGCCDg8mBHHjF1DrFrAR4myXIJpRHA19";
$access_token = "910852213546848258-Mmrm2mj19O0I6h62rjK20prRcxDrtlt";
$access_token_secret = "ZmlnmrAPYVijBnKmU6ZWdh50v5Wq5dOidZnN7YmwSEHVX";

$twitter = new \App\TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);


//$tweets = $twitter->get('https://api.twitter.com/1.1/followers/ids.json?cursor=-1&screen_name=SurveyCompareZA&count=5000');
//$test=$tweets->ids;
//echo count($test);
//echo "count";
//echo"<br>";
//echo implode("<br>"." ",$test)."<br>";
//echo"<br>";
//print_r($tweets);
		
		//code of combine
//		if(isset($_POST['search']))
//{
	$url=$_POST['url'];
	//$url="https://twitter.com/MbalulaFikile/status/911826429352054784";
	
if(preg_match("/\/(\d+)$/",$url,$matches))
{
 $end=$matches[1];
 $tweets = $twitter->get('https://api.twitter.com/1.1/statuses/retweeters/ids.json?id='."".$end);
$tweete=array($tweets);
	$test=$tweets->ids;
$count= count($test);
	echo $count;
	//return response()->json(array('count'=>$count),200);
echo"<br>";
echo implode("<br>"." ",$test)."<br>";
echo"<br>";
}
else
{
  //Your URL didn't match.  This may or may not be a bad thing.
}
echo "<br>";
//echo $end;
//}
		
		//end code of combine
	}
}
