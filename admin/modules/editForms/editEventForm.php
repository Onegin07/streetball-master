  <?php
    // Header
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
  ?>
        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
              <li class="breadcrumb-item"><a href="/admin/eventsList.php">Турниры</a></li>
              <li class="breadcrumb-item active" aria-current="page">Редактировать турнир</li>
            </ol>
          </nav>
        </div>
        <?php
            // проверяем существует ли запрос
            if(isset($_GET['id'])) {
                // создаем запрос для базы данных для редактирования турнира
                $sql = "SELECT * FROM calendar WHERE id='" . $_GET['id'] . "'";
                // получаем результат из базы данных
                $result = $connect->query($sql);
                // получаем количество строк результата запроса
                $quantity = mysqli_num_rows($result);
                // присваиваем переменной результат запроса для получения массива
                $event = mysqli_fetch_assoc($result);
                // проверяем сколько игроков мы получили по запросу
                if($quantity > 1) {
                    // если больше одного выводим сообщение об ошибке
                    echo "<h2>Mulfanction</h2>";
                // если нет, то выводим форму редактирования с данными
                // конкретного турнира
                } else {
                    // декодируем json, полученный из БД
                    $category = json_decode($event["categoryID"], true);
        ?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Редактировать турнир</h1>
              <form action="/admin/modules/editForms/editEvent.php" method="POST">

                  <!-- создаем неотображаемый тег для отправки id турнира -->
                  <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">

                <div class="form-group row align-items-center">
                  <label class="col-2">Название турнира</label>
                  <div class="col">
                    <input type="text" value="<?=$event["name"]?>" class="form-control" name="eventName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Город</label>
                  <div class="col">
                    <input type="text" value="<?=$event["city"]?>" class="form-control" name="eventCity" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Локация</label>
                  <div class="col">
                    <input type="text" value="<?=$event["location"]?>" class="form-control" name="eventLocation" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Дата и время</label>
                  <div class="col">
                    <input type="text" value="<?=$event["date"]?>" class="form-control" name="date" required />
                  </div>
                </div>

                 <div class="form-group row align-items-center">
                  <label class="col-2">Статус регистрации</label>
                  <div class="col">
                    <input type="text" value="<?=$event["status"]?>" class="form-control" name="eventStatus" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Вебсайт</label>
                  <div class="col">
                    <input type="text" value="<?=$event["webSite"]?>" class="form-control" name="webSite"required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Стоимость участия</label>
                  <div class="col">
                    <input type="text" value="<?=$event["fee"]?>" class="form-control" name="fee" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Категория</label>
                  <div class="col">
                   <select class="form-control" name="category[]" multiple="multiple" required>
                       <?php
                          // for записываем альтернативно
                          for( $i = 0; $i < count($category['category']); $i++ ):
                        ?>
                           <!-- присваиваем value значение, а также выводим название категории, полученное из массива $category['category'] -->
                           <option value="<?php echo $category['category'][$i]; ?>"><?php echo $category['category'][$i]; ?></option>
                       <?php
                           endfor;
                       ?>
                   </select>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Наименование тура</label>
                  <div class="col">
                    <input type="text" value="<?=$event["tourID"]?>" class="form-control" name="tour" required />
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-2">Описание турнира</label>
                  <div class="col">
                    <input type="text" value="<?=$event["description"]?>" class="form-control" name="description"/>
                  </div>
                </div>

                <h3>Контактное лицо</h3>
                <div class="form-group row align-items-center">
                  <label class="col-2">Имя</label>
                  <div class="col">
                    <input type="text" placeholder="Имя" class="form-control" name="contactFirstName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Фамилия</label>
                  <div class="col">
                    <input type="text" placeholder="Фамилия" class="form-control" name="contactLastName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Город</label>
                  <div class="col">
                    <input type="text" placeholder="Город" class="form-control" name="contactCity" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Телефон</label>
                  <div class="col">
                    <input type="text" placeholder="Телефон" class="form-control" name="contactName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Электронная почта</label>
                  <div class="col">
                    <input type="text" placeholder="Электронная почта" class="form-control" name="contactEmail" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Facebook</label>
                  <div class="col">
                    <input type="text" placeholder="Facebook" class="form-control" name="contactFacebook" />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Instagram</label>
                  <div class="col">
                    <input type="text" placeholder="Instagram" class="form-control" name="contactInstagram" />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Telegram</label>
                  <div class="col">
                    <input type="text" placeholder="Telegram" class="form-control" name="contactTelegram" />
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