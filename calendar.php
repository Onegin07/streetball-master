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
      ?>

      <div class="main-container">

        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Главная</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Календарь турниров</li>
            </ol>
          </nav>
        </div>

        <!-- Блок контента -->
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-12">
                <div class="row content-list-head m-2">
                  <div class="col-auto">
                    <h1>Календарь турниров</h1>
                  </div>
                  <form class="col-md-auto">
                    <div class="input-group input-group-round">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">filter_list</i>
                        </span>
                      </div>
                      <input type="search" class="form-control filter-list-input" placeholder="Поиск по турнирам" aria-label="Поиск по турнирам">
                    </div>
                  </form>
                </div>
                 <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Дата и время</th>
                    <th scope="col">Организатор</th>
                    <th scope="col">Команд</th>
                  </tr>
                </thead>
                 <tbody>
                    <?php
                        // создаем запрос для получения всех events
                        $sql = "SELECT * FROM calendar";
                        // заносим в переменную результаты запроса
                        $result = $connect->query($sql);
                        // запускаем цикл, присваиваем переменной row строку из переменной $result
                        // и пока row не равен NULL выводим данные о event
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <td><?php echo $row["id"] ?></td><!-- выводим ай ди турниров -->
                    <td><?php echo $row["name"] ?></td><!-- выводим имена турниров -->
                    <td><?php echo $row["date"] ?></td><!-- выводим даты и время турниров -->
                    <?php
                    // Делаем запрос на вывод организаторов турниров
                    $sqlOrg = "SELECT * FROM organizers WHERE id=" . $row['organizerID'];
                    $resultOrg = $connect->query($sqlOrg);
                    // Запускаем цикл на вывод организаторов турниров
                    while($org = mysqli_fetch_assoc($resultOrg)) {
                    ?>
                    <td><?php echo $org['firstName']; ?>&nbsp;<?php echo $org['lastName']; ?></td><!-- выводим имена организаторов турниров -->
                    <?php
                    // Делаем запрос на вывод колличества команд в турнирах
                    $sqlTeams = "SELECT * FROM registeredteams WHERE tournamentID =" . $row["id"];
                    $resultTeams = $connect->query($sqlTeams);
                    // создаем переменную с колличеством команд
                    $count = mysqli_num_rows($resultTeams);
                    ?>
                    <td><?php echo $count ?></td><!-- выводим количество команд в турнирах -->
                    <?php
                    // Если статус рваен 1
                    if ($row["status"] == 1) {
                    ?>
                    <td><a href="/events-single.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary btn-sm">
                            Регистрация
                        </a><!--то делаем кнопку для регистрации на турниры -->
                      </td>
                      <?php
                      // иначе
                      } else {
                        ?>
                      <td><button type="button" title="" class="btn btn-primary btn-sm" disabled>Регистрация</button><!-- делаем не активную кнопку для регистрации -->
                      </td>
                      <?php
                      }
                    ?>
                    </tr>
                    <?php
                  }
                  }
                    ?>
                  </div>
                </div>
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