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
              <li class="breadcrumb-item active" aria-current="page">Список туров</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Список туров</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Начало</th>
                    <th scope="col">Завершение</th>
                    <th scope="col">Турниров</th>
                    <th scope="col">Опции</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        // создаем запрос для получения всех tour
                        $sql = "SELECT * FROM tours";
                        // заносим в переменную результаты запроса
                        $result = $connect->query($sql);
                        // запускаем цикл, присваиваем переменной row строку из переменной $result
                        // и пока row не равен NULL выводим данные о tour
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                  <tr>
                      <td><?php echo $row["id"] ?></td>
                      <td><?php echo $row["name"] ?></td>
                      <td><?php echo $row["startDate"] ?></td>
                      <td><?php echo $row["endDate"] ?></td>
                      <td><?php echo $row["numTournament"] ?></td>
                      <!-- <td><?php echo $row["description"] ?></td> -->
                      <td>
                          <a href="/admin/modules/editForms/editTourForm.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary btn-sm">
                              Изменить
                          </a>
                          <a href="/admin/modules/delete.php?id=<?php echo $row['id'] ?>&flag=tour" type="button" class="btn btn-danger btn-sm" >
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