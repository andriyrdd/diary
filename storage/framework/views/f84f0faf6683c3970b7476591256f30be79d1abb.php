<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Графік відключень енергії</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Відключення енергії</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Головна</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Про нас</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Контакти</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-light text-center py-5">
    <div class="container">
      <h1 class="display-4">Графік планових відключень енергії</h1>
      <p class="lead">Дізнайтеся про заплановані відключення енергії в вашому регіоні</p>
    </div>
  </header>

  <section class="py-5">
    <div class="container">
      <h2>Оберіть чергу</h2>
      <div class="form-group">
        <select class="form-select" id="queue-select">
          <option selected disabled>Виберіть чергу</option>
          <?php $__currentLoopData = $queues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $queue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($queue); ?>"><?php echo e($queue); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <h2>Заплановані відключення</h2>
      <?php $__currentLoopData = $disconnectionTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disconnectionTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title"><?php echo e(disconnectionTime); ?></h5>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </section>

  <footer class="bg-dark text-light py-3">
    <div class="container text-center">
      <p>&copy; 2023 Всі права захищено.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\diary\resources\views/index.blade.php ENDPATH**/ ?>