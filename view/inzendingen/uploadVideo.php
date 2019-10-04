<a href="index.php?page=upload" class="back-button"><img src="./assets/img/back-arrow.svg" alt="back-arrow">Terug</a>
<h1>Ik ga een video uploaden</h1>
<form method="post" class="upload-form" enctype="multipart/form-data" action="index.php?page=uploadVideo">
<section class="video">
      <div class="form-group">
        <label class="italic">Selecteer een opdracht</label>
        <div class="selectWrapper">
          <select name="opdracht">
              <option value="">zoek een opdracht</option>
            <?php foreach ($opdrachten as $opdracht): ?>
              <option value=<?php echo $opdracht['id'] ?> ><?php echo $opdracht['opdracht'] ?></option>
            <?php endforeach; ?>
          </select>
          </div>
        <label class="italic">Selecteer een eenheid</label>
        <div class="selectWrapper">
          <select name="scouts">
            <option value="">zoek jou scoutsgroep</option>
            <?php foreach ($scouts as $scout): ?>
              <option value=<?php echo $scout['id'] ?> ><?php echo $scout['scouts'] ?></option>
            <?php endforeach; ?>
          <?php if(!empty($errors['scouts_id'])) echo '<span class="error">' . $errors['scouts_id'] . '</span>';?>

          </select>
          </div>
        <label for="comment" class="italic">Video url</label>
        <div class="col-sm-10">
          <input type="text" id="fname" name="video" placeholder="plak de url hier" class="form-control <?php if(!empty($errors['video'])) echo 'form-control is-invalid'; ?>"><?php if(!empty($_POST['video'])) echo $_POST['video'];?>
          <?php if(!empty($errors['video'])) echo '<span class="error">' . $errors['video'] . '</span>';?>
        </div>
        <label for="comment" class="italic">Commentaar</label>
        <div class="col-sm-10">
          <input type="text" id="fname" name="commentaar" placeholder="Samenwerking met andere eenheden" class="form-control <?php if(!empty($errors['commentaar'])) echo 'form-control is-invalid'; ?>"><?php if(!empty($_POST['commentaar'])) echo $_POST['commentaar'];?>
          <?php if(!empty($errors['commentaar'])) echo '<span class="error">' . $errors['commentaar'] . '</span>';?>
        </div>
      </div>
      </section>

      <div class="form-group">
        <input type="hidden" name="action" value="upload" />
        <div class="input-group input-group-submit">
          <input type="submit" class="form-submit" value="inzending sturen" />
        </div>
      </div>
</form>