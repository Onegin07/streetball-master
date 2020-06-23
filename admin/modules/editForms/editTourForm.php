  <?php
    // Header
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
  ?>
        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="tours-list.php">Туры</a></li>
              <li class="breadcrumb-item active" aria-current="page">Редактировать тур</li>
            </ol>
          </nav>
        </div>
        <?php
            // проверяем существует ли запрос
            if(isset($_GET['id'])) {
                // создаем запрос для базы данных для редактирования тура
                $sql = "SELECT * FROM tours WHERE id='" . $_GET['id'] . "'";
                // получаем результат из базы данных
                $result = $connect->query($sql);
                // получаем количество строк результата запроса
                $quantity = mysqli_num_rows($result);
                // присваиваем переменной результат запроса для получения массива
                $tour = mysqli_fetch_assoc($result);
                // проверяем сколько игроков мы получили по запросу
                if($quantity > 1) {
                    // если больше одного выводим сообщение об ошибке
                    echo "<h2>Mulfanction</h2>";
                } else {
                    // если нет, то выводим форму редактирования с данными
                    // конкретного тура
        ?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Редактировать тур</h1>
              <form action="/admin/modules/editForms/editTour.php" method="POST">

                <!-- создаем неотображаемый тег для отправки id тура -->
                <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">

                <div class="form-group row align-items-center">
                  <label class="col-1">Название</label>
                  <div class="col">
                    <input type="text" value="<?=$tour["name"]?>" class="form-control" name="tourName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-1">Старт</label>
                  <div class="col-3">
                    <input type="text" value="<?=$tour["startDate"]?>" class="form-control" name="dateStart"required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-1">Финиш</label>
                  <div class="col-3">
                    <input type="text" value="<?=$tour["endDate"]?>" class="form-control" name="dateEnd" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                   <label class="col-1">Количество турниров</label>
                   <div class="col">
                     <input type="text" value="<?=$tour["numTournament"]?>" class="form-control" name="quantity" required />
                   </div>
                </div>

                <div class="form-group row">
                  <label class="col-1">Описание</label>
                  <div class="col">
                    <input value="<?=$tour["description"]?>" class="form-control" name="description" />
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