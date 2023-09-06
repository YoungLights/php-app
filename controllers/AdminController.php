<?php

namespace Lights\Controllers;

class AdminController 
{
	public function index()
	{
		view('admin/login');
	}

	public function login()
	{
		dd('login');
	}

	public function logout()
	{
		dd('logout');
	}
}