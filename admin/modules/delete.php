<!-- файл обеспечивает удаление продуктов из таблицы products
	 базы данных shopmaster -->
<?php
// загружаем базу данных
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
// проверяем существуют ли GET-запросы
if(isset($_GET['id']) && isset($_GET['flag'])) {

    $flag = $_GET['flag'];

    switch($flag){
        case "team":
            // создаем запрос для удаления команды из таблицы teams
            $sql = "DELETE FROM teams WHERE id='" . $_GET['id'] . "'";
            $path = '/admin/teamsList.php';
        break;

        case "player":
            // создаем запрос для удаления команды из таблицы players
            $sql = "DELETE FROM players WHERE id='" . $_GET['id'] . "'";
            $path = '/admin/playersList.php';
        break;

        case "event":
            // создаем запрос для удаления команды из таблицы calendar
            $sql = "DELETE FROM calendar WHERE id='" . $_GET['id'] . "'";
            $path = '/admin/eventsList.php';
        break;

        case "tour":
            // создаем запрос для удаления команды из таблицы tours
            $sql = "DELETE FROM tours WHERE id='" . $_GET['id'] . "'";
            $path = '/admin/toursList.php';
        break;
    }

    // проверяем удачно ли осуществился запрос
    if($connect->query($sql)) {
        // если да, то переходим на страницу teamsList
        header("location: http://" . $_SERVER['HTTP_HOST'] . $path);
    } else {
        // если нет выводим сообщение об ошибке
        echo "<h2>Mulfanction</h2>";
    }
}
?>