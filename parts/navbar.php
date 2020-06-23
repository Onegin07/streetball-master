<!-- Главное бокове меню -->
<div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">

  <a class="navbar-brand" href="/">
    <img alt="Streetball Players Platform" height="70" src="assets/img/logo-3x3.png" />
  </a>
  <div class="d-flex align-items-center">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-block d-lg-none ml-2">
      <div class="dropdown">
        <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img alt="Image" src="assets/img/avatar-male-4.jpg" class="avatar" />
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="profile.php" class="dropdown-item">Профиль</a>
          <a href="logout.php" class="dropdown-item">Выход</a>
        </div>
      </div>
    </div>
  </div>
  <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
    <ul class="navbar-nav d-lg-block">

      <li class="nav-item">
        <a class="nav-link" href="/">Главная</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/calendar.php">Календарь турниров</a>
      </li>

      <li class="nav-item">

        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">Рейтинг игроков</a>
        <div id="submenu-2" class="collapse">
          <ul class="nav nav-small flex-column">

            <li class="nav-item">
              <a class="nav-link" href="http://streetball.local/players-rating.php?gender=m">Мужчины</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="http://streetball.local/players-rating.php?gender=u">Юноши</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="http://streetball.local/players-rating.php?gender=w">Женщины</a>
            </li>

          </ul>
        </div>

      </li>

      <li class="nav-item">

        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">Рейтинг команд</a>
        <div id="submenu-3" class="collapse">
          <ul class="nav nav-small flex-column">

            <li class="nav-item">
              <a class="nav-link" href="http://streetball.local/team-rating.php?gender=m">Мужчины</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="http://streetball.local/team-rating.php?gender=u">Юноши</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="http://streetball.local/team-rating.php?gender=w">Женщины</a>
            </li>

          </ul>
        </div>

      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Еще какой-то пункт</a>
      </li>

    </ul>
    <hr>
    <div class="d-none d-lg-block w-100">
      <ul class="nav nav-small flex-column mt-2">
        <li class="nav-item">
          <a href="#" class="nav-link">О платформе</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Документация</a>
        </li>
        <li class="nav-item">
          <a href="http://streetball.in.ua/" class="nav-link">Сайт УСЛ 3х3</a>
        </li>
        <li class="nav-item">
          <a href="http://streetball.in.ua/featured/214-pravila-usl-3h3.html" class="nav-link">Правила баскетбола 3х3</a>
        </li>
      </ul>
      <hr>
    </div>
  </div>
  <?php
    // если вход выполнен
    if(isset($_COOKIE["player_id"])) {
      $sql = "SELECT * FROM players WHERE id=" . $_COOKIE["player_id"]; // выбираем из БД вошедшего игрока
      $result = mysqli_query($connect, $sql); // выполняем запрос
      $player = mysqli_fetch_assoc($result); // создаем ассоциацию с вошедшим игроком
  ?>      
  <div class="d-none d-lg-block">
    <div class="dropup">
      <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img alt="Image" src="../assets/img/avatars/<?php if($player['photo'] == ""){echo 'noname.png';} else{echo $player['photo'];} ?>" class="avatar" />
        <span><?php if($player['firstName'] == "") {echo "Неопознанный";} else{echo $player['firstName'];} ?>&nbsp;<?php if($player['lastName'] == "") {echo "Игрок";} else{echo $player['lastName'];} ?></span>
      </a>
      <div class="dropdown-menu">
        <a href="profile.php" class="dropdown-item">Профиль</a>
        <a href="logout.php" class="dropdown-item">Выход</a>
      </div>
    </div>
  </div>
  <?php
    } else {
      echo "Пожалуйста авторизируйтесь";
    }
 ?>
</div>