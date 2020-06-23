<!-- файл обеспечивает добавление команды в таблицу teams
	 базы данных streetball -->
<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
// блок обработки добавления команды
// проверяем существуют ли POST-запросы созданные формой добавления команды
if(isset($_POST["teamName"]) && isset($_POST["category"])) {
	//если да, то создаем запрос для базы данных
	$sql = "INSERT INTO teams (name, categoryID, city, rankPoints)
	        VALUES ('" . $_POST["teamName"] . "',
	                '" . $_POST["category"] . "',
	                '" . $_POST["city"] . "',
	                '" .$_POST["teamRank"] . "')";

	//посылаем запрос и делаем маленькую проверку
	// проверяем удачно ли осуществился запрос
	if($connect->query($sql)) {
		// если да, то переходим на страницу teamsList
		header("location: http://" . $_SERVER['HTTP_HOST'] . "/admin/teamsList.php");
	}else {
		// если нет выводим сообщение
		echo"Malfunction";
	}
}
?>