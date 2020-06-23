<?php
	
	// Конфигурация БД
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

	// Подключаем обработку загрузки картинок на сервер
	include $_SERVER['DOCUMENT_ROOT'] . '/upload.php';

	// если отправлен POST-запрос во вкладке Информация
	if(isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["submit-info"])) {

		// запрос на поиск юзера в БД 
		$sql = "SELECT * FROM players WHERE id=" . $_COOKIE["player_id"];
		$result = $connect->query($sql);
		$player = mysqli_fetch_assoc($result); 

		// Определяем загружен ли аватар
		if(basename($_FILES["avatar-file"]["name"]) != "") {
			$avatar = basename($_FILES["avatar-file"]["name"]);
		} else {
			$avatar = $player['photo'];
		}		

		// изменение данных в БД
		$sql = "UPDATE players SET firstName='" . $_POST['profile-first-name'] . "', lastName='" . $_POST['profile-last-name'] . "', photo='" . $avatar . "', email='" . $_POST['profile-email'] . "', phone='" . $_POST['profile-tel'] . "', city='" . $_POST['profile-location'] . "', gender='" . $_POST['profile-gender'] . "', age='" . $_POST['profile-age'] . "', height='" . $_POST['profile-height'] . "', weight='" . $_POST['profile-weight'] . "', about='" . $_POST['profile-about'] . "' WHERE id=" . $player['id'];
 
		// если запрос выполнен, выводим сообщение
		if(mysqli_query($connect, $sql)) {
			header("Location: /profile-settings.php");
		} else { // иначе выводим сообщение об ошибке
		  echo "<h2 style=\"color: red;\">Ошибка: " . mysqli_error($connect) . " </h2>";
		}
	}

	// если отправлен POST-запрос во вкладке Социальные сети
	if(isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["submit-social"])) {

		// запрос на поиск юзера в БД 
		$sql = "SELECT * FROM players WHERE id=" . $_COOKIE["player_id"];
		$result = $connect->query($sql);
		$player = mysqli_fetch_assoc($result); 

		// изменение данных в БД
		$sql = "UPDATE players SET facebook='" . $_POST['profile-fb'] . "', instagram='" . $_POST['profile-insta'] . "', telegram='" . $_POST['profile-tg'] . "' WHERE id=" . $player['id'];
 
		// если запрос выполнен, выводим сообщение
		if(mysqli_query($connect, $sql)) {
			header("Location: /profile-settings.php");
		} else { // иначе выводим сообщение об ошибке
		  echo "<h2 style=\"color: red;\">Ошибка: " . mysqli_error($connect) . " </h2>";
		}
	}

?>