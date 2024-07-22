<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListrikRumahTangga</title>
    <link rel="icon" type="image/jpeg" href="./../images/bg-PLN.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./../css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg custom-navbar d-flex">
        <div class="container-fluid">
          <a class="navbar-brand" href="./../pages/index.php"><img src="./../images/bg-PLN.jpg" alt=".." class="w-10">PLN JAKARTA</a>
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
              <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dashboard
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./../pages/profilpengguna.php">Profil Pengguna</a></li>
            <?php if (isset($_SESSION['is_admin'])) :?>
              <li><a class="dropdown-item" href="./../pages/dashadmin.php">Admin Dashboard</a></li>
            <?php else :?>
                <li><a class="dropdown-item" href="./../pages/dashboard.php">Pembayaran Listrik</a></li>
            <?php endif; ?>

            

            <li><a class="dropdown-item" href="./../pages/golongan.php">Info Golongan</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./../pages/admin.php">Admin</a></li>
          </ul>
              </li>
              <?php if(!isset($_SESSION['is_login'])) :?>
                <li class="nav-item">
                  <button class="btn btn-success" onclick="goToLogin()">Login</button>
                </li>
              <?php else :?>
                <li class="nav-item">
                  <button class="btn btn-danger" onclick="logout()">Logout</button>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
    </nav>

