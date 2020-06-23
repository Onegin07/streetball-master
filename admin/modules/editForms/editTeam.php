<!-- файл обеспечивает редактирование команды в таблице teams
	 базы данных streetball -->
<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

// блок обработки посылания сообщения
// проверяем существуют ли POST-запросы созданные формой редактирования команды
if(isset($_POST["teamName"]) && isset($_POST["city"]) && isset($_POST["category"]) && isset($_POST["teamRank"])) {
	//если да, то создаем запрос для базы данных
	$sql = "UPDATE `teams` SET
							`name`= '" . $_POST["teamName"] . "',
							`categoryID`='" . $_POST["category"] . "',
							`city`='" . $_POST["city"] . "',
							`rankPoints`='" .$_POST["teamRank"] . "'
			WHERE `id` = '" .$_POST["id"] . "';";


	//посылаем запрос и делаем маленькую проверку
	// проверяем удачно ли осуществился запрос
	if($connect->query($sql)) {
		// если да, то переходим на страницу teamsList
		header("location: http://" . $_SERVER['HTTP_HOST'] . '/admin/teamsList.php');
	}else {
		// если нет выводим сообщение
		echo"Malfunction";
	}
}
?>