<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - MY Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2017, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

class MY_Controller extends CI_Controller
{
	/**
	 * Class constructor
	 */

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('var_dump');
	}

	protected function to_simple_template( $view_path, $data = [] ) 
    { 
        $this->load_template( 'templates/simple/index', $view_path, $data ); 
    } 
 
    protected function to_admin_template( $view_path, $data = [] ) 
    { 
        $this->load_template( 'templates/admin/content', $view_path, $data ); 
    } 
 
    protected function load_template( $template_path, $view_path = null, $data = []) 
    { 
        if ( !$view_path and ! file_exists(APPPATH.'views/pages/'.$view_path.'.php') ) 
            show_404(); 
 
        $this->load->view( $template_path, ['content' => $this->load->view( $view_path, $data, true)]); 
    } 

    protected function ajax()
    {
        $_SERVER['HTTP_X_REQUESTED_WITH'] = isset($_SERVER['HTTP_X_REQUESTED_WITH'])?$_SERVER['HTTP_X_REQUESTED_WITH']:'';

        if( $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest' )
        {
            show_404(); 
            exit;
        }
    }
    

}

/* End of file MY_Controller.php */
/* Location: /community_auth/core/MY_Controller.php */