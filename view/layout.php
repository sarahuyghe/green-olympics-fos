<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Green olympics</title>
    <meta name="description" content="major 2 - devine">
    <meta name="keywords" content="devine, major">
    <link rel="icon" href="./assets/img/logo_GreenGames.png">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    

  </head>
  <body>
    <header>
      <div class="breedte">
      <a class="navbar-brand logo" href="index.php" ><img src="./assets/img/logo_GreenGames.png" alt="logo" height="70rem"></a>
      <nav>
        <ul class="menu">
          <li><a class="navbar-brand <?php if($_GET['page'] == 'index'){echo 'active';} ?>" href="index.php" >home</a></li>
          <li><a class="navbar-brand <?php if($_GET['page'] == 'opdrachten'){echo 'active';} ?>" href="index.php?page=opdrachten">uitdagingen</a></li>
          <li><a class="navbar-brand <?php if($_GET['page'] == 'scoreboard'){echo 'active';} ?>" href="index.php?page=scoreboard">scoreboard</a></li>
          <li><a class="navbar-brand <?php if($_GET['page'] == 'regels'){echo 'active';} ?>" href="index.php?page=regels">regels</a></li>
          <li><a class="navbar-brand <?php if($_GET['page'] == 'upload'){echo 'active';} ?>" href="index.php?page=upload">upload</a></li>
        </ul>
    </nav>
    </div>
    </header>
    <main>
      <?php
        if(!empty($_SESSION['error'])) {
          echo '<div class="error box">' . $_SESSION['error'] . '</div>';
        }
        if(!empty($_SESSION['info'])) {
          echo '<div class="info box">' . $_SESSION['info'] . '</div>';
        }
      ?>
      <?php echo $content ?>
    </main>
    <div class="footer-border"></div>
    <footer>
      <div class="container_footer">
        <a href="https://fosopenscouting.be/nl" class="opdrachtLink">
          <img src="./assets/img/logo_fos.png" alt="logo fos" width="78pt">
        </a>
        <img src="./assets/img/logo_GreenGames.png" alt="logo green games" width="78pt">
        <div>
          <p>Testing</p>
          <p>email voor contact</p>
        </div>
      </div>
      <div class="credits"><p>illustraties: Daniëlle Terras | design: Thijs Bremeesch | ux, code: Sara Huyghe</p></div>
    </footer>
    
  </body>
  <script type="text/javascript" src="./js/script.js"></script>
  
</html>
