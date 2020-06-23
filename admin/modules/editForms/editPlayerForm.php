  <?php
    // Header
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
  ?>
        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                      <li class="breadcrumb-item"><a href="/admin/playersList.php">Игроки</a></li>
              <li class="breadcrumb-item active" aria-current="page">Редактировать данные игрока</li>
            </ol>
          </nav>
        </div>
        <?php
            // проверяем существует ли запрос
            if(isset($_GET['id'])) {
                // создаем запрос для базы данных для редактирования игрока
                $sql = "SELECT * FROM players WHERE id='" . $_GET['id'] . "'";
                // получаем результат из базы данных
                $result = $connect->query($sql);
                // получаем количество строк результата запроса
                $quantity = mysqli_num_rows($result);
                // присваиваем переменной результат запроса для получения массива
                $player = mysqli_fetch_assoc($result);
                // проверяем сколько игроков мы получили по запросу
                if($quantity > 1) {
                    // если больше одного выводим сообщение об ошибке
                    echo "<h2>Mulfanction</h2>";
                } else {
                    // если нет, то выводим форму редактирования с данными
                    // конкретного игрока
        ?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Редактировать данные игрока</h1>
              <form action="/admin/modules/editForms/editPlayer.php" method="POST">

                <!-- создаем неотображаемый тег для отправки id игрока -->
                <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">

                <div class="form-group row align-items-center">
                  <label class="col-2">Имя</label>
                  <div class="col">
                    <input type="text" value="<?=$player["firstName"]?>" class="form-control" name="playerFirstName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Фамилия</label>
                  <div class="col">
                    <input type="text" value="<?=$player["lastName"]?>" class="form-control" name="playerLastName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Пол</label>
                  <div class="col">
                    <input type="text" value="<?=$player["gender"]?>" class="form-control" name="gender" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Возраст</label>
                  <div class="col">
                    <input type="text" value="<?=$player["age"]?>" class="form-control" name="age"required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Рост</label>
                  <div class="col">
                    <input type="text" value="<?=$player["height"]?>" class="form-control" name="height" required />
                  </div>
                </div>

               <div class="form-group row align-items-center">
                  <label class="col-2">Вес</label>
                  <div class="col">
                    <input type="text" value="<?=$player["weight"]?>" class="form-control" name="weight" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Рейтинг</label>
                  <div class="col">
                    <input type="text" value="<?=$player["rankPoints"]?>" class="form-control" name="playerRank"required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Команда</label>
                  <div class="col">
                    <input type="text" value="<?=$player["teamID"]?>" class="form-control" name="playerTeam"required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Телефон</label>
                  <div class="col">
                    <input type="text" value="<?=$player["phone"]?>" class="form-control" name="phone" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Электронная почта</label>
                  <div class="col">
                    <input type="text" value="<?=$player["email"]?>" class="form-control" name="email" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Facebook</label>
                  <div class="col">
                    <input type="text" value="<?=$player["facebook"]?>" class="form-control" name="facebook" />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Instagram</label>
                  <div class="col">
                    <input type="text" value="<?=$player["instagram"]?>" class="form-control" name="instagram" />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Telegram</label>
                  <div class="col">
                    <input type="text" value="<?=$player["telegram"]?>" class="form-control" name="telegram" />
                  </div>
                </div>

                <div class="row justify-content-end">
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php
            }
        }
        ?>
      </div>
    </div>

    <?php
           // Footer
           include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
         ?>