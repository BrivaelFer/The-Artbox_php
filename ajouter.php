<?php declare(strict_types=1);

require_once('DataManager.php');
require_once('FixeELem.php');

$warning = [
    'oeuvre' => false,
    'artiste' => false,
    'desc' => false,
    'img' => false
];
$postClean = [
    'oeuvre' => isset($_POST['oeuvre']) ? htmlentities($_POST["oeuvre"]):'',
    'artiste' => isset($_POST['artiste']) ? htmlentities($_POST["artiste"]): '',
    'desc' => isset($_POST['desc']) ? htmlentities($_POST["desc"]): '',
    'img' => isset($_POST['img']) ? htmlentities($_POST["img"]) :''
];
if($_POST)
{
    $valide = true;
    $dbm = new DataManager();
    $data = [
        'oeuvre' => isset($_POST['oeuvre']) ? htmlentities($_POST["oeuvre"]):'',
        'artiste' => isset($_POST['artiste']) ? htmlentities($_POST["artiste"]): '',
        'desc' => isset($_POST['desc']) ? htmlentities($_POST["desc"]): '',
        'img' => isset($_POST['img']) ? htmlentities($_POST["img"]) :''
    ];

    foreach($data as $key=>$val)
    {
        if(!$val) 
        {
            $warning[$key] = true;
            $valide = false;
        }
    }

    if(strlen($data['desc']) < 3)
    {
        $valide = false;
        $warning['desc'] = true;
    }

    if($valide)
    {
        $dbm->InsertOeuvre($data['artiste'], $data['oeuvre'], $data['img'], $data['desc']);
        foreach ($_POST as $key => $_) {
            $_POST[$key] = '';
        }
    }
}

FixeELem::showBaseStart();
FixeELem::showHeader();

?>
<main>
    <h1>Formulaire d'ajout d'œuvre</h1>
    <form action="./ajouter.php" method="post">

        <div class="f-champ<?php if($warning['oeuvre']) echo ' warning'; ?>" >
            <span class="small_t<?php if(!$warning['oeuvre']) echo ' hide';?>">Ce champ doit être rempli !</span><br>       
            <label for="oeuvre">Nom œuvre</label><br>
            <input type="text" name="oeuvre" id="oeuvre" value='<?php if(isset($postClean['oeuvre'])) echo $postClean['oeuvre']?>'><br>
        </div>
        <div class="f-champ<?php if($warning['artiste']) echo ' warning'; ?>" >
            <span class="small_t<?php if(!$warning['artiste']) echo ' hide';?>">Ce champ doit être rempli !</span><br>
            <label for="artiste">Artiste</label><br>
            <input type="text" name="artiste" id="artiste" value='<?php if(isset($postClean['artiste'])) echo $postClean['artiste']?>'><br>
        </div>
        <div class="f-champ<?php if($warning['desc']) echo ' warning'; ?>" >
            <span class="small_t<?php if(!$warning['desc']) echo ' hide';?>">Ce champ doit être rempli et contenir au moins 3 caractères !</span><br>
            <label for="desc">Description</label><br>
            <textarea name="desc" id="desc"><?php if(isset($postClean['desc'])) echo $postClean['desc']?></textarea><br>
        </div>
        <div class="f-champ<?php if($warning['img']) echo ' warning'; ?>" >
            <span class="small_t<?php if(!$warning['img']) echo ' hide';?>">Ce champ doit être rempli !</span><br>      
            <label for="img">Nom fichier du image</label><br>
            <input type="url" name="img" id="img" value='<?php if(isset($postClean['img'])) echo $postClean['img']?>'><br>
        </div>
        <input type="submit" value="Enregistrer">
    </form>
</main>
<?php

FixeELem::showFooter();
FixeELem::showBaseEnd();