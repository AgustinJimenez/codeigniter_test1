<?php
class Home extends MY_Controller 
{

    public function welcome( )
    {
        $this->to_simple_template( 'pages/home/welcome_message' );
    }
}