<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Global
|--------------------------------------------------------------------------
*/
$config['ssl_enabled'] 							= FALSE;

/*
|--------------------------------------------------------------------------
| Sign In
|--------------------------------------------------------------------------
*/
$config['sign_in_recaptcha_enabled'] 			= FALSE;
$config['sign_in_recaptcha_offset'] 			= 3;

/*
|--------------------------------------------------------------------------
| Sign Up
|--------------------------------------------------------------------------
*/
$config['sign_up_recaptcha_enabled'] 			= TRUE;
$config['sign_up_auto_sign_in'] 				= TRUE;

/*
|--------------------------------------------------------------------------
| Sign Out
|--------------------------------------------------------------------------
*/
$config['sign_out_view_enabled'] 				= TRUE;

/*
|--------------------------------------------------------------------------
| Third Party Auth
|--------------------------------------------------------------------------
*/
$config['third_party_auth_providers'] 			= array('facebook', 'twitter');
/*
|--------------------------------------------------------------------------
| Password Reset
|--------------------------------------------------------------------------
|
|	password_reset_expiration		Reset password form will be valid for 30 mins (default)
|	password_reset_secret 			Reset password token salt. See https://www.grc.com/passwords.htm
|									* IMPORTANT * Do not reuse the password reset salt else where!
|	password_reset_email 			Reset password sender email
*/
$config['password_reset_expiration'] 			= 1800;
$config['password_reset_secret'] 				= '';
$config['password_reset_email'] 				= 'no-reply@your-site.com';

		
/* End of file account.php */
/* Location: ./application/modules/account/config/account.php */