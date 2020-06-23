<!-- файл обеспечивает редактирование тура в таблице tours
	 базы данных streetball -->
<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

// блок обработки посылания сообщения
// проверяем существуют ли POST-запросы созданные формой редактирования турнира
if(isset($_POST["tourName"]) && isset($_POST["id"])) {
	//если да, то создаем запрос для базы данных
	$sql = "UPDATE `tours` SET
							`name`= '" . $_POST["tourName"] . "',
							`startDate`='" .$_POST["dateStart"] . "',
							`endDate`='" .$_POST["dateEnd"] . "',
							`numTournament`='" . $_POST["quantity"] . "',
							`description`='" . $_POST["description"] . "'
			WHERE `id` = '" .$_POST["id"] . "';";


	//посылаем запрос и делаем маленькую проверку
	// проверяем удачно ли осуществился запрос
	if($connect->query($sql)) {
		// если да, то переходим на страницу toursList
		header("location: http://" . $_SERVER['HTTP_HOST'] . '/admin/toursList.php');
	}else {
		// если нет выводим сообщение
		echo"Malfunction";
	}
}
?>