<?php declare(strict_types=1);

require_once('DataManager.php');
require_once('FixeELem.php');

$warning = [
    'oeuvre' => false,
    'artiste' => false,
    'desc' => false,
    'img' => false
];

if($_POST)
{
    $valide = true;
    $dbm = new DataManager();
    $data = [
        'oeuvre' => $_POST["oeuvre"],
        'artiste' => $_POST["artiste"],
        'desc' => $_POST["desc"],
        'img' => $_POST["img"]
    ];
    foreach($data as $key=>$val)
    {
        if(!$val) 
        {
            $warning[$key] = true;
            $valide = false;
        }
    }
    $dbm->InsertOeuvre($data['artiste'], $data['oeuvre'], $data['img'], $data['desc']);
    
}
var_dump($warning);
FixeELem::showBaseStart();
FixeELem::showHeader();

?>
<main>
    <h1>Formulaire d'ajoute d'œuvre</h1>
    <form action="./traitement.php" method="post">

        <div class="warning <?php if(!$warning['oeuvre']) echo 'hide';?>">
            <span>Ce champ doit être rempli !</span>
        </div>
        <label for="oeuvre">Nom œuvre</label><br>
        <input type="text" name="oeuvre" id="oeuvre" value='<?php if(isset($_POST['oeuvre'])) echo $_POST['oeuvre']?>'><br>

        <div class="warning <?php if(!$warning['artiste']) echo 'hide';?>">
            <span>Ce champ doit être rempli !</span>
        </div>
        <label for="artiste">Artiste</label><br>
        <input type="text" name="artiste" id="artiste" value='<?php if(isset($_POST['artiste'])) echo $_POST['artiste']?>'><br>

        <div class="warning <?php if(!$warning['desc']) echo 'hide';?>">
            <span>Ce champ doit être rempli !</span>
        </div>
        <label for="desc">Description</label><br>
        <textarea name="desc" id="desc"><?php if(isset($_POST['desc'])) echo $_POST['desc']?></textarea><br>

        <div class="warning <?php if(!$warning['img']) echo 'hide';?>">
            <span>Ce champ doit être rempli !</span>
        </div>
        <label for="img">Nom fichier du image</label><br>
        <input type="text" name="img" id="img" value='<?php if(isset($_POST['desc'])) echo $_POST['desc']?>'><br>
        <input type="submit" value="Enregistrer">
    </form>
</main>
<?php

FixeELem::showFooter();
FixeELem::showBaseEnd();