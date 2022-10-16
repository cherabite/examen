<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

/**
* Description of site_offline
*
* @author admin
*/
class Site_Offline {

function __construct() {

}

public function is_offline() {
if (file_exists(APPPATH . 'config/config.php')) {
include(APPPATH . 'config/config.php');

if (isset($config['is_offline']) && $config['is_offline'] === TRUE) {
$this->show_site_offline();
exit;
}
}
}

private function show_site_offline() {
echo '<html >
     <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	 </head>
	 <body>
	 <div style="margin-top:10%">
	 <h1 style="color:red;margin:0 auto;widh: 600px; text-align:center"><strong>الموقع في حالة صيانة شكرا لتفهمكم...؟؟</strong></h1>.
	 </div>
	 </body></html>';
}

}

/* End of file site_offline.php */