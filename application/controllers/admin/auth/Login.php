<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{
	public function login_page()
	{
		$this->load->view( 'pages/admin/login' );
	}
}