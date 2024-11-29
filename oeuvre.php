<?php declare(strict_types=1);

require_once('DataManager.php');
require_once('FixeELem.php');

$dbm = new DataManager();

//$oeuvre = $dbm->GetOeuvreById($_GET['id']);
$oeuvre = $dbm->GetOeuvreById((int)$_GET['id']);

FixeELem::showBaseStart();
FixeELem::showHeader();
$id = (int)$oeuvre['id'];
$artist = $oeuvre['artiste'];
$titre = $oeuvre['titre'];
$img = $oeuvre['img'];
$des = $oeuvre['des'];

?>
<main>
    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?php echo $img;?>" alt="<?php echo $titre;?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?php echo $titre;?></h1>
            <p class="description"><?php echo $artist;?></p>
            <p class="description-complete">
                <?php echo $des;?>
            </p>
        </div>
    </article>
</main>
<?php
FixeELem::showFooter();
FixeELem::showBaseEnd();