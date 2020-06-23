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
              <li class="breadcrumb-item active" aria-current="page">Моя команда</li>
            </ol>
          </nav>

        </div>

        <!-- Блок контента -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
              <div class="page-header">
                <h1>Моя команда</h1>
                <p class="lead">Чебурашки <span class="badge badge-pill badge-success">3500</span></p>
                <div class="d-flex align-items-center">
                  <ul class="avatars">

                    <li>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="Marcus Simmons">
                        <img alt="Marcus Simmons" class="avatar" src="assets/img/avatar-male-1.jpg" />
                      </a>
                    </li>

                    <li>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="Harry Xai">
                        <img alt="Harry Xai" class="avatar" src="assets/img/avatar-male-2.jpg" />
                      </a>
                    </li>
                    
                    <li>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="David Whittaker">
                        <img alt="David Whittaker" class="avatar" src="assets/img/avatar-male-4.jpg" />
                      </a>
                    </li>

                    <li>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="Kenny Tran">
                        <img alt="Kenny Tran" class="avatar" src="assets/img/avatar-male-6.jpg" />
                      </a>
                    </li>
                    
                    <li>
                      <img alt="" class="avatar" src="assets/img/none-grey.png" />
                    </li>
                    <li>
                      <img alt="" class="avatar" src="assets/img/none-grey.png" />
                    </li>

                  </ul>
                  <button class="btn btn-round" data-toggle="modal" data-target="#user-invite-modal" title="Добавить игрока">
                    <i class="material-icons">add</i>
                  </button>
                </div>
              </div>
              <hr>
              <div class="content-list-body row">

                <div class="col-6">
                  <a class="media media-member" href="#">
                    <img alt="Marcus Simmons" src="assets/img/avatar-male-1.jpg" class="avatar avatar-lg" />
                    <div class="media-body">
                      <h6 class="mb-0" data-filter-by="text">Marcus Simmons</h6>
                      <span class="badge badge-pill badge-success">3500</span>
                    </div>
                  </a>
                </div>

                <div class="col-6">
                  <a class="media media-member" href="#">
                    <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg" class="avatar avatar-lg" />
                    <div class="media-body">
                      <h6 class="mb-0" data-filter-by="text">Harry Xai</h6>
                      <span class="badge badge-pill badge-success">3500</span>
                    </div>
                  </a>
                </div>

                <div class="col-6">
                  <a class="media media-member" href="#">
                    <img alt="David Whittaker" src="assets/img/avatar-male-4.jpg" class="avatar avatar-lg" />
                    <div class="media-body">
                      <h6 class="mb-0" data-filter-by="text">David Whittaker</h6>
                      <span class="badge badge-pill badge-success">3500</span>
                    </div>
                  </a>
                </div>

                <div class="col-6">
                  <a class="media media-member" href="#">
                    <img alt="Kenny Tran" src="assets/img/avatar-male-6.jpg" class="avatar avatar-lg" />
                    <div class="media-body">
                      <h6 class="mb-0" data-filter-by="text">Kenny Tran</h6>
                      <span class="badge badge-pill badge-success">3500</span>
                    </div>
                  </a>
                </div>

              </div>
              <form class="modal fade" id="user-invite-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Пригласить в команду</h5>
                      <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <!--end of modal head-->
                    <div class="modal-body">
                      <p>Отправить ссылку-приглашение на email</p>
                      <div>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">email</i>
                            </span>
                          </div>
                          <input type="email" class="form-control" placeholder="Email-адрес игрока" aria-label="Email-адрес игрока">
                        </div>
                      </div>
                    </div>
                    <!--end of modal body-->
                    <div class="modal-footer">
                      <button role="button" class="btn btn-primary" type="submit">
                        Пригласить
                      </button>
                    </div>
                  </div>
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