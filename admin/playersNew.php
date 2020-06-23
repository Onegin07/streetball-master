  <?php
    // Header
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
  ?>
        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                      <li class="breadcrumb-item"><a href="playersList.php">Игроки</a></li>
              <li class="breadcrumb-item active" aria-current="page">Добавить нового игрока</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Добавить нового игрока</h1>
              <form action="/admin/modules/addPlayer.php" method="POST">
                <div class="form-group row align-items-center">
                  <label class="col-2">Имя</label>
                  <div class="col">
                    <input type="text" placeholder="Имя" class="form-control" name="playerFirstName" required autofocus/>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Фамилия</label>
                  <div class="col">
                    <input type="text" placeholder="Фамилия" class="form-control" name="playerLastName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Пол</label>
                  <div class="col">
                    <select class="form-control" name="gender">
                      <option value="Male">Мужской</option>
                      <option value="Female">Женский</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Возраст</label>
                  <div class="col">
                    <input type="text" placeholder="Возраст" class="form-control" name="age"required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Рост</label>
                  <div class="col">
                    <input type="text" placeholder="Рост в сантиметрах" class="form-control" name="height" required />
                  </div>
                </div>

               <div class="form-group row align-items-center">
                  <label class="col-2">Вес</label>
                  <div class="col">
                    <input type="text" placeholder="Вес килограммах" class="form-control" name="weight" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Рейтинг</label>
                  <div class="col">
                    <input type="text" placeholder="Рейтинговые очки" class="form-control" name="playerRank"required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Команда</label>
                  <div class="col">
                    <select class="form-control" name="playerTeam">

                        <?php
                            $sqlTeams = "SELECT * FROM teams ORDER BY name";
                            // получаем результат из базы данных
                            $resultTeams = $connect->query($sqlTeams);
                            // запускаем цикл, который действует пока $category не равен Null
                            while($team = mysqli_fetch_assoc($resultTeams)) {
                         ?>
                            <!-- присваиваем value значение id, а также выводим название категории, полученное из базы данных -->
                            <option value="<?php echo $team['id']; ?>"><?php echo $team['name']; ?></option>
                        <?php
                                }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Телефон</label>
                  <div class="col">
                    <input type="text" placeholder="Телефон" class="form-control" name="phone" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Электронная почта</label>
                  <div class="col">
                    <input type="text" placeholder="Электронная почта" class="form-control" name="email" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Facebook</label>
                  <div class="col">
                    <input type="text" placeholder="Facebook" class="form-control" name="facebook" />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Instagram</label>
                  <div class="col">
                    <input type="text" placeholder="Instagram" class="form-control" name="instagram" />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Telegram</label>
                  <div class="col">
                    <input type="text" placeholder="Telegram" class="form-control" name="telegram" />
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

    <?php
           // Footer
           include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
         ?>