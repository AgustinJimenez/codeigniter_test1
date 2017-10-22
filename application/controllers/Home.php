<?php
class Home extends MY_Controller 
{

    public function welcome( )
    {
        $this->to_admin_template( 'pages/home/welcome_message' );
    }
}