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
              <li class="breadcrumb-item active" aria-current="page">Добавить новую команду</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Добавить новую команду</h1>
              <form action="/admin/modules/addTeam.php" method="POST">
                <div class="form-group row align-items-center">
                  <label class="col-2">Наименование</label>
                  <div class="col">
                    <input type="text" placeholder="Название команды" class="form-control" name="teamName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Категория</label>
                  <div class="col">
                    <select class="form-control" name="category">
                     
                        <?php 
                            $sqlCategories = "SELECT * FROM categories";
                            // получаем результат из базы данных
                            $resultCategories = $connect->query($sqlCategories);
                            // запускаем цикл, который действует пока $category не равен Null
                            while($category = mysqli_fetch_assoc($resultCategories)) {
                         ?>
                            <!-- присваиваем value значение id, а также выводим название категории, полученное из базы данных -->
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['categoryName']; ?></option>
                            
                        <?php 
                                }
                        ?>
                     
                    </select>
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-2">Город</label>
                  <div class="col">
                    <input type="text" placeholder="Город" class="form-control" name="city" required />
                  </div>
                </div>

               <div class="form-group row align-items-center">
                  <label class="col-2">Рейтинг</label>
                  <div class="col">
                    <input type="text" placeholder="Рейтинговые очки" class="form-control" name="teamRank" required />
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