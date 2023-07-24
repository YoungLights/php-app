<?php

use Lights\Core\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use RedAnt\TwigComponents\Registry as ComponentsRegistry;
use RedAnt\TwigComponents\Extension as ComponentsExtension;

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
	$loader = new FilesystemLoader(dirname(__DIR__) . '/views'); 
	$loader->addPath(dirname(__DIR__) . '/views/components');
	$twig = new Environment($loader);

	$componentsRegistry = new ComponentsRegistry($twig);

	$components = require 'components.php';
	// dd($components);
	foreach($components as $name => $path) {
		$componentsRegistry->addComponent($name, $path);
		// dd($path);
	}
	
	$componentsExtension = new ComponentsExtension($componentsRegistry);
	$twig->addExtension($componentsExtension);
	
	echo $twig->render($view . ".html", $data);
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