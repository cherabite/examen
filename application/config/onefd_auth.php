<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$config['site_title']                 = "onefd.edu.dz";      
$config['admin_email']                = "kamelcrefd19@gmail.com"; 
$config['default_group']              = 'members';           
$config['admin_group']                = 'admin';            
$config['identity']                   = 'username';            	

/*
 | -------------------------------------------------------------------------
 | Cookie options.
 | -------------------------------------------------------------------------
 | remember_cookie_name Default: remember_code
 | identity_cookie_name Default: identity
 */
$config['remember_cookie_name']     = 'remember_code';
$config['identity_cookie_name']     = 'identity';
/*
 | -------------------------------------------------------------------------
 |Capatcha.
 | -------------------------------------------------------------------------
 | 
 */ 
$config['annee_inscript']           = '2019/2018';  
$config['captcha_path']             = 'captcha/';
$config['captcha_fonts_path']       = 'captcha/fonts/4.ttf';
$config['captcha_width']            = 120;
$config['captcha_height']           = 30;
$config['captcha_font_size']        = 14;
$config['captcha_grid']             = FALSE;
$config['captcha_expire']           = 300;
$config['captcha_case_sensitive']   = TRUE;
$config['word_length']              = 4;
/*
|
|*********************  form ins
|
|********************* min_prenomlat_length
|
*/
$config['min_prenomlat_length']     = 2;
$config['max_prenomlat_length']     = 30;
$config['min_nomlat_length']        = 2;
$config['max_nomlat_length']        = 30;
$config['min_nom_length']           = 2;
$config['max_nom_length']           = 30;
$config['min_prenom_length']        = 2;
$config['max_prenom_length']        = 30;
$config['min_adress_length']           = 2;
$config['max_adress_length']           = 60;
/*
 | -------------------------------------------------------------------------
 |Pdf.
 | -------------------------------------------------------------------------
 | 
 */
 $config['fourmulaire_preinscription']  = 0;
 $config['attestation_preinscription']  = 1;
 $config['convocation_cours']           = 2;
 $config['inscri_valid']                = 3;
 $config['folder_save_pdf'] = './assets/pdfs/';