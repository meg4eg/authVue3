<?php

// INIT
require('./cfg/config.php');
require('./core/functions.php');

init_classes();

DB::connect();

header('Content-Type: application/json');

$request = json_decode(file_get_contents('php://input'), true);

$data = User::addUser([
	"first_name" => htmlspecialchars($request["first_name"]),
	"last_name" => htmlspecialchars($request["last_name"]),
	"email" => htmlspecialchars($request["email"])
]);

echo json_encode(['success', 'new id: '. $data['id']], JSON_UNESCAPED_UNICODE);

