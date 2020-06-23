

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
              <li class="breadcrumb-item active" aria-current="page">Создать новый тур</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 m-2">
              <h1>Создать новый тур</h1>
              <form action="/admin/modules/addTour.php" method="POST">

                <div class="form-group row align-items-center">
                  <label class="col-1">Название</label>
                  <div class="col">
                    <input type="text" placeholder="Название тура" class="form-control" name="tourName" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-1">Старт</label>
                  <div class="col-3">
                    <input type="date" class="form-control" name="dateStart"required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                  <label class="col-1">Финиш</label>
                  <div class="col-3">
                    <input type="date" class="form-control" name="dateEnd" required />
                  </div>
                </div>

                <div class="form-group row align-items-center">
                   <label class="col-1">Количество турниров</label>
                   <div class="col">
                     <input type="text" placeholder="Количество турниров" class="form-control" name="quantity" required />
                   </div>
                </div>

                <div class="form-group row">
                  <label class="col-1">Описание</label>
                  <div class="col">
                    <textarea placeholder="Описание тура" class="form-control" name="description" rows="4"></textarea>
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