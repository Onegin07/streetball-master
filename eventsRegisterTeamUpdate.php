<!-- файл обеспечивает редактирование данных игрока в таблице registeredteams
	 базы данных streetball -->
<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

// проверяем существуют ли POST-запросы созданные формой
// заполнения итогов турнира eventsResultsFrom.php
if(isset($_POST["teamID"]) && isset($_POST["tournamentID"])) {

	//если да, то создаем множественный запрос для базы данных
	$sql = "INSERT INTO registeredteams (tournamentID, teamID)
    	        VALUES ('" . $_POST["tournamentID"] . "',
    	                '" .$_POST["teamID"] . "')";
    $connect->query($sql);

    $sql1= "UPDATE `players` SET `teamID` = '" .$_POST["teamID"] . "'
    			WHERE `id` = '" .$_POST["1st"] . "';";
    $sql1.= "UPDATE `players` SET `teamID` = '" .$_POST["teamID"] . "'
        			WHERE `id` = '" .$_POST["2nd"] . "';";
    $sql1.= "UPDATE `players` SET `teamID` = '" .$_POST["teamID"] . "'
        			WHERE `id` = '" .$_POST["3rd"] . "';";
    $sql1.= "UPDATE `players` SET `teamID` = '" .$_POST["teamID"] . "'
            			WHERE `id` = '" .$_POST["4th"] . "';";


	//посылаем запрос и делаем проверку
    // удачно ли осуществился запрос
	if(!$connect->multi_query($sql1)) {
        // если нет выводим ошибку
	    echo "Malfunction: (" . $mysqli->errno . ")" . $mysqli->error;
	}
	// если да, то запускаем цикл
	do {
	    if($res = $connect->store_result()) {
	        // получаем все результаты
            ($res->fetch_all(MYSQLI_ASSOC));
            // очищаем переменную
            $res->free();
	    }
	} while ($connect->more_results() && $connect->next_result());




		// если да, то переходим на страницу playersList
		header("location: http://" . $_SERVER['HTTP_HOST'] . '/');
}
?>