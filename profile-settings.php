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

        <div class="breadcrumb-bar navbar bg-white sticky-top">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Главная</a>
              </li>
              <li class="breadcrumb-item"><a href="profile.php">Профиль</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Настройки</li>
            </ol>
          </nav>

        </div>
        <div class="container">
          <div class="row justify-content-center mt-5">
            <div class="col-lg-3 mb-3">
              <ul class="nav nav-tabs flex-lg-column" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Информация</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#social" role="tab" aria-controls="profile" aria-selected="false">Социальные сети</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Изменить пароль</a>
                </li>
              </ul>
            </div>
            <div class="col-xl-8 col-lg-9">
              <div class="card">
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane fade show active" role="tabpanel" id="profile">
                      <?php
                        if(isset($_COOKIE["player_id"])) {
                          $sql = "SELECT * FROM players WHERE id=" . $_COOKIE["player_id"]; // выбираем из БД вошедшего игрока
                          $result = mysqli_query($connect, $sql); // выполняем запрос
                          $player = mysqli_fetch_assoc($result); // создаем ассоциацию с вошедшим игроком
                        }
                      ?>  
                      <form action="profile-update.php" method="post" enctype="multipart/form-data">
                        <div class="media mb-4">
                          <img alt="Image" src="assets/img/avatars/<?php if($player['photo'] == ""){echo 'noname.png';} else{echo $player['photo'];} ?>" class="avatar avatar-lg" />
                          <div class="media-body ml-3">
                            <div class="custom-file custom-file-naked d-block mb-1">
                              <input type="file" class="custom-file-input d-none" id="avatar-file" name="avatar-file">
                              <label class="custom-file-label position-relative" for="avatar-file">
                                <span class="btn btn-primary">
                                  Загрузить фото
                                </span>
                              </label>
                            </div>
                            <small>
                              Загрузите ваше реальное фото<br>
                              Минимальный размер изображения - 256х256, формат - jpg или png
                            </small>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Имя</label>
                          <div class="col">
                            <input type="text" placeholder="Имя" name="profile-first-name" class="form-control" value="<?php echo $player['firstName']; ?>" required />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Фамилия</label>
                          <div class="col">
                            <input type="text" placeholder="Фамилия" name="profile-last-name" class="form-control" value="<?php echo $player['lastName']; ?>" required />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Email</label>
                          <div class="col">
                            <input type="email" placeholder="Введите актуальный email" name="profile-email" class="form-control" value="<?php echo $player['email']; ?>" required />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Моб. телефон</label>
                          <div class="col">
                            <input type="tel" placeholder="38 0XX XXX-XX-XX" name="profile-tel" class="form-control" value="<?php echo $player['phone']; ?>" required />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Город</label>
                          <div class="col">
                            <input type="text" placeholder="Город, в котором проживаете" name="profile-location" class="form-control" value="<?php echo $player['city']; ?>" required />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Пол</label>
                          <div class="col-3">
                            <select class="form-control" name="profile-gender" required>
                              <?php 
                                if($player["gender"] == "") {
                                  echo "<option value='none' selected>Не указано</option>";
                                  echo "<option value='m'>Мужчина</option>";
                                  echo "<option value='w'>Женщина</option>";
                                }
                                if($player["gender"] == "m") {
                                    echo "<option value='" . $player["gender"] . "' selected>Мужчина</option>";
                                    echo "<option value='w'>Женщина</option>";
                                } 
                                if($player["gender"] == "w") {
                                  echo "<option value='" . $player["gender"] . "' selected>Женщина</option>";
                                  echo "<option value='m'>Мужчина</option>";
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Возраст</label>
                          <div class="col-3">
                            <input type="number" placeholder="Ваш возраст" name="profile-age" class="form-control" value="<?php echo $player['age']; ?>" />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Рост</label>
                          <div class="col-3">
                            <input type="number" placeholder="Ваш рост" name="profile-height" class="form-control" value="<?php echo $player['height']; ?>" />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Вес</label>
                          <div class="col-3">
                            <input type="number" placeholder="Ваш вес" name="profile-weight" class="form-control" value="<?php echo $player['weight']; ?>" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-3">О себе</label>
                          <div class="col">
                            <textarea placeholder="Расскажите немного о себе" name="profile-about" class="form-control" rows="4"><?php echo $player['about']; ?></textarea>
                            <small>Эта информация, кроме email-адреса и телефона, будет доступна в вашем публичном профиле.</small>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <button type="submit" name="submit-info" class="btn btn-primary">Сохранить</button>
                        </div>
                      </form>

                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="social">
                      
                      <form action="profile-update.php" method="post">
                        <div class="form-group row align-items-center">
                          <label class="col-3">Facebook</label>
                          <div class="col">
                            <input type="text" placeholder="Ссылка на страницу facebook" name="profile-fb" class="form-control" value="<?php echo $player['facebook']; ?>" />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Instagram</label>
                          <div class="col">
                            <input type="text" placeholder="Ссылка на страницу instagram" name="profile-insta" class="form-control" value="<?php echo $player['instagram']; ?>" />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Telegram</label>
                          <div class="col">
                            <input type="text" placeholder="@username" name="profile-tg" class="form-control" value="<?php echo $player['telegram']; ?>" />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <button type="submit" class="btn btn-primary" name="submit-social">Сохранить</button>
                        </div>
                      </form>

                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="password">
                      
                      <form>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Текущий пароль</label>
                          <div class="col">
                            <input type="password" placeholder="Введите текущий пароль" name="password-current" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Новый пароль</label>
                          <div class="col">
                            <input type="password" placeholder="Введите новый пароль" name="password-new" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-3">Подтвердите пароль</label>
                          <div class="col">
                            <input type="password" placeholder="Подтвердите новый пароль" name="password-new-confirm" class="form-control" />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <button type="submit" class="btn btn-primary">Сменить пароль</button>
                        </div>
                      </form>
                      
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