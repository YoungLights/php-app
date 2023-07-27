<?php

use Lights\Controllers\AdminController;
use Lights\Controllers\PagesController;

get('/', 'index');
get('/article/$id', [new PagesController, 'index']);
get('/articles', [new PagesController, 'show']);
get('/insert', [new PagesController, 'insert']);
get('/redirect', [new PagesController, 'redirect']);

get('/mon-coeur', [new PagesController, 'herz']);

get('/login', [new AdminController, 'login']);
get('/admin', [new AdminController, 'index'], true);

any('/404','404');
