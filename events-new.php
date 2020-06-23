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
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="events-list.php">Турниры</a></li>
              <li class="breadcrumb-item active" aria-current="page">Создать новый</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Создать новый турнир</h1>
              <form>
                <div class="form-group row align-items-center">
                  <label class="col-2">Название турнира</label>
                  <div class="col">
                    <input type="text" placeholder="Название турнира" class="form-control" required />
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-2">Организатор</label>
                  <div class="col">
                    <input type="text" placeholder="Организатор (человек или организация)" class="form-control" required />
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-2">Дата и время</label>
                  <div class="col-3">
                    <input type="datetime-local" class="form-control" required />
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-2">Место проведения</label>
                  <div class="col">
                    <input type="text" placeholder="Город и локация" class="form-control" required />
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-2">Вебсайт</label>
                  <div class="col">
                    <input type="text" placeholder="Например, http://streetball.in.ua/" class="form-control" required />
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-2">Категории</label>
                  <div class="col-3">
                    <select class="form-control" multiple>
                      <option value="m">Мужская</option>
                      <option value="m-u18">Мужская U18</option>
                      <option value="w">Женская</option>
                      <option value="w-u18">Женская U18</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-2">Описание турнира</label>
                  <div class="col">
                    <textarea placeholder="Краткая информация" class="form-control" rows="4"></textarea>
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