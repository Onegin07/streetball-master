<!-- файл обеспечивает редактирование данных игрока в таблице players
	 базы данных streetball -->
<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

// блок обработки посылания сообщения
// проверяем существуют ли POST-запросы созданные формой редактирования данных игрока
if(isset($_POST["playerFirstName"]) && isset($_POST["id"])) {
	//если да, то создаем запрос для базы данных
	$sql = "UPDATE `players` SET
	                      `firstName` = '" . $_POST["playerFirstName"] . "',
                          `lastName` = '" . $_POST["playerLastName"] . "',
                          `gender` = '" . $_POST["gender"] . "',
                          `age` = '" . $_POST["age"] . "',
                          `height` = '" . $_POST["height"] . "',
                          `weight` = '" . $_POST["weight"] . "',
                          `teamID` = '" . $_POST["playerTeam"] . "',
                          `phone` = '" . $_POST["phone"] . "',
                          `email` = '" . $_POST["email"] . "',
                          `facebook` = '" . $_POST["facebook"] . "',
                          `instagram` = '" . $_POST["instagram"] . "',
                          `telegram` = '" . $_POST["telegram"] . "',
                          `rankPoints` = '" .$_POST["playerRank"] . "'
			WHERE `id` = '" .$_POST["id"] . "';";


	//посылаем запрос и делаем проверку
	// удачно ли осуществился запрос
	if($connect->query($sql)) {
		// если да, то переходим на страницу playersList
		header("location: http://" . $_SERVER['HTTP_HOST'] . '/admin/playersList.php');
	}else {
		// если нет выводим сообщение
		echo"Malfunction";
	}
}
?>