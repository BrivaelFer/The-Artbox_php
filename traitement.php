<?php
require_once('DataManager.php');
require_once('FixeELem.php');

$dbm = new DataManager();

FixeELem::showBaseStart();
FixeELem::showHeader();

?>
<!-- Formulaire -->
<?php

FixeELem::showFooter();
FixeELem::showBaseEnd();