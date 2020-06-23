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

         <?php
          // Выводим турнир согласно гет запросу
          $sql = "SELECT * FROM calendar WHERE id =" . $_GET["id"];
          $result = $connect->query($sql);
          $event = mysqli_fetch_assoc($result); 
         ?>
        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="calendar.php">Календарь турниров</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $event['name']; ?></li>
            </ol>
          </nav>
        </div>
         
        <!-- Карта места проведения --> 
        <iframe src="<?php echo $event['map']; ?>" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        <!-- Блок контента -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
              <div class="page-header mb-4">
                <div class="media">
                  <img alt="Image" src="assets/img/logo-color.png" height="100" class="avatar avatar-lg mt-1" />
                  <div class="media-body ml-3">
                    <h1 class="mb-0"><?php echo $event['name']; ?></h1><!-- Имя турнира -->
                    <p class="lead">
                      <table class="table table-sm">
                        <thead align="center">
                          <tr>
                            <th scope="col">Дата и время начало</th>
                            <th scope="col">Город</th>
                            <th scope="col">Локация</th>
                            <th scope="col">Команд</th>
                          </tr>
                        </thead>
                        <tbody align="center">
                          <tr>
                            <td><?php echo $event['date']; ?></td><!-- Дата и время турнира -->
                            <td><?php echo $event['city']; ?></td><!-- Город проведения турнира -->
                            <td><?php echo $event['location']; ?></td><!-- Локация проведения турнира -->
                            <?php
                            // Выводим колличество команд согласно гет запросу турнира
                            $sqlTeams = "SELECT * FROM registeredteams WHERE tournamentID =" . $_GET["id"];
                              $resultTeams = $connect->query($sqlTeams);
                              $count = mysqli_num_rows($resultTeams);
                             ?>
                            <td><?php echo $count ?></td><!-- Колличество команд что учатсвует в данном турнире -->
                          </tr>
                        </tbody>
                      </table>                      
                    </p>
                </div>
              </div>
              <div class="mt-2 mb-4">
                <!-- Делаем переход на регистрацию команды -->
                <a href="/eventsRegisterTeam.php?id=<?php echo $_GET['id'] ?>" class="btn btn-primary btn-block" type="button" aria-haspopup="true" aria-expanded="false">
                  Зарегистрировать команду на турнир!
                </a>
              </div>
              <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#info" role="tab" aria-controls="teams" aria-selected="true">Информация</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#teams" role="tab" aria-controls="events" aria-selected="false">Команды</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#results" role="tab" aria-controls="results" aria-selected="false">Результаты</a>
                </li>
              </ul>
              
              <div class="tab-content">
                <div class="tab-pane fade show active" id="info" role="tabpanel" data-filter-list="content-list-body">
                  <table class="table table-sm">
                      <tbody>
                        <tr>
                          <th>Категории участников</th>
                          <td>
                           <?php
                           // Декадируем с джейсон формата инфо с категорий
                           $cat = json_decode($event['categoryID'], true);
                           // Запускаем цикл для вывода необходимых значений категории
                           for($i = 0; $i < count($cat['category']); $i++) {
                              ?>
                            <ul>
                              <li><?php echo $cat['category'][$i] ?></li><!-- информация с категорий -->
                            </ul>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th>Организационный взнос</th>
                          <td><?php echo $event['fee']; ?></td><!-- выводим взнос турнира-->
                        </tr>
                        <tr>
                          <th>Описание</th>
                          <td><?php echo $event['about']; ?></td><!-- выводим описание турнира-->
                        </tr>
                        <tr>
                          <th>Положения</th>
                          <td><?php echo $event['document']; ?></td><!-- выводим положение турнира -->
                        </tr>
                        <tr>
                          <th>Веб-сайт</th>
                          <td><?php echo $event['webSite']; ?></td><!-- выводим сайт турнира -->
                        </tr>
                        <tr>
                          <?php
                          // Делаем запрос на вывод организатора турнира
                          $sql = "SELECT * FROM organizers WHERE id=" . $event['organizerID'];
                          $result = $connect->query($sql);
                          $org = mysqli_fetch_assoc($result); 
                           ?>   
                          <th>Организатор</th>
                          <td><?php echo $org['firstName']; ?>&nbsp;<?php echo $org['lastName']; ?></td><!-- выводим имя организатора турнира -->
                        </tr>
                      </tbody>
                    </table> 
                </div>
                
                <div class="tab-pane fade" id="teams" role="tabpanel" data-filter-list="content-list-body">
                  <div class="row content-list-head">
                    <div class="col-auto">
                      <h3>Команды</h3>
                    </div>
                  </div>
                  <!--end of content list head-->
                  <?php
                  // Делаем запрос на вывод команд что участвуют в данном турнире
                  $sql = "SELECT * FROM teams WHERE categoryID =" . $_GET["id"];
                  $resultNT = $connect->query($sql);
                  while($teams = mysqli_fetch_assoc($resultNT)) {
                  ?>
                  <div class="content-list-body row">

                    <div class="col-12">
                      <div class="card card-task">
                        <div class="card-body">
                          <div class="card-title">
                            <a href="#">
                              <h6 data-filter-by="text"><?php echo $teams['name']; ?><span class="badge badge-pill badge-success"><?php echo $teams['rankPoints']; ?></span></h6>
                            </a>
                          </div>
                          <div class="card-meta">
                            <ul class="avatars">

                              <li>
                               <h6 data-filter-by="text"><?php echo $teams['city']; ?></h6>
                              </li>

                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="tab-pane fade" id="results" role="tabpanel" data-filter-list="content-list-body">
                  <p>Организатор еще не добавил результаты турнира</p>
                  <p>
                    <a href="events-results.php" class="btn btn-primary">Отправить результаты</a>
                  </p>
                <!--end of tab-->
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