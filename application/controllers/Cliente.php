<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends MY_Controller 
{
	public function index()
	{
		$this->to_admin_template( 'pages/cliente/index' );
	}
}