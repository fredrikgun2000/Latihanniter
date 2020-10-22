<?php namespace App\Controllers;

class Home extends BaseController
{
	public function indexlogin()
	{
		return view('login');
	}

	public function indexverify()
	{
		return view('verify');
	}

	public function indexadmin()
	{
		return view('dashboard');
	}

	public function indexmahasiswa()
	{
		return view('dashboard_mahasiswa');
	}

	//--------------------------------------------------------------------

}
