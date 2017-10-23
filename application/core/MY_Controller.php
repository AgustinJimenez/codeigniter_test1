<?php

class MY_Controller extends CI_Controller 
{

    function __construct()
    {
        parent::__construct(); 
        $this->load->helper('url');
        //$this->load->helper('var_dump_helper');
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
 
}

class AdminController extends MY_Controller 
{
    public function __construct() 
    {
       parent::__construct();
       $this->load->library('ion_auth');
       $this->load->helper('custom_form_helper');

       if( !$this->ion_auth->logged_in() )
        redirect( site_url('/auth/login'), 'local');
    }

}
