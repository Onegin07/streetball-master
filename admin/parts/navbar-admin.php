
<!-- Главное бокове меню -->
<div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">

  <a class="navbar-brand" href="/">
    <img alt="Streetball Players Platform" height="70" src="/admin/assets/img/logo-3x3.png" />
  </a>
  <div class="d-flex align-items-center">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-block d-lg-none ml-2">
      <div class="dropdown">
        <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img alt="Image" src="/admin/assets/img/avatar-male-4.jpg" class="avatar" />
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="profile.php" class="dropdown-item">Профиль</a>
          <a href="logout.php" class="dropdown-item">Выход</a>
        </div>
      </div>
    </div>
  </div>
  <?php

  	if(isset($_COOKIE["user_id"])):
  ?>
  <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
    <ul class="navbar-nav d-lg-block">

      <li class="nav-item">
        <a class="nav-link" href="/admin">Админпанель</a>
      </li>
      <hr>
      <li class="nav-item">

        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">Туры</a>
        <div id="submenu-1" class="collapse">
          <ul class="nav nav-small flex-column">

            <li class="nav-item">
              <a class="nav-link" href="/admin/toursList.php">Все туры</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/admin/toursNew.php">Создать новый</a>
            </li>

          </ul>
        </div>

      </li>

      <li class="nav-item">

        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">Турниры</a>
        <div id="submenu-2" class="collapse">
          <ul class="nav nav-small flex-column">

            <li class="nav-item">
              <a class="nav-link" href="/admin/eventsList.php">Все турниры</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/admin/eventsNew.php">Создать новый</a>
            </li>

          </ul>
        </div>

      </li>

      <li class="nav-item">

        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">Игроки</a>
        <div id="submenu-3" class="collapse">
          <ul class="nav nav-small flex-column">

            <li class="nav-item">
              <a class="nav-link" href="/admin/playersList.php">Все игроки</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/admin/playersNew.php">Добавить</a>
            </li>

          </ul>
        </div>

      </li>

      <li class="nav-item">

        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4">Команды</a>
        <div id="submenu-4" class="collapse">
          <ul class="nav nav-small flex-column">

            <li class="nav-item">
              <a class="nav-link" href="/admin/teamsList.php">Все команды</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/admin/teamsNew.php">Добавить</a>
            </li>

          </ul>
        </div>

      </li>

      <li class="nav-item">

          <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-2">Прошедшие турниры</a>
          <div id="submenu-5" class="collapse">
            <ul class="nav nav-small flex-column">

              <li class="nav-item">
                <a class="nav-link" href="/admin/eventsList.php">Все прошедшие турниры</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/admin/eventsNew.php">Добавить прошедший турнир</a>
              </li>

            </ul>
          </div>

      </li>

    </ul>

  </div>

  <?php
  	endif;
  ?>
  <div class="d-none d-lg-block">
    <div class="dropup">
    <?php
        // проверяем залогинился ли admin
        if(isset($_COOKIE["user_id"])) {
    ?>
      <a href="/admin/exit.php" class="btn btn-dark bt-lg">
        <img alt="Image" src="/admin/assets/img/avatar-male-4.jpg" class="avatar" />
        <span>Выйти</span>
      </a>
      <?php
            } else {
      ?>
            <img alt="Image" src="/admin/assets/img/avatar-male-4.jpg" class="avatar" />
            <button class="btn btn-dark bt-lg" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
      <?php
            }
      ?>
    </div>
  </div>
</div>
