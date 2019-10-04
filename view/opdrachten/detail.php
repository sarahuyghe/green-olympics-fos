
<section class="firstInfo">
<!-- <a href="index.php?page=opdrachten" class="back-button"><img src="./assets/img/back-arrow.svg" alt="back-arrow">Terug</a> -->
<section class="uitlegDetail">  
<h1><?php echo $opdracht['opdracht'] ?></h1>
    <p class="infoDetail italic"><?php echo $opdracht['title'] ?> - <?php echo $opdracht['months'] ?></p>
    <div class="uitlegOpdracht">
        <div>
            <b>De opdracht:</b>
            <p><?php echo $opdracht['uitleg'] ?></p>
            <a href="<?php echo $opdracht['linkToPDF'] ?>" target="_blank"><?php echo $opdracht['linkTitel'] ?></a>
        </div>
        <a class="button" href="index.php?page=upload"><img src="./assets/img/arrow.svg" alt="arrow">inzending sturen</a>
    </div>
</section>
</section>
<div class="inzendingen-top-border"></div>
<section class="specialInzendignen detail">
    <h3>Inzendingen voor deze opdracht</h3>
    <div class="inzendingen">
    <?php if($inzendingen != []): ?>
        <?php foreach ($inzendingen as $inzending): ?>
        <div class="inzending">
        <?php if($inzending['image'] != ""): ?>
            <img src="<?php echo $inzending['image'];?>" alt="" width="320" height="180" class="image"/>
        <?php else: ?>
            <?php if($inzending['videoPlatform'] === "youtube"):?>
            
            <iframe src="https://www.youtube.com/embed/<?php echo $inzending['embed'] ?>?autoplay=0&showinfo=0&controls=0" width="320" height="180"  frameborder="0" allowfullscreen class="video"></iframe>
                <?php elseif($inzending['videoPlatform'] === "vimeo"): ?>
            <iframe src="https://player.vimeo.com/video/<?php echo $inzending['embed'] ?>?title=0&byline=0&portrait=0" width="320" height="180"  frameborder="0" allowfullscreen class="video"></iframe>
            <?php else: ?>
            <iframe src="<?php echo $inzending['video'] ?>" width="320" height="180" controls=0 frameborder="0" allowfullscreen class="video"></iframe>

              <?php endif; ?>
                <?php endif; ?>
        <div class="infoInzendingen">
            <h4><?php echo $inzending['opdracht'] ?></h4>
            <p><?php echo $inzending['scouts'] ?></p>
            <p class="italic"><?php echo $inzending['months'] ?></p>
            <a class="clickThrough" href="index.php?page=opdrachten">
                <img src="./assets/img/arrow.svg" alt="arrow">
            </a>
        </div>
    </div>

        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center; grid-column: 2">nog geen inzendigen</p>    
    <?php endif; ?>
    </div>
</section>
<div class="inzendingen-bottom-border"></div>
<div class="footer-top-border"></div>
