<section class="header flex-parent">
        <!-- <p class="hello">up</p> -->
        <div class="months">
            <?php foreach ($maanden as $maand): ?>
                <div class="month hide">
                        <p class="italic"><?php echo $maand['months'] ?> thema:</p>
                        <h1><?php echo $maand['title'] ?></h1>
                        <p class="hide"><?php echo $maand['beginDate'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div>
            <?php foreach ($maanden as $maand): ?>
            <div class="testing hide">
                <div class="countdown">
                    <h5>Nog even wachten ...</h5>
                    <p class="hide"><?php echo $maand['beginDate'] ?></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                </div>
                <img src="<?php echo $maand['image']; ?>" alt="<?php echo $maand['title'] ?>"   class="header-image hide">
                </div>
                <?php endforeach; ?>
            </div>
        <!-- <p class="hello">down</p> -->
        <div class="buttons">
        <a class="button" href="index.php?page=opdrachten"><img src="./assets/img/arrow.svg" alt="arrow">Bekijk alle uitdagingen</a>
        <a class="button" href="index.php?page=upload"><img src="./assets/img/arrow.svg" alt="arrow">inzending sturen</a>
        </div>
</section>
<div class="inzendingen-top-border"></div>
<section class="specialInzendignen">
    <h3>Populaire inzendingen</h3>
    <div class="inzendingen">
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
    </div>
</section>
<div class="inzendingen-bottom-border"></div>
<section class="width about">
    <div>
        <h3>Wat zijn de green games</h3>
        <p>We gaan een jaar lang op zoek naar de groenste eenheid binnen FOS Open Scouting!</p>
        <p>Als eenheid verzamel je zoveel mogelijk punten door uitdagingen aan te gaan. <b>Vanaf 1 oktober tot 30 april</b> worden elke maand een vijftal uitdagingen gelanceerd. Er zijn mooie en nuttige prijzen te winnen voor de eenheden met de hoogste punten. Ook de eenheid met de meest creatieve inzendingen valt in de prijzen…</p>
        <a href="index.php?page=regels">Bekijk hier alle info omtrent jouw deelname!</a>
    </div>
</section>