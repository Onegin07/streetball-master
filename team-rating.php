<!doctype html>
<html lang="ru">


<?php
    
    // Header
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

    // Главное боковое меню
    include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
  ?>

   <body>

    <div class="layout layout-nav-side">
      
      <?php
        // Главное боковое меню
        include $_SERVER['DOCUMENT_ROOT'] . '/parts/navbar.php';
      ?>
      <div class="main-container">
        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Главная</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Рейтинг команд</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Рейтинг команд</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Город</th>
                    <th scope="col">Рейтинг</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        // если гет запрос равен мужчине
                         if ($_GET['gender'] == 'm') {
                        // создаем запрос для получения всех продуктов
                        $sql = "SELECT * FROM teams WHERE categoryID = '1' ORDER BY rankPoints desc";
                        // заносим в переменную результаты запроса
                        $result = $connect->query($sql);
                        // запускаем цикл, присваиваем переменной row строку из переменной $result
                        // и пока row не равен NULL выводим данные о продукте
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                  <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["city"] ?></td>
                    <td><?php echo $row["rankPoints"] ?></td>
                  </tr>
                  <?php
                    }
                }
                  ?>

                   <?php
                         // если гет запрос равен юноше
                         if ($_GET['gender'] == 'u') {
                        // создаем запрос для получения всех продуктов
                        $sql = "SELECT * FROM teams WHERE categoryID = '3, 4' ORDER BY rankPoints desc";
                        // заносим в переменную результаты запроса
                        $result = $connect->query($sql);
                        // запускаем цикл, присваиваем переменной row строку из переменной $result
                        // и пока row не равен NULL выводим данные о продукте
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                  <tr>
                   <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["city"] ?></td>
                    <td><?php echo $row["rankPoints"] ?></td>
                  </tr>
                  <?php
                    }
                }
                  ?>

                   <?php
                         // если гет запрос равен женщине
                         if ($_GET['gender'] == 'w') {
                        // создаем запрос для получения всех продуктов
                        $sql = "SELECT * FROM teams WHERE categoryID = '2' ORDER BY rankPoints desc";
                        // заносим в переменную результаты запроса
                        $result = $connect->query($sql);
                        // запускаем цикл, присваиваем переменной row строку из переменной $result
                        // и пока row не равен NULL выводим данные о продукте
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                  <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["city"] ?></td>
                    <td><?php echo $row["rankPoints"] ?></td>
                  </tr>
                  <?php
                    }
                }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- Required vendor scripts (Do not remove) -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    <!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->

    <!-- Autosize - resizes textarea inputs as user types -->
    <script type="text/javascript" src="assets/js/autosize.min.js"></script>
    <!-- Flatpickr (calendar/date/time picker UI) -->
    <script type="text/javascript" src="assets/js/flatpickr.min.js"></script>
    <!-- Prism - displays formatted code boxes -->
    <script type="text/javascript" src="assets/js/prism.js"></script>
    <!-- Shopify Draggable - drag, drop and sort items on page -->
    <script type="text/javascript" src="assets/js/draggable.bundle.legacy.js"></script>
    <script type="text/javascript" src="assets/js/swap-animation.js"></script>
    <!-- Dropzone - drag and drop files onto the page for uploading -->
    <script type="text/javascript" src="assets/js/dropzone.min.js"></script>
    <!-- List.js - filter list elements -->
    <script type="text/javascript" src="assets/js/list.min.js"></script>

    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="assets/js/theme.js"></script>

  </body>

</html>