<?php

use Lights\Core\Database;

// DUMP & DIE
function dd($value) {
	echo "<pre>";
	var_dump($value);
	echo "</pre>";
	die();
}

// REDIRECT
function redirect($path = '', $data = []) {
	foreach($data as $item => $value) {
		$_SESSION[$item] = $value;
	}
	header("Location: " . ROOT . $path);
	exit();
}

// SESSION
function session($name) {
	if(isset($_SESSION[$name])) {
		echo $_SESSION[$name];
		unset ($_SESSION[$name]);
	}
}

// TIMESTAMP
function getYear() {
	$timestamp = time();
	$year = date('Y',$timestamp);
	echo $year;
}

// LOAD VIEWS
function view($view, $data = []) {
	extract($data);

	
	require 'components.php';
	foreach($components as $component => $path) {
		
	}
	
	if(!is_array($view)) {
		ob_start();
		include APP_ROOT . "/views/" . $view . '.php';
		$content = ob_get_clean();
		include APP_ROOT . '/views/layouts/' . $GLOBALS['globals']['LAYOUT'] . ".php";
	} else {
		echo "<h2>There went something wrong</h2><p>No such method in your controller</p>";
	}
}

// LOAD LAYOUT
function layout($name) {
	$GLOBALS['globals']['LAYOUT'] = $name;
}

// LOAD TEMPLATE
function template($name) {
	include 'views/templates/' . $name . '.php'; 
}

// DATABASE
function all($query) {
	$db = new Database();
	return $db->all($query);
}

function single($query, $param, $value) {
	$db = new Database();
	return $db->single($query, $param, $value);
}

function insert($table, $data) {
	$db = new Database();
	return $db->insert($table, $data);
}

function update($table, $data, $id) {
	$db = new Database();
	return $db->update($table, $data, $id);
}

function destroy($table, $id) {
	$db = new Database();
	return $db->destroy($table, $id);
}