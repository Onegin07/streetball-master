<?php

	//Это файл для выхода из профиля

// подключаем файл настроек сайта
include $_SERVER['DOCUMENT_ROOT'] . '/configs/setup.php';

setcookie("player_id", "", 0); // удаляем куки

header("Location: /"); // переадресация на главную страницу

?>