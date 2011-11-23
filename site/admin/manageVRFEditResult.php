<?php 

/**
 * Script to edit VRF
 ***************************/

/* required functions */
require_once('../../functions/functions.php'); 

/* verify that user is admin */
if (!checkAdmin()) die('');

/* get modified details */
$vrf = $_POST;

/* Hostname must be present! */
if($vrf['name'] == "") {
	die('<div class="error">Name is mandatory!</div>');
}

/* update details */
if(!updateVRFDetails($vrf)) {
	print('<div class="error">Failed to '. $vrf['action'] .' VRF!</div>');
}
else {
	print('<div class="success">VRF '. $vrf['action'] .' successfull!</div>');
}

?>