<!-- файл обеспечивает редактирование данных игрока в таблице players
	 базы данных streetball -->
<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

// проверяем существуют ли POST-запросы созданные формой
// заполнения итогов турнира eventsResultsFrom.php
if(isset($_POST["1st"]) && isset($_POST["2nd"])) {

	//если да, то создаем множественный запрос для базы данных
	$sql = "UPDATE `players` SET `rankPoints` = `rankPoints`+1000
			WHERE `teamID` = '" .$_POST["1st"] . "';";
    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+800
    			WHERE `teamID` = '" .$_POST["2nd"] . "';";
    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+700
        			WHERE `teamID` = '" .$_POST["3rd"] . "';";
    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+600
        			WHERE `teamID` = '" .$_POST["semiFinal"] . "';";

    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+400
            			WHERE `teamID` = '" .$_POST["quarterFinal1"] . "';";
    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+400
                			WHERE `teamID` = '" .$_POST["quarterFinal2"] . "';";
    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+400
                			WHERE `teamID` = '" .$_POST["quarterFinal3"] . "';";
    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+400
                            WHERE `teamID` = '" .$_POST["quarterFinal4"] . "';";

    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+100
                			WHERE `teamID` = '" .$_POST["group1"] . "';";
    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+100
                            WHERE `teamID` = '" .$_POST["group2"] . "';";
    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+100
                            WHERE `teamID` = '" .$_POST["group3"] . "';";
    $sql.= "UPDATE `players` SET `rankPoints` = `rankPoints`+100
                            WHERE `teamID` = '" .$_POST["group4"] . "';";

	//посылаем запрос и делаем проверку
    // удачно ли осуществился запрос
	if(!$connect->multi_query($sql)) {
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

    $sql1 = "UPDATE `teams` SET
             `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                            WHERE `teamID`='" .$_POST["1st"] . "' )
             WHERE `id` = '" .$_POST["1st"] . "';";

    $sql1.= "UPDATE `teams` SET
             `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                            WHERE `teamID`='" .$_POST["2nd"] . "' )
             WHERE `id` = '" .$_POST["2nd"] . "';";

    $sql1.= "UPDATE `teams` SET
             `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                            WHERE `teamID`='" .$_POST["3rd"] . "' )
             WHERE `id` = '" .$_POST["3rd"] . "';";

    $sql1.= "UPDATE `teams` SET
                 `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                                WHERE `teamID`='" .$_POST["semiFinal"] . "' )
                 WHERE `id` = '" .$_POST["semiFinal"] . "';";


    $sql1 = "UPDATE `teams` SET
             `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                            WHERE `teamID`='" .$_POST["quarterFinal1"] . "' )
             WHERE `id` = '" .$_POST["quarterFinal1"] . "';";

    $sql1.= "UPDATE `teams` SET
             `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                            WHERE `teamID`='" .$_POST["quarterFinal2"] . "' )
             WHERE `id` = '" .$_POST["quarterFinal2"] . "';";

    $sql1.= "UPDATE `teams` SET
             `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                            WHERE `teamID`='" .$_POST["quarterFinal3"] . "' )
             WHERE `id` = '" .$_POST["quarterFinal3"] . "';";

    $sql1.= "UPDATE `teams` SET
                 `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                                WHERE `teamID`='" .$_POST["quarterFinal4"] . "' )
                 WHERE `id` = '" .$_POST["quarterFinal4"] . "';";

    $sql1 = "UPDATE `teams` SET
                 `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                                WHERE `teamID`='" .$_POST["group1"] . "' )
                 WHERE `id` = '" .$_POST["group1"] . "';";

        $sql1.= "UPDATE `teams` SET
                 `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                                WHERE `teamID`='" .$_POST["group2"] . "' )
                 WHERE `id` = '" .$_POST["group2"] . "';";

        $sql1.= "UPDATE `teams` SET
                 `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                                WHERE `teamID`='" .$_POST["group3"] . "' )
                 WHERE `id` = '" .$_POST["group3"] . "';";

        $sql1.= "UPDATE `teams` SET
                     `rankPoints` = `rankPoints` + (SELECT SUM(rankPoints) FROM players
                                                    WHERE `teamID`='" .$_POST["group4"] . "' )
                     WHERE `id` = '" .$_POST["group4"] . "';";
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

    $sqlDelete = "DELETE FROM `calendar` WHERE `id`='" . $_POST["tournamentID"] . "'";
    $connect->query($sqlDelete);
    // если да, то переходим на страницу playersList
    header("location: http://" . $_SERVER['HTTP_HOST'] . '/admin/playersList.php');
}
?>