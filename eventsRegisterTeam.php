<!doctype html>
<html lang="ru">

  <?php
    // Конфигурация БД
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

    // Head
    include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
  ?>

  <body>

    <div class="layout layout-nav-side">

      <?php
        // Главное боковое меню
        include $_SERVER['DOCUMENT_ROOT'] . '/parts/navbar.php';
            // создаем запрос для получения всех продуктов
             $sql = "SELECT P.id, concat(P.lastName, ' ', P.firstName) AS FullName
                    FROM players AS P
                    ORDER BY lastName";
             // заносим в переменную результаты запроса
             $result = $connect->query($sql);
             $rowCount = mysqli_num_rows($result);
             // запускаем цикл, который действует пока row не равен Null
             while($row = mysqli_fetch_assoc($result)) {
                 $player['id'][] = $row['id'];
                 $player['name'][] = $row['FullName'];
             }

      ?>

      <div class="main-container">

        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="calendar.php">Календарь турниров</a></li>
              <li class="breadcrumb-item"><a href="events-single.php">Khimik Streetball Party vol. 11</a></li>
              <li class="breadcrumb-item active" aria-current="page">Регистрация команды</li>
            </ol>
          </nav>
        </div>

        <!-- Блок контента -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Регистрация команды на турнир</h1>
              <form action="/eventsRegisterTeamUpdate.php" method="POST">
                <!-- создаем неотображаемый тег для отправки id турнира -->
                <input type="hidden" name="tournamentID" value="<?php echo $_GET['id'] ?>">
                <div class="form-group row align-items-center">
                  <label class="col-2">Название команды</label>
                  <div class="col">
                    <select class="form-control" name="teamID" required>
                        <?php
                            $sqlTeam = "SELECT * FROM teams";
                            // получаем результат из базы данных
                            $resultTeam = $connect->query($sqlTeam);
                            // запускаем цикл, который действует пока $category не равен Null
                            while($team = mysqli_fetch_assoc($resultTeam)) {
                         ?>
                            <!-- присваиваем value значение id, а также выводим название категории, полученное из базы данных -->
                            <option value="<?php echo $team['id']; ?>"><?php echo $team['name']; ?></option>
                        <?php
                                }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-2">Категория</label>
                  <div class="col-3">
                    <select class="form-control" name="category" required>
                        <?php
                            $sqlCategories = "SELECT * FROM categories";
                            // получаем результат из базы данных
                            $resultCategories = $connect->query($sqlCategories);
                            // запускаем цикл, который действует пока $category не равен Null
                            while($category = mysqli_fetch_assoc($resultCategories)) {
                         ?>
                            <!-- присваиваем value значение id, а также выводим название категории, полученное из базы данных -->
                            <option value="<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></option>
                        <?php
                                }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-2">Игрок 1</label>
                  <div class="col">
                    <select class="form-control" name="1st" required>
                         <?php
                            // запускаем цикл
                             for($i=0; $i<$rowCount; $i++):
                          ?>
                             <!-- присваиваем value значение id, а также выводим имя игрока, полученное из базы данных -->
                             <option value="<?php echo $player['id'][$i] ?>"><?php echo $player['name'][$i] ?></option>
                         <?php
                            endfor;
                         ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Игрок 2</label>
                  <div class="col">
                    <select class="form-control" name="2nd" required>
                        <?php
                          // запускаем цикл
                           for($i=0; $i<$rowCount; $i++):
                        ?>
                           <!-- присваиваем value значение id, а также выводим имя игрока, полученное из базы данных -->
                           <option value="<?php echo $player['id'][$i] ?>"><?php echo $player['name'][$i] ?></option>
                       <?php
                          endfor;
                       ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Игрок 3</label>
                  <div class="col">
                    <select class="form-control" name="3rd" required>
                        <?php
                          // запускаем цикл
                           for($i=0; $i<$rowCount; $i++):
                        ?>
                           <!-- присваиваем value значение id, а также выводим имя игрока, полученное из базы данных -->
                           <option value="<?php echo $player['id'][$i] ?>"><?php echo $player['name'][$i] ?></option>
                       <?php
                          endfor;
                       ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Игрок 4 (не обяз.)</label>
                  <div class="col">
                    <select class="form-control" name="4th">
                        <?php
                          // запускаем цикл
                           for($i=0; $i<$rowCount; $i++):
                        ?>
                           <!-- присваиваем value значение id, а также выводим имя игрока, полученное из базы данных -->
                           <option value="<?php echo $player['id'][$i] ?>"><?php echo $player['name'][$i] ?></option>
                       <?php
                          endfor;
                       ?>
                    </select>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
              </form>
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