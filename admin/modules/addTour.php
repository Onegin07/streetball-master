<!-- файл обеспечивает добавление тура в таблицу tours
	 базы данных streetball -->
<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
// блок обработки добавления тура
// проверяем существуют ли POST-запросы созданные формой добавления тура
if(isset($_POST["tourName"])) {
	//если да, то создаем запрос для базы данных
	$sql = "INSERT INTO tours (name, startDate, endDate, numTournament, description)
	        VALUES ('" . $_POST["tourName"] . "',
	                '" . $_POST["dateStart"] . "',
	                '" . $_POST["dateEnd"] . "',
	                '" . $_POST["quantity"] . "',
	                '" . $_POST["description"] . "')";

	//посылаем запрос и делаем маленькую проверку
	// проверяем удачно ли осуществился запрос
	if($connect->query($sql)) {
		// если да, то переходим на страницу toursList
		header("location: http://" . $_SERVER['HTTP_HOST'] . "/admin/toursList.php");
	}else {
		// если нет выводим сообщение
		echo "Malfunction";
	}
}
?>
