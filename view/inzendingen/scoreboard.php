<h1>Waar staat jouw scouts?</h1>

<form action="" method="get" class="filter-form">
       <input  type="text" name="lol" id="lol" placeholder="type hier de naam van een scouts" class="search">
       <div>
		<input type="submit" value="Filter" class="button-primary"/>
	</div>
</form>
<section class="scoreboard">
    <div class="grid">
    <p></p>
    <p class="italic">Naam</p>
    <p class="italic">Punten</p>
    </div>
    <?php $key=1?>
    <div class="grid firstplaces">
       
    <?php foreach (array_slice($totalPoints, 0, 3) as $name => $value): ?>
           <p><?php echo $key ?>.</p>
           <p class="scoreboardDetail first scouts"><?php echo $name ?></p>
           <p class="scoreboardDetail first"><?php echo $value ?></p>
           <?php $key= $key +1?>
    <?php endforeach; ?>
    </div>
    <div class="grid tenPlaces">
    <?php foreach (array_slice($totalPoints, 3, 7) as $name => $value): ?>
            <p><?php echo $key ?>.</p>
           <p class="scoreboardDetail scouts"><?php echo $name ?></p>
           <p class="scoreboardDetail "><?php echo $value ?></p>
           <?php $key= $key +1?>
    <?php endforeach; ?>
    </div>
    <div class="grid">
    <?php foreach (array_slice($totalPoints, 10, 55) as $name => $value): ?>
           <p class="lastPlaces"><?php echo $key ?>.</p>
           <p class="scoreboardDetail scouts"><?php echo $name ?></p>
           <p class="scoreboardDetail "><?php echo $value ?></p>
           <?php $key= $key +1?>
    <?php endforeach; ?>
    </div>
    <p class="italic">Jouw team niet gevonden? Zoek bovenaan de pagina via de groepnaam.</p>
    <!-- <h2>Het grote scorebord</h2> -->
    <!-- <p>De ranking wordt automatisch geüpdate. Het regelment omtrent de toekeningen van punten kun je <a href="index.php?page=regels"> hier</a> terugvinden.</p> -->
</section>
