<?php

use Lights\Controllers\AdminController;
use Lights\Controllers\PagesController;


// APP ROUTES
get('/', 'index');
get('/article/$id', [new PagesController, 'index']);
get('/articles', [new PagesController, 'show']);
get('/insert', [new PagesController, 'insert']);
get('/redirect', [new PagesController, 'redirect']);
get('/mon-coeur', [new PagesController, 'herz']);


// ADMIN ROUTES
get('/admin', [new AdminController, 'index']);


// FAILED ROUTES
any('/404','404');
