  <?php
    // Header
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
  ?>
         <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Главная</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">История турниров</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>История турниров</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Город</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Команды</th>
                    <th scope="col">Турнирная таблица</th>
                    <th scope="col">Опции</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        // создаем запрос для получения всех events
                        $sql = "SELECT * FROM tournaments";
                        // заносим в переменную результаты запроса
                        $result = $connect->query($sql);
                        // запускаем цикл, присваиваем переменной row строку из переменной $result
                        // и пока row не равен NULL выводим данные о event
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                  <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["city"] ?></td>

                    <td><?php echo $row["date"] ?></td>
                    <td><?php echo $row["categoryID"] ?></td>
                    <td>УСЛ 3х3 2020</td>
                    <td>
                        <a href="/admin/modules/editForms/editEventForm.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary btn-sm">
                            Изменить
                        </a>
                        <a href="/admin/modules/delete.php?id=<?php echo $row['id'] ?>&flag=event" type="button" class="btn btn-danger btn-sm" >
                            Удалить
                        </a>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      // Footer
      include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
    ?>