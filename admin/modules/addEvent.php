<!-- файл обеспечивает добавление турнира в таблицу tournaments
	 базы данных streetball -->
<?php
// foreach-ом пробегаемся по массиву $_POST["category"] и 
// каждое значение присваиваем ассоциативному массиву $arr
foreach($_POST["category"] as $elem) {
    $arr['category'][] = $elem;
}
// сериализуем массив $arr в json формат. JSON_UNESCAPED_UNICODE -
// позволяет передавать массив кириллицей, true - указывает, что 
// массив - ассоциативный
$json = json_encode($arr, JSON_UNESCAPED_UNICODE | true);


// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
// блок обработки добавления турнира
// проверяем существуют ли POST-запросы созданные формой добавления турнира
if(isset($_POST["eventName"]) && isset($_POST["eventCity"])) {
	//если да, то создаем запрос для базы данных
	$sql = "INSERT INTO calendar (name, city, location, date, status, webSite, categoryID, description, fee)
	        VALUES ('" . $_POST["eventName"] . "',
	                '" . $_POST["eventCity"] . "',
	                '" . $_POST["eventLocation"] . "',
	                '" . $_POST["date"] . "',
	                '" . $_POST["eventStatus"] . "',
	                '" . $_POST["webSite"] . "',
	                '" . $json . "',
	                '" . $_POST["description"] . "',
	                '" . $_POST["fee"] . "')";

	//посылаем запрос и делаем маленькую проверку
	// проверяем удачно ли осуществился запрос
	if($connect->query($sql)) {
		// если да, то переходим на страницу eventsList
		header("location: http://" . $_SERVER['HTTP_HOST'] . "/admin/eventsList.php");
	}else {
		// если нет выводим сообщение
		echo"Malfunction";
	}
}
?>
