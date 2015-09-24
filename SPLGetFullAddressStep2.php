<?php

##################################################################
#You need to open an account which will send you a data key, goto:
#http://www.simplylookupadmin.co.uk/A2CustomerAccount/WebAccountCreateFromReseller.aspx?r=&id=4

$datakey = "I_B7BF46856D3545A89FE7B1F4C72FAE";


##################################################################
# see http://www.simply-postcode-lookup.com/full_address_inline_ajax_section_list.htm
# for explanation for code
##################################################################

$simplyserver = "http://www.simplylookupadmin.co.uk/xmlservice";
$usernameID = "";
$postcode = "";
$XMLData = "";
$data ="";

##############################################################################
# When using an INTERNAL License (used in company by your employees), each user MUST be identified, so use cookie
# Not doing this is in breach of our End User License agreement
# If turned off then redirect to page explaining the restriction
# For External use the following code does nothing, the following section can be removed
######################### Identify User START #################################
if (substr($datakey, 0, 2) == "I_")
{
	# Internal KEY requires a User ID, so need a cookie, if turned off then terminate search

	$usernameID="Not Set";
	@$usernameID = $_COOKIE['usernameID'];
	if ($usernameID == "")
	{
		@$IsSetCookieFlag = $_GET['set'];
		if ($IsSetCookieFlag != 'yes') {
		      // Set cookie
		      	#This will be unique enough, for 30 users! since any more will use System License
			$usernameID =date("ymd_gis",time());
			setcookie("usernameID",$usernameID,time()+(60*60*24*7));

		      // Reload page
		      header ("Location: SPLGetFullAddressStep2.php?set=yes");
		} else {
		      // Check if cookie exists
		      if (!empty($_COOKIE['usernameID'])) {
			$usernameID = $_COOKIE['usernameID'];
		     } else {
			$CannotIdentifyUser="True";
		     }
		}
	}
}
else
{
	# Web use KEY does not require a User ID
	$usernameID ="";
}
########################## Identify User END #############################


################################################
#So Get Data from SPL Web server:

header('Expires: Wed, 23 Dec 1980 00:30:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Content-Type: text/xml');

$AddressID = $_GET['AddressID'];
$XMLService = $simplyserver . "/GetAddressRecord.aspx?datakey=" . $datakey . "&id=" . $AddressID . "&username=" . $usernameID."&AppID=36";

#get XML
@$XMLtoSend = file_get_contents($XMLService);

if (strpos($XMLtoSend,"<line1>"))
{
	#return XML
	echo $XMLtoSend;
}
else
{
	#Noting to return, so return XML to stop error on client
	echo "<data></data>";
}

?>