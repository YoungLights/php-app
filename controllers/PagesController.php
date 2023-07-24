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

	public function herz($name)
	{
		view('buhu', ['name' => $name]);
	}

	public function insert()
	{
		$data = [
			'title' => 'Hey this is an UPDATE',
			'body' => 'Lorem bla blu blii yeehhaahh nice'
		];	
		update('articles', $data, 76);
		view('insert');
	}
}