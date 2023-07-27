<?php

namespace Lights\Controllers;

class AdminController 
{
	public function index()
	{
		echo 'hello world';
	}

	public function login()
	{
		view('admin/login');
	}
}