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
    protected $extra_js = [];
    protected $extra_css = [];

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');   
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

    protected function ajax_only( $exceptions_list = [] )
    {
        $request_url = explode( '/', $_SERVER['REQUEST_URI'] );
        array_shift($request_url);
        array_shift($request_url);
        $request_url = implode('/', $request_url);
        if( !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : '' == 'XMLHttpRequest') and !(in_array($request_url, $exceptions_list) ? true : false) )
        {
            show_404(); 
            exit;
        }
    }

    protected function add_js( $path_to_file = null )
    {
        if( !isset($this->load->extra_js) )
            $this->load->extra_js = [];

        $this->add_file( $path_to_file , 'js' );
    }

    protected function add_css( $path_to_file = null )
    {
        if( !isset($this->load->extra_css) )
            $this->load->extra_css = [];

        $this->add_file( $path_to_file , 'css' );
    }
    
    protected function add_file( $path_to_file = null, $type = 'js' )
    {
        if( is_array($path_to_file) )
            if( $type == 'js' )
                foreach ($path_to_file as $path) 
                    array_push( $this->load->extra_js , $path );
            else
                foreach ($path_to_file as $path)
                    array_push( $this->load->extra_css , $path );
        else
            if( $type == 'js' )
                array_push( $this->load->extra_js , $path_to_file );
            else
                array_push( $this->load->extra_css , $path_to_file );

    }
}

/* End of file MY_Controller.php */
/* Location: /community_auth/core/MY_Controller.php */