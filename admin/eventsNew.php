  <?php
    // Header
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
  ?>
        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
              <li class="breadcrumb-item"><a href="eventsList.php">Турниры</a></li>
              <li class="breadcrumb-item active" aria-current="page">Создать новый</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Создать новый турнир</h1>
              <form action="/admin/modules/addEvent.php" method="POST">
                <div class="form-group row align-items-center">
                  <label class="col-2">Название турнира</label>
                  <div class="col">
                    <input type="text" placeholder="Название турнира" class="form-control" name="eventName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Город</label>
                  <div class="col">
                    <input type="text" placeholder="Город" class="form-control" name="eventCity" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Локация</label>
                  <div class="col">
                    <input type="text" placeholder="Локация" class="form-control" name="eventLocation" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Дата и время</label>
                  <div class="col">
                    <input type="datetime-local" class="form-control" name="date"required />
                  </div>
                </div>

                 <div class="form-group row align-items-center">
                  <label class="col-2">Статус регистрации</label>
                  <div class="col">
                    <input type="text" placeholder="0-Регистрация закрыта, 1-Регистрация открыта" class="form-control" name="eventStatus" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Вебсайт</label>
                  <div class="col">
                    <input type="text" placeholder="Например, http://streetball.in.ua/" class="form-control" name="webSite"required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Стоимость участия</label>
                  <div class="col">
                    <input type="text" placeholder="Стоимость" class="form-control" name="fee" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Категория</label>
                  <div class="col">
                    <select class="form-control" name="category[]" multiple="multiple" required>
                        <?php
                            $sqlCategories = "SELECT * FROM categories";
                            // получаем результат из базы данных
                            $resultCategories = $connect->query($sqlCategories);
                            // запускаем цикл, который действует пока $category не равен Null
                            while($category = mysqli_fetch_assoc($resultCategories)) {
                         ?>
                            <!-- присваиваем value значение id, а также выводим название категории, полученное из базы данных -->
                            <option value="<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></option>
                        <?php
                                }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-2">Описание турнира</label>
                  <div class="col">
                    <textarea placeholder="Краткая информация" class="form-control" name="description" rows="4"></textarea>
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
      </div>
    </div>

    <?php
           // Footer
           include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
         ?>