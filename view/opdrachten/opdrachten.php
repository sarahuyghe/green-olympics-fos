<?php foreach ($maanden as $maand): ?>
    <section class="opdrachten">
    <div class="allInfo">
        <ul class="listOpdracht hide">
            <?php foreach ($maand["opdrachten"] as $t): ?>
                <li class="listItem"><a href="index.php?page=detail&amp;id=<?php echo $t['id'] ?>" class="opdrachtLink"><?php echo $t['opdracht'] ?></a></li>
            <?php endforeach; ?>
        </ul> 
        <div class="countdown">
            <h5>Nog even wachten ...</h5>
            <p class="hide"><?php echo $maand['beginDate'] ?></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
        </div>
    </div>
    <div class="title">
        <h2><?php echo $maand['title'] ?></h2>
        <p class="italic">(<?php echo $maand['months'] ?>)</p> 
    </div>
    </section>
<?php endforeach; ?>
