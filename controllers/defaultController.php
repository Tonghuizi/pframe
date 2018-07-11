<?php
/**
* 
*/
class DefaultController extends Controller
{
	
	function __construct()
	{
		# code...
	}


    public function page404()
    {
        $this->render('404');
    }

}