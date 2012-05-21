<?php

require_once("File/IMC.php");

function main($args) {
	try {
		check_args($args);
	} catch (Exception $e) {
		print($e->getMessage()."\n");
		exit(1);
	}

	$file = $args[1];
	$items = parse_vcard($file);
	exec_split($items);
}

function check_args($args) {
	if (false === isset($args[1])) {
		throw new Exception("argument error");
	}
	if (false === file_exists($args[1])) {
		throw new Exception("file not found");
	}
}

function parse_vcard($file) {
	$parser = File_IMC::parse("vCard");
	$items = $parser->fromFile($file);
	return $items;
}

function write_file($info) {
}

function exec_split($items) {
	print("exec split\n");
	$builder = File_IMC::build("vCard");
	foreach ($items as $item) {
		#write_file($item);
	}
}

main($argv);
