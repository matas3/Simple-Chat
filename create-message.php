<?php

require_once "helpers.php";

$ip = getClientIp();
$database = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=simple_chat;", "postgres", "secret");
$statement = $database->prepare("
	INSERT INTO messages (author_name, message, ip)
	VALUES (:author_name, :message, :ip)
");
$statement->execute([
	":author_name" => $ip,
	":message" => $_POST["message"],
	":ip" => $ip,

]);
