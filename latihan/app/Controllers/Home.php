<?php namespace App\Controllers;

class Home extends BaseController
{
	public function indexlogin()
	{
		return view('login');
	}

	public function indexadmin()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
