<?php 

class Dashboard extends AdminController 
{

    public function index()
    {
        $this->to_admin_template( 'pages/admin/dashboard' );
    }
}