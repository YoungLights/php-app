<?php

namespace Lights\Controllers;

class PagesController 
{
	public function index($id) 
	{
		view('article', ['id' => $id]);
	}

	public function show()
	{
		$articles = all("SELECT * FROM articles");
		view('articles', ['articles'  => $articles]);
	}

	public function herz()
	{
		view('buhu', ['name' => 'Catherine']);
	}

	public function redirect()
	{
		redirect('', ['title' => 'hello World']);
	}

	public function insert()
	{
		$data = [
			'title' => 'Hey this is an UPDATE',
			'body' => 'Lorem bla blu blii yeehhaahh nice'
		];	
		destroy('articles', 12);
		view('insert');
	}
}