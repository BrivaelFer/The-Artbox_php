<?php declare(strict_types=1);

require_once('DataManager.php');
require_once('FixeELem.php');

$dbm = new DataManager();

$oeuvre = $dbm->GetOeuvreById((int)$_GET['id']);

if ($oeuvre) {
    $id = (int)$oeuvre['id'];
    $artist = $oeuvre['artiste'];
    $titre = $oeuvre['titre'];
    $img = $oeuvre['img'];
    $des = $oeuvre['des'];

    FixeELem::showBaseStart($titre);
    FixeELem::showHeader();


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
}
else{
    FixeELem::showBaseStart('404');
    FixeELem::showHeader();

    ?>
    <main>
        <h1>Error 404</h1>
        <p>La page n'existe pas !</p>
    </main>
    <?php
}
FixeELem::showFooter();
FixeELem::showBaseEnd();
