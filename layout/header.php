<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./../css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg custom-navbar d-flex">
        <div class="container-fluid">
          <a class="navbar-brand" href="./../pages/index.php">PLN JAKARTA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./../pages/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./../pages/pusatinformasi.php">Tentang kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./../pages/dashboard.php">Dashboard</a>
              </li>
              <?php if(!isset($_SESSION['is_login'])) :?>
                <li class="nav-item">
                  <button class="btn btn-success" onclick="goToLogin()">Login</button>
                </li>
              <?php else :?>
                <li class="nav-item">
                  <button class="btn btn-" onclick="logout()">Logout</button>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
    </nav>
