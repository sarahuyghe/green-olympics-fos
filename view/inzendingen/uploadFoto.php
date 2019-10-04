<a href="index.php?page=upload" class="back-button"><img src="./assets/img/back-arrow.svg" alt="back-arrow">Terug</a>

<h1>Ik ga een foto uploaden.</h1>
<form method="post" class="upload-form" enctype="multipart/form-data" action="index.php?page=uploadFoto">
<section class="photo">
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
          </select>
        </div>
        <label class="italic">Foto</label>
          <div class="input-group input-group-image">
            <input name="image" class="form-input form-input-image" type="file" placeholder="selecteer de foto"/>
            <?php if(!empty($errors['image'])) echo '<span class="error">' . $errors['image'] . '</span>';?>
            <p class="extraInfo italic">The image needs to be 480x270 pixels minimum</p>
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