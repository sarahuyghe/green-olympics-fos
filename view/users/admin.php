<section class="login-container">
        <?php
          if(empty($_SESSION['user'])) {
        ?>
        <header class="hidden"><h1>Login</h1></header>
        <form class="login-form" method="post" action="index.php?page=login">
          <input type="hidden" name="action" value="login" />
          <div class="input-container text">
            <label>
              <span class="form-label hidden">Email:</span>
              <input type="text" name="email" placeholder="email" class="form-input" />
            </label>
          </div>
          <div class="input-container text">
            <label>
              <span class="form-label hidden">Password:</span>
              <input type="password" name="password" placeholder="password" class="form-input" />
            </label>
          </div>
          <div class="input-container submit">
            <button type="submit" class="form-submit">Login</button>
          </div>
        </form>
        <?php
          } else {
        ?>
        <header class="hidden"><h1>Adminpage</h1></header>
        <p><?php echo $_SESSION['user']['email'];?> - <a href="index.php?page=logout" class="logout-button">Logout</a></p>
       
        <?php foreach ($inzendingen as $inzending): ?>
        <section class="admingApproved">
        <?php if($inzending['image'] != ""): ?>
                <img src="<?php echo $inzending['image'];?>" alt="" width="480" height="270" class="image"/>
            <?php else: ?>
            <?php if($inzending['videoPlatform'] === "youtube"):?>
            <iframe src="https://www.youtube.com/embed/<?php echo $inzending['embed'] ?>" width="320" height="180" controls=0 frameborder="0" allowfullscreen class="video"></iframe>
              <?php elseif($inzending['videoPlatform'] === "vimeo"): ?>
            <iframe src="https://player.vimeo.com/video/<?php echo $inzending['embed'] ?>" width="320" height="180" controls=0 frameborder="0" allowfullscreen class="video"></iframe>
            <?php else: ?>
            <iframe src="<?php echo $inzending['video'] ?>" width="320" height="180" controls=0 frameborder="0" allowfullscreen class="video"></iframe>

              <?php endif; ?>
              <?php endif; ?>
          <div class="infoAdmin">
          <h3><?php echo $inzending['scouts'] ?></h3>
          <p><?php echo $inzending['opdracht'] ?></p>
          <p><?php echo $inzending['punten'] ?> + <?php echo $inzending['extraPoints'] ?></p>  
          <form method="post" class="upload-form" enctype="multipart/form-data" action="index.php?page=admin&amp;id=<?php echo $inzending['id'] ?>&amp;action=update">
            <div>
              <label class="personal"> <span class="form-label">Extra punten</span>
					      <input type="text" name="extraPunten" placeholder="<?php echo $inzending['extraPoints'] ?>" class="form-input" required value="<?php echo $inzending['extraPoints'];?>"/>
				      </label>
            <div class="form-group">
              <input type="hidden" name="action" value="extraPoints" />
                <div class="input-group input-group-submit">
                  <input type="submit" class="form-submit" value="extraPoints" />
                </div>
            </div>
            </div>
          </form>
          <div>
          <a href="index.php?page=admin&amp;id=<?php echo $inzending['id'] ?>&amp;action=approve" class="approve">Goedkeuren</a>
          <a href="index.php?page=admin&amp;id=<?php echo $inzending['id'] ?>&amp;action=delete" class="delete">Verwijderen</a>
          </div>
         
          </section>
        <?php endforeach; ?>
        <?php
          }
        ?>
</section>