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

        // создаем запрос для получения всех команд зарегистрированных на турнир
        $sql = "SELECT T.name AS teamName, T.id AS teamID, C.name AS TournamentName
                FROM teams AS T, calendar AS C, registeredteams AS RT
                WHERE RT.tournamentID='" . $_GET['id'] . "' AND T.id=RT.teamID AND C.id=RT.tournamentID
                ORDER BY teamName";
        // заносим в переменную результаты запроса
        $result = $connect->query($sql);
        $rowCount = mysqli_num_rows($result);
        // запускаем цикл, который действует пока $team не равен Null
        while($row = mysqli_fetch_assoc($result)) {
            $team['id'][] = $row['teamID'];
            $team['name'][] = $row['teamName'];
        }
      ?>

      <div class="main-container">

        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="calendar.php">Каледарь турниров</a></li>
              <li class="breadcrumb-item"><a href="events-single.php">Khimik Streetball Party vol. 11</a></li>
              <li class="breadcrumb-item active" aria-current="page">Результаты</li>
            </ol>
          </nav>
        </div>

        <!-- Блок контента -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Результаты турнира</h1>

              <form action="eventsResultsUpdate.php" method="POST">

                <fieldset>
                <legend>Плей-офф раунд</legend>
                  <input type="hidden" name="tournamentID" value="<?php echo $_GET['id'] ?>">
                  <div class="form-group row align-items-center">
                    <label class="col-2">1 место</label>
                    <div class="col">
                     <select class="form-control" name="1st" required>
                         <?php
                             // запускаем цикл, который действует пока $team не равен Null
                             for($i=0; $i<$rowCount; $i++):
                          ?>
                             <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                             <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                         <?php
                            endfor;
                         ?>
                     </select>
                    </div>
                  </div>

                  <div class="form-group row align-items-center">
                    <label class="col-2">2 место</label>
                    <div class="col">
                      <select class="form-control" name="2nd" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row align-items-center">
                    <label class="col-2">3 место</label>
                    <div class="col">
                      <select class="form-control" name="3rd" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row align-items-center">
                    <label class="col-2">1/2</label>
                    <div class="col">
                      <select class="form-control" name="semiFinal" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row align-items-center">
                    <label class="col-2">1/4</label>
                    <div class="col">
                      <select class="form-control" name="quarterFinal1" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row align-items-center">
                    <label class="col-2">1/4</label>
                    <div class="col">
                      <select class="form-control" name="quarterFinal2" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row align-items-center">
                    <label class="col-2">1/4</label>
                    <div class="col">
                      <select class="form-control" name="quarterFinal3" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row align-items-center">
                    <label class="col-2">1/4</label>
                    <div class="col">
                      <select class="form-control" name="quarterFinal4" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>
              </fieldset>

              <fieldset>
                <legend>Групповой этап</legend>
                  <div class="form-group row align-items-center">
                    <label class="col-2">3 место</label>
                    <div class="col">
                      <select class="form-control" name="group1" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <label class="col-2">3 место</label>
                    <div class="col">
                      <select class="form-control" name="group2" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <label class="col-2">3 место</label>
                    <div class="col">
                      <select class="form-control" name="group3" required>
                           <?php
                               // запускаем цикл, который действует пока $team не равен Null
                               for($i=0; $i<$rowCount; $i++):
                            ?>
                               <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                               <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                           <?php
                              endfor;
                           ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                      <label class="col-2">3 место</label>
                      <div class="col">
                        <select class="form-control" name="group4" required>
                             <?php
                                 // запускаем цикл, который действует пока $team не равен Null
                                 for($i=0; $i<$rowCount; $i++):
                              ?>
                                 <!-- присваиваем value значение id, а также выводим название команды, полученное из базы данных -->
                                 <option value="<?php echo $team['id'][$i]; ?>"><?php echo $team['name'][$i]; ?></option>
                             <?php
                                endfor;
                             ?>
                        </select>
                      </div>
                </div>
              </fieldset>
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