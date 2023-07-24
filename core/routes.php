<?php

use Lights\Controllers\PagesController;

get('/', 'index');
get('/article/$id', [new PagesController, 'index']);
get('/articles', [new PagesController, 'show']);
get('/insert', [new PagesController, 'insert']);

get('/mon-coeur/$name', [new PagesController, 'herz']);

any('/404','404');
