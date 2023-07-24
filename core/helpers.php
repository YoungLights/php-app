<?php

use Lights\Core\Database;

// DUMP & DIE
function dd($value) {
	echo "<pre>";
	var_dump($value);
	echo "</pre>";
	die();
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

	$components = require 'components.php';
	foreach($components as $name => $path) {

	}
	
	include APP_ROOT . '/views/' . $view . '.php';
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