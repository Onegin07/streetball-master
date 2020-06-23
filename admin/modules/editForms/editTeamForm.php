  <?php
    // Header
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
  ?>
        <!-- Хлебные крошки и кнопка Настройки -->
        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                      <li class="breadcrumb-item"><a href="teamsList.php">Команды</a></li>
              <li class="breadcrumb-item active" aria-current="page">Редактировать команду</li>
            </ol>
          </nav>
        </div>

        <?php

        	// проверяем существует ли запрос
        	if(isset($_GET['id'])) {
        		// создаем запрос для базы данных для редактирования команды
        		$sql = "SELECT * FROM teams WHERE id='" . $_GET['id'] . "'";
        		// получаем результат из базы данных
        		$result = $connect->query($sql);
        		// получаем количество строк результата запроса
        		$quantity = mysqli_num_rows($result);
        		// присваиваем переменной результат запроса для получения массива
        		$team = mysqli_fetch_assoc($result);

        		// проверяем сколько команд мы получили по запросу
        		if($quantity > 1) {
        			// если больше одного выводим сообщение об ошибке
        			header("location: http://" . $_SERVER['HTTP_HOST'] . "/admin/teamsList.php");
        		} else {
        			// если нет, то выводим форму редактирования с данными
        			// конкретной команды

        ?>

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Редактировать команду</h1>
              <form action="/admin/modules/editForms/editTeam.php" method="POST">

                <!-- создаем неотображаемый тег для отправки id команды -->
                <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">

                <div class="form-group row align-items-center">
                  <label class="col-2">Наименование</label>
                  <div class="col">
                    <input type="text" value="<?=$team["name"]?>" class="form-control" name="teamName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Категория</label>
                  <div class="col">
                    <input type="text" value="<?=$team["categoryID"]?>" class="form-control" name="category" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Город</label>
                  <div class="col">
                    <input type="text" value="<?=$team["city"]?>" class="form-control" name="city" required />
                  </div>
                </div>

               <div class="form-group row align-items-center">
                  <label class="col-2">Рейтинг</label>
                  <div class="col">
                    <input type="text" value="<?=$team["rankPoints"]?>" class="form-control" name="teamRank" required />
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