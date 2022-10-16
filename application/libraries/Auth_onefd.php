<?php defined('BASEPATH') OR exit('No direct script access allowed');
define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');
class Auth_onefd 
 {
	 private $error = array();
    private $_cookie = array(
                   // 'name'   => '',
                   // 'value'  => '',
                   'expire' => '86500',
                   // 'domain' => '.some-domain.com',
                   'path'   => '/',
                   // 'prefix' => '',
               );
    
    private $_cookie_id_name = "189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD"; // nom d'un cookie
    private $_cookie_id_password = "1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS"; // nom d'un cookie
    
    function __construct() 
    {
      
		$this->ci =& get_instance();
		$this->ci->config->load('onefd_auth', TRUE);
		$this->ci->load->library('session');
		$this->ci->load->database();
        $this->ci->load->helper('cookie');
        $this->ci->load->library('encrypt');
        $this->ci->load->model('administrator_model');
		$this->ci->lang->load('onefd_auth_lang', 'arabic');
		$this->autologin();
	}
	
     function connect($identifiant,$password,$remember) 
	 { 
	 if ((strlen($identifiant) > 0) AND (strlen($password) > 0)) {
	     $user =$this->ci->administrator_model->validate($identifiant, $password);
            if ($user !== FALSE)
            {
				/* $this->ci->session->set_userdata(array(
								'user_id'	=> $user->id,
								 'n_cwefd'	=> $user->n_cwefd,
								'identifiant'	=> $user->username,
								'status'	=> ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED));*/
						if ($user->status == 0) {							// fail - not activated
							$this->error = array('not_activated' => $this->ci->lang->line('deactivate_successful'));
							return FALSE;
                         }elseif($user->status == 1){
                             $this->ci->session->set_userdata(array(
								'user_id'	     => $user->id,
								'n_cwefd'	     => $user->n_cwefd,
								'id_user_cwefd'  => $user->id_user_cwefd,
								'identifiant'	 => $user->username,
								'status'	     => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED));
								return TRUE;
						 }else {												// success
							  if ($remember) {
								//$this->create_autologin($user->id);
								$cookies_identifiant = $this->_cookie;
                                $cookies_identifiant['name'] = $this->_cookie_id_name;
                                $cookies_identifiant['value'] = $this->encrypt->encode($identifiant);
                               
                                $cookies_identifiant['prefix'] = $this->ci->config->item('cookie_prefix');
                                set_cookie($cookies_identifiant);

                                $cookies_password = $this->_cookie;
                                $cookies_password['name'] = $this->_cookie_id_password;
                                $cookies_password['value'] = $this->encrypt->encode($password);
                                
                                $cookies_password['prefix'] = $this->ci->config->item('cookie_prefix');
                                set_cookie($cookies_password);
                                 $this->ci->session->set_userdata(array(
								'user_id'	     => $user->id,
								'n_cwefd'	     => $user->n_cwefd,
								'id_user_cwefd'  =>$user->id_user_cwefd,
								'identifiant'	 => $user->username,
								'status'	     => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED));
							      
							    }
								 return TRUE;
						    }
						 return TRUE;		
		    }else{
				$this->error = array('login_false' => $this->ci->lang->line('login_unsuccessful'));
				return FALSE;
			}	
	 }else{
	return FALSE;	 
	 }

		
    }
	function logout()
	{
		//$this->delete_autologin();
		
		$this->ci->session->sess_destroy();
		delete_cookie($this->ci->config->item('cookie_prefix').$this->_cookie_id_name);
		delete_cookie($this->ci->config->item('cookie_prefix').$this->_cookie_id_password);
		
	}
	
	  function logged_in()
    {
        if ($this->ci->session->userdata('identifiant'))
			return true;
		else 
			return false;
    }
	function is_logged_in($activated = TRUE)
	{
		return $this->ci->session->userdata('status') === ($activated ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED);
	}
	 function autologin()
	{
		if (!$this->logged_in() ) {			// not logged in (as any user) or $this->is_logged_in(FALSE)

			$this->ci->load->helper('cookie');
			if (get_cookie($this->ci->config->item('cookie_prefix').$this->_cookie_id_name, TRUE) &&
                get_cookie($this->ci->config->item('cookie_prefix').$this->_cookie_id_password, TRUE))
                {
                    $username = $this->encrypt->decode(get_cookie($this->ci->config->item('cookie_prefix').$this->_cookie_id_name));
                    $password = $this->encrypt->decode(get_cookie($this->ci->config->item('cookie_prefix').$this->_cookie_id_password));
					$user =$this->ci->administrator_model->validate($username, $password);
					   if ($user == FALSE){
				         return FALSE;
						 }else{ 
			                  $this->ci->session->set_userdata(array(
								'user_id'	     => $user->id,
								'n_cwefd'	     => $user->n_cwefd,
								'id_user_cwefd'  =>$user->id_user_cwefd,
								'identifiant'	 => $user->username,
								'status'	     => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED));
							   return TRUE;
						    }
		        }
		}
		return FALSE;
	}
	function get_error_message()
	{
		return $this->error;
	}
     function get_user()
	{
		 $user =$this->ci->administrator_model-> get_user();
            if ($user !==FALSE)
            {
				return $user;
			}else{
				return False;
			}
	}
	function get_user_By_id($id_user)
	{
		 $user =$this->ci->administrator_model-> get_user_By_id($id_user);
            if ($user !==FALSE)
            {
				return $user;
			}else{
				return False;
			}
	}
	public function _data_user($user)
    {
		if($user !== NULL){
		return	 $data=array(
		    'id'           => $user->id,
            'nom'           => $user->nom,
			'prenom'        => $user->prenom,
			'username'      => $user->username,
			'password'      => $this->encrypt->decode($user->password),
			'jour'          => substr($user->dns,8,2),
			'mois'          => substr($user->dns, 5, 2),
			'annee'         => substr($user->dns, 0, 4),
			'status'        => $user->status,
            'n_cwefd'       => substr($user->username,7,2),
			'id_user_cwefd' => substr($user->username,4,2),
			'group_perms'   =>$this-> auth_onefd->get_All_Permissions_By_Id_User($user->n_cwefd,$user->id_user_cwefd));
		}else{
			return NULL;
		}
		
	} 
	public function is_admin_master()
	{
		if ($this->logged_in() AND $this->is_logged_in(TRUE)) {	
		     $admin_master = 'admin_master';
		     $is_admin_master=$this->ci->administrator_model->is_admin_master($admin_master);
	 
	         return $is_admin_master;
		}else{
			 return false;
		}
		
	}
	public function is_admin()
	{
		if ($this->logged_in() AND $this->is_logged_in(TRUE)) {	
		     $admin = $this->ci->config->item('admin_group', 'onefd_auth');
		     $isAdmin=$this->ci->administrator_model->is_admin($admin);
	 
	         return $isAdmin;
		}else{
			 return false;
		}
		
	}

     public function get_cwefdBy_ID_user()
	{
		 $user =$this->ci->administrator_model->get_cwefdBy_ID_user();
		 if ($user !==FALSE)
            {
				return $user;
			}else{
				return False;
			}
	} 
	
     public function get_max_ID_user()
	{	
	return $this->ci->administrator_model->get_Max_Id_Use_by_N_Cwefd(); 
	
	}
	
	function create_user($data,$permission,$perms_count)
	{
		
	    $nom             =$data['nom'];
	    $prenom          =$data['prenom'];
	    $username        =$data['username'];
	    $password        =$data['password'];
	    $dns             =$data['dns'];
	    $n_cwefd         =$data['n_cwefd'];
	    $id_user_cwefd   =$data['id_user_cwefd'];
	    $status          =$data['status'];
	    $group           =$data['group'];
	    $data_inset=array(
            'nom'           => $nom,
			'prenom'        => $prenom,
			'username'      => $username,
			'password'      => $this->ci->encrypt->encode($password),
			'dns'           => $dns,
			'status'        => $status,
            'group'         => $group,
			'n_cwefd'       => $n_cwefd,
			'id_user_cwefd' => $id_user_cwefd);
	  return   $resultat =$this->ci->administrator_model->insert($data_inset,$permission,$perms_count); 
	}
	
	function update_user($data,$permission,$perms_count){
		 $nom             =$data['nom'];
	    $prenom          =$data['prenom'];
	    $username        =$data['username'];
	    $password        =$data['password'];
	    $dns             =$data['dns'];
		$n_cwefd         =$data['n_cwefd'];
	    $id_user_cwefd   =$data['id_user_cwefd'];
	    $status          =$data['status'];

	    $data_update=array(
            'nom'           => $nom,
			'prenom'        => $prenom,
			'username'      => $username,
			'password'      => $this->ci->encrypt->encode($password),
			'dns'           => $dns,
			'n_cwefd'       => $n_cwefd,
			'id_user_cwefd' => $id_user_cwefd,
			'status'        => $status);
	  return   $resultat =$this->ci->administrator_model->update_user($data_update,$permission,$perms_count);
	}
	
	function get_All_Users(){
		return $this->ci->administrator_model->get_All_Users__by_N_Cwefd($this->ci->config->item('default_group', 'onefd_auth')); 
	}
	function get_Count_All_Users(){
		return $this->ci->administrator_model->get_Count_Users__by_N_Cwefd($this->ci->config->item('default_group', 'onefd_auth')); 
	}
	
	function get_All_Permissions_By_Id_User($n_cwefd,$id_user_cwefd){
		
		$group_permissions=array();
      
		 $group_permissions=$this->ci->administrator_model->get_All_Permissions_By_Id_User($n_cwefd,$id_user_cwefd); 
		 return $group_permissions;
	}
	function _All_Permissions_By_Id_User(){
		
		     $group_permissions=array();
      		 $group_permissions=$this->ci->administrator_model->_All_Permissions_By_Id_User(); 
		    return $group_permissions;
	}
	function _All_Niv_By_Id_User(){
		
		     $niv_user=array();
      		 $niv_user=$this->ci->administrator_model->_All_Niv_By_Id_User(); 
		    return $niv_user;
	}
	
	
	function update_status_All_Users($status,$status_count,$users){
		
		return	$this->ci->administrator_model->update_status_All_Users($status,$status_count,$users);
				
	}
	
}
