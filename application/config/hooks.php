<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['pre_system']= array(
'class'    => 'Site_Offline', 
'function' => 'is_offline', 
'filename' => 'Site_Offline.php', 
'filepath' => 'hooks',
);
/*===================================================
$hook['pre_system']= array(
'class'    => 'SessionExpired', 
'function' => 'isLoginSessionExpired', 
'filename' => 'SessionExpired.php', 
'filepath' => 'hooks',
);
*/
?>