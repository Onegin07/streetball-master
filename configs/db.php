<?php

	// параметры подключения к БД
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "streetball";

	$connect = new mysqli($server, $username, $password, $dbname); // объект подключения к БД

	$connect->set_charset('utf8'); // устанавливаем кодировку

	// Проверка связи с БД

	// if($connect) {
	// 	echo "Connect";
	// } else {
	// 	echo "DB Connect Failed";
	// }

?>