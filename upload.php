<?php
	
	//Загрузка картинок на сервер
	
	$target_dir = "assets/img/avatars/"; // папка дял загрузки аватаров
	$target_file = $target_dir . basename($_FILES["avatar-file"]["name"]); // название загружаемого файла
	$uploadOk = 1; // переменная статуса загрузки и наличия ошибок
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // расширение файлов
	
	// Проверка является ли файл картинкой
	if(isset($_POST["submit-info"])) {
	  $check = getimagesize($_FILES["avatar-file"]["tmp_name"]);
	  if($check !== false) {
	    //echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
	  } else {
	    echo "Файл не является картинкой.";
	    $uploadOk = 0;
	  }
	}

	// Проверка существует ли уже файл
	if (file_exists($target_file)) {
	  echo "Извините, такой файл уже существует.";
	  $uploadOk = 0;
	}

	// Проверка размера файла (max 3mb)
	if ($_FILES["avatar-file"]["size"] > 3*1048576) {
	  echo "Извините, файл слишком большой (максимально 3mb).";
	  $uploadOk = 0;
	}

	// Разрешить определенные форматы файлов
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Извините, только JPG, JPEG, PNG и GIF файлы разрешены для загрузки.";
	  $uploadOk = 0;
	}

	// Проверка $uploadOk на наличие ошибок
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// если все ок, то загружаем файл
	} else {
	  if (move_uploaded_file($_FILES["avatar-file"]["tmp_name"], $target_file)) {
	    echo "Файл ". basename( $_FILES["avatar-file"]["name"]). " был загружен на сервер.";
	  } else {
	    echo "Ошибка загрузки файла";
	  }
	}

?>