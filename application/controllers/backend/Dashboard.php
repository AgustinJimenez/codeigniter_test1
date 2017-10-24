<?php 

class Dashboard extends AdminController 
{

    public function index()
    {
        //dd( $this->lang );
        $this->to_admin_template( 'pages/admin/dashboard', compact('lang') );
            
    }
}