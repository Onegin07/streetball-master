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
        include $_SERVER['DOCUMENT_ROOT'] . '/parts/navbar-admin.php';
      ?>

      <div class="main-container">
        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Главная</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Список турниров</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Список турниров</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Локация</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Тур</th>
                    <th scope="col">Опции</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Khimik Streetball Party vol. 11</td>
                    <td>Южный</td>
                    <td>30.05.2020</td>
                    <td>УСЛ 3х3 2020</td>
                    <td>
                      <a href="#" title="Редактировать турнир" class="btn btn-primary btn-sm">
                          Изменить
                      </a>
                      <button type="button" title="Удалить турнир" class="btn btn-danger btn-sm" style="cursor:pointer;">
                          Удалить
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Khimik Streetball Party vol. 11</td>
                    <td>Южный</td>
                    <td>30.05.2020</td>
                    <td>УСЛ 3х3 2020</td>
                    <td>
                      <a href="#" title="Редактировать турнир" class="btn btn-primary btn-sm">
                          Изменить
                      </a>
                      <button type="button" title="Удалить турнир" class="btn btn-danger btn-sm" style="cursor:pointer;">
                          Удалить
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Khimik Streetball Party vol. 11</td>
                    <td>Южный</td>
                    <td>30.05.2020</td>
                    <td>УСЛ 3х3 2020</td>
                    <td>
                      <a href="#" title="Редактировать турнир" class="btn btn-primary btn-sm">
                          Изменить
                      </a>
                      <button type="button" title="Удалить турнир" class="btn btn-danger btn-sm" style="cursor:pointer;">
                          Удалить
                      </button>
                    </td>
                  </tr>
                  
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