<?php

require_once('DataManager.php');
require_once('FixeELem.php');

$dbm = new DataManager();

//$oeuvre = $dbm->GetAllOeuvre();
$oeuvre = $dbm->GetAllOeuvre();

FixeELem::showBaseStart();
FixeELem::showHeader();
?>
<main>
    <div id="liste-oeuvres">

<?php
foreach($oeuvre as $key=>$row)
{
    $id = (int)$row['id'];
    $artist = $row['artiste'];
    $titre = $row['titre'];
    $img = $row['img'];
    ?>
    <article class="oeuvre">
        <a href="oeuvre.php?id=<?php echo $id;?>;">
            <img src="<?php echo $img;?>" alt="<?php echo $titre;?>">
            <h2><?php echo $titre;?></h2>
            <p class="description"><?php echo $artist;?></p>
        </a>
    </article>
    <?php

}
?>
    </div>
</main>
<?php
FixeELem::showFooter();
FixeELem::showBaseEnd();
