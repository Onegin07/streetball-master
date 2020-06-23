<!-- файл обеспечивает добавление игрока в таблицу players
	 базы данных streetball -->
<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
// блок обработки добавления игрока
// проверяем существуют ли POST-запросы созданные формой добавления игрока
if(isset($_POST["playerFirstName"]) && isset($_POST["playerLastName"])) {
	//если да, то создаем запрос для базы данных
	$sql = "INSERT INTO players (firstName, lastName, gender, age, height, weight, teamID,
	                             phone, email, facebook, instagram, telegram, rankPoints)
	        VALUES ('" . $_POST["playerFirstName"] . "',
	                '" . $_POST["playerLastName"] . "',
	                '" . $_POST["gender"] . "',
	                '" . $_POST["age"] . "',
	                '" . $_POST["height"] . "',
	                '" . $_POST["weight"] . "',
	                '" . $_POST["playerTeam"] . "',
	                '" . $_POST["phone"] . "',
	                '" . $_POST["email"] . "',
	                '" . $_POST["facebook"] . "',
	                '" . $_POST["instagram"] . "',
	                '" . $_POST["telegram"] . "',
	                '" .$_POST["playerRank"] . "')";

	//посылаем запрос и делаем маленькую проверку
	// проверяем удачно ли осуществился запрос
	if($connect->query($sql)) {
		// если да, то переходим на страницу playersList
		header("location: http://" . $_SERVER['HTTP_HOST'] . "/admin/playersList.php");
	}else {
		// если нет выводим сообщение
		echo"Malfunction";
	}
}
?>