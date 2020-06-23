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
              <li class="breadcrumb-item active" aria-current="page">Список игроков</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Список игроков</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Пол</th>
                    <th scope="col">Возраст</th>
                    <th scope="col">Рост</th>
                    <th scope="col">Вес</th>
                    <th scope="col">Команда</th>
                    <th scope="col">Рейтинг</th>
                    <th scope="col">Опции</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        // создаем запрос для получения всех продуктов
                        $sql = "SELECT * FROM players ORDER BY rankPoints desc";
                        // заносим в переменную результаты запроса
                        $result = $connect->query($sql);
                        // запускаем цикл, присваиваем переменной row строку из переменной $result
                        // и пока row не равен NULL выводим данные о продукте
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                  <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["firstName"] ?> <?php echo $row["lastName"] ?></td>
                    <td><?php echo $row["gender"] ?></td>
                    <td><?php echo $row["age"] ?></td>
                    <td><?php echo $row["height"] ?></td>
                    <td><?php echo $row["weight"] ?></td>
                    <td><?php echo $row["teamID"] ?></td>
                    <td><?php echo $row["rankPoints"] ?></td>
                    <td>
                        <a href="/admin/modules/editForms/editPlayerForm.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary btn-sm">
                            Изменить
                        </a>
                        <a href="/admin/modules/delete.php?id=<?php echo $row['id'] ?>&flag=player" type="button" class="btn btn-danger btn-sm" >
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