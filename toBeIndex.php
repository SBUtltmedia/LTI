<!--
	Author:	Anthony John Ripa
	Date:	Fall 2017
 -->



 <?
$ses = array('fname'=>$_POST['lis_person_name_given'], 'lname'=>$_POST['lis_person_name_family'], 'id'=>$_POST['lis_result_sourcedid'], 'url'=>$_POST['lis_outcome_service_url']);
print "var a=".json_encode($ses);
?>
