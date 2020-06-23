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

        <div class="container">
          <div class="row justify-content-center">
            <div class="content-list-body row">
              <div class="page-header">
                <h1 class="display-4 mb-3">Панель администратора</h1>
              </div>
              <div class="col-lg-6">
                <div class="card card-project">
                  <div class="card-body">
                    <div class="card-title">
                      <a href="#">
                        <h5 data-filter-by="text">Зарегистрировано игроков</h5>
                      </a>
                    </div>
                    <div class="card-meta d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <i class="material-icons mr-1">account_circle</i>
                        <span class="text-small">1250</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card card-project">
                  <div class="card-body">
                    <div class="card-title">
                      <a href="#">
                        <h5 data-filter-by="text">Создано команд</h5>
                      </a>
                    </div>
                    <div class="card-meta d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <i class="material-icons mr-1">account_circle</i>
                        <span class="text-small">475</span>
                      </div>
                    </div>
                  </div>
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