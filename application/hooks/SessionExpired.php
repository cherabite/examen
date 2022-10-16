<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

/**
* Description of site_offline
*
* @author admin
*/
class SessionExpired {
 
public function isLoginSessionExpired() {
	$this->ci =& get_instance();
	   $this->ci->load->library('session');
		if (file_exists(APPPATH . 'config/config.php')) {
			include(APPPATH . 'config/config.php');

			if (isset($config['sess_expiration']) && $config['sess_expiration'] != '') {
		 		$timeee = $this->ci->session->userdata('logged_time');
				list($usec, $sec) = explode(" ", microtime());
				$now =  ((float)$usec + (float)$sec);
					$login_session_duration = 10; 
					$current_time = time(); 
					if(isset( $timeee)   ){  
						if(($current_time -  $timeee) > $login_session_duration){ 
							redirect('inscriptic/index','refresh'); 
						} 
					}

			}
		}
    }

 
}

/* End of file site_offline.php */