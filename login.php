<!doctype html>
<html lang="ru">

  <?php
    // Конфигурация БД
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

    // подключаем файл настроек сайта
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/setup.php';

    // Head
    include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';

    if(isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST"){
    // генерируем пароль
    $password = md5($_POST['pass']);
    // проверяем совпадение
    if(isset($_POST["email"]) && isset($password) && $_POST["email"] != "" && $password != "") {
      
    $sql = "SELECT * FROM players WHERE email LIKE '" . $_POST["email"] . "' AND password LIKE '$password'";

    $result = mysqli_query($connect, $sql);
  
    $players_number = mysqli_num_rows($result);
  
    if($players_number == 1) {
      $player = mysqli_fetch_assoc($result); 
      setcookie("player_id",  $player["id"], time() + 3600*24); //создаем куки на сутки  
      header("Location: /"); // переадресация на главную
    } else {
      echo "<h2>Неверный логин/пароль</h2>";
    }
  }
}
  ?>

  <body>
    <div class="main-container fullscreen">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="text-center">
              <a class="navbar-brand" href="/">
                <img alt="Streetball Players Platform" height="70" src="assets/img/logo-3x3.png" />
              </a>
              <hr>
              <h1 class="h2">Добро пожаловать!</h1>
              <p class="lead">Войдите в свой профиль, чтобы продолжить</p>
              <form method="POST">
                <div class="form-group">
                  <input class="form-control" type="email" placeholder="Email-адрес" name="email">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" placeholder="Пароль" name="pass">
                  <div class="text-right">
                    <small><a href="resend.php">Не пришло письмо?</a>
                    </small>
                  </div>
                </div>
                <button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
                  Войти
                </button>
                <small>Еще нет профиля? <a href="register.php">Создать</a>
                </small>
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