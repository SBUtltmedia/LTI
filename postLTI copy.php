<?

if (!array_key_exists('lis_result_sourcedid',$_POST['data'])) { print 'In lti\test\index.php : No ID<br>'; print_r($_POST); die(); }

$ses = array('fname'=>$_POST['data']['lis_person_name_given'], 'lname'=>$_POST['data']['lis_person_name_family'], 'id'=>$_POST['data']['lis_result_sourcedid'], 'url'=>$_POST['data']['lis_outcome_service_url']);

#

include 'php/message.php';

$id = $ses['id'];
$url = $ses['url'];
$grade = rand(0,100)/100;

sendGrade($url, $id, $grade);
#sendGrade('http://apps.tlt.stonybrook.edu/lib/php/log', $id, $grade);

function sendGrade($endpoint, $sourcedid, $grade) {

	$body = message($sourcedid, $grade);

	call_user_func(function($method, $oa_con_key, $oa_con_secret, $content_type) use ($endpoint, $body) {
		require_once("php/OAuthBody.php");
	 file_put_contents("body.xml",$body);
	  file_put_contents("dest.txt",$endpoint);
	 file_put_contents("results.txt", sendOAuthBodyPOST($method, $endpoint, $oa_con_key, $oa_con_secret, $content_type, $body));
	} , "POST", "anythingKey", "anythingSecret", "application/xml");

}

?>
