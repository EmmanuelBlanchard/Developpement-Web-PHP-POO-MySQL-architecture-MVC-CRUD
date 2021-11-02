<?php ob_start(); ?>

<p>ici le contenu de ma page listant les livres</p>

<?php
    $titre = "Les livres de la bibliothèque";
    $content = ob_get_clean();
    require "template.php";
?>