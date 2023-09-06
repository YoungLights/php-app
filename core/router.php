<?php

// GET
function get($route, $path_to_include, $auth = false){if ($_SERVER['REQUEST_METHOD'] == 'GET') {route($route, $path_to_include, $auth);}}

// POST
function post($route, $path_to_include, $auth = false){if ($_SERVER['REQUEST_METHOD'] == 'POST') {route($route, $path_to_include, $auth);}}

// PUT
function put($route, $path_to_include, $auth = false){if ($_SERVER['REQUEST_METHOD'] == 'PUT') {route($route, $path_to_include, $auth);}}

// DELETE
function delete($route, $path_to_include, $auth = false){if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {route($route, $path_to_include, $auth);}}

// ANY ROUTE
function any($route, $path_to_include, $auth = false){route($route, $path_to_include, $auth);}

// ROUTER CORE
function route($route, $path_to_include, $auth) {
	$callback = $path_to_include;

	if (!is_callable($callback)) {
		if(!is_array($path_to_include)) {
			if (!strpos($path_to_include, '.html')) {
				$path_to_include;
			}
		}
	}

	if ($route == "/404") {
		view($path_to_include);
		exit();
	}
	
	$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
	$request_url = rtrim($request_url, '/');
	$request_url = strtok($request_url, '?');
	$route_parts = explode('/', $route);
	$request_url_parts = explode('/', $request_url);
	array_shift($route_parts);
	array_shift($request_url_parts);

	if ($route_parts[0] == '' && count($request_url_parts) == 0) {
		if (is_callable($callback)) {
			call_user_func_array($callback, []);
			exit();
		}
		view($path_to_include);
		exit();
	}

	if (count($route_parts) != count($request_url_parts)) {
		return;
	}

	$parameters = [];

	for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {
		$route_part = $route_parts[$__i__];
		if (preg_match("/^[$]/", $route_part)) {
			$route_part = ltrim($route_part, '$');
			array_push($parameters, $request_url_parts[$__i__]);
			$$route_part = $request_url_parts[$__i__];
		} else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {
			return;
		}
	}

	if (is_callable($callback)) {
		if($auth) {
			if(isset($_SESSION['admin'])) {
				dd('hey admin');
			} else {
				dd('you are not authorized');
			}
		}
		call_user_func_array($callback, $parameters);
		exit();
	}

	view($path_to_include);
	exit();
}

// FOR JS
function out($text){echo htmlspecialchars($text);}

// SET CSRF TOKEN
function set_csrf() {
	session_start();
	if (!isset($_SESSION["csrf"])) {
		$_SESSION["csrf"] = bin2hex(random_bytes(50));
	}
	echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
}

// CHECK CSRF TOKEN
function is_csrf_valid() {
	session_start();
	if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {return false;}
	if ($_SESSION['csrf'] != $_POST['csrf']) {return false;}
	return true;
}
