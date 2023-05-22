<?php
require_once __DIR__ . "/vendor/autoload.php";
// $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$manager = new MongoDB\Driver\Manager('mongodb+srv://SamSayyed:mySampassword123@mydatabasecluster.ib0uvs4.mongodb.net/');

session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: ../login/login.html');
    exit();
}
if (isset($_SESSION['timeout']) && $_SESSION['timeout'] < time()) {
    header('Location: ../login/login.html');
    exit;
} else {
    $_SESSION['timeout'] = time() + (15 * 24 * 60 * 60);
}

$dbName = 'Accounts';
$collectionName = 'Users';

// retrieve the user's information
$query = new MongoDB\Driver\Query(['email' => $_SESSION['user']]);
$cursor = $manager->executeQuery("$dbName.$collectionName", $query);
$document = $cursor->toArray()[0];
$firstName = $document->firstname;
$lastName = $document->lastname;

// retrieve user's ID and email from the database for chrome extension
$user_id = $document->_id;
$email = $document->email;
setcookie('user_id', $user_id, time() + (86400 * 15));
setcookie('email', $email, time() + (86400 * 15));

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - MeanArena</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
    
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <a href="../index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">MeanArena</span>
      </a>
    </div>
    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/user-profile-icon.png" alt="Profile" class="rounded-circle">
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <h6><?php echo ucfirst($firstName) . ' ' . ucfirst($lastName); ?></h6>
              <span><?php echo $email; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../php/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Learning Area</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content nav nav-tabs nav-grid">
          <li>
            <a class="nav-link active" data-bs-toggle="pill" href="#home">
              <i class="bi bi-circle"></i><span>Saved List</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>

  <main id="main" class="main">
    <h1>Dashboard</h1>

    <section class="section dashboard">
      <div class="tab-content">
        <div class="tab-pane container active" id="home">
          <div class="pagetitle">

            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Learning Area</a></li>
                <li class="breadcrumb-item active">Saved List</li>
              </ol>
            </nav>
          </div>

          <div class="row">
          <?php
          $accounts_db = new MongoDB\Database($manager, 'Accounts');
          $user_collection = $accounts_db->{$email . '_words'};
          $result = $user_collection->find();
          // Render the data in HTML
          foreach ($result as $doc) {
              echo '<div class="col-xxl-3 col-md-4">';
              echo '<div class="card info-card sales-card">';
              echo '<div class="card-body text-center">';
              echo '<h5 class="text-black mb-2 font-w600" style="margin-top: 15px;"><b>' . ucfirst($doc->Word) . '</b></h5>';
              echo '<div class="d-flex align-items-center">';
              echo '<span class="text-muted small pt-2 ps-1"><center>' . $doc->Definition . '</center></span>';
              echo '</div>';
              echo '<br>';
              echo '<div id="end">';
              echo '<label id="d-label">' . $doc->Dictionary . '</label>';
              echo '<i class="bi bi-trash" onclick="deleteWord(\'' . $doc->_id . '\', this)"></i>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          }
          ?>
          </div>
      </div>
    </section>
  </main>

  <!-- Vendor JS Files -->

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>
