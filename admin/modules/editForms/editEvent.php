<!-- файл обеспечивает редактирование турнира в таблице calendar
	 базы данных streetball -->
<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

// блок обработки посылания сообщения
// проверяем существуют ли POST-запросы созданные формой редактирования турнира
if(isset($_POST["eventName"]) && isset($_POST["id"])) {
	//если да, то создаем запрос для базы данных
	$sql = "UPDATE `calendar` SET
							`name`= '" . $_POST["eventName"] . "',
							`city` = '" . $_POST["eventCity"] . "',
							`location` = '" . $_POST["eventLocation"] . "',
							`date`='" .$_POST["date"] . "',
							`status` = '" . $_POST["eventStatus"] . "',
							`webSite`='" .$_POST["webSite"] . "',
							`fee`='" . $_POST["fee"] . "',
							`tourID`='" . $_POST["tour"] . "',
							`categoryID`='" . $_POST["category"] . "',
							`description`='" . $_POST["description"] . "'
			WHERE `id` = '" .$_POST["id"] . "';";


	//посылаем запрос и делаем маленькую проверку
	// проверяем удачно ли осуществился запрос
	if($connect->query($sql)) {
		// если да, то переходим на страницу eventsList
		header("location: http://" . $_SERVER['HTTP_HOST'] . '/admin/eventsList.php');
	}else {
		// если нет выводим сообщение
		echo"Malfunction";
	}
}
?>