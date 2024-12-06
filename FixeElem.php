<?php declare(strict_types=1);

class FixeELem
{
    public static function showBaseStart(string $oeuvre = null):void
    {
        $t = '';
        if ($oeuvre) {
            $t = ' - ' . $oeuvre;
        }
        ?>
        <!doctype html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css/style.css">
            <title>The ArtBox<?php echo $t ?></title>
        </head>
        <body>
        <?php
    }
    public static function showBaseEnd(): void
    {
        ?>
        </body>
        </html>
        <?php
    }
    public static function showHeader():void
    {
        ?>
        <header>
            <a href="index.php"><img src="img/logo.png" alt="Logo Artbox" id="logo"></a>
            <nav>
                <ul>
                    <li><a href="./">Accueil</a></li>
                </ul>
            </nav>
        </header> 
        <?php
    }
    public static function showFooter():void
    {
        ?>
        <footer>
            <p>
                <strong>© THE ARTBOX</strong> - <em>Tous droits réservés</em>
            </p>
        </footer>
        <?php
    }
}
