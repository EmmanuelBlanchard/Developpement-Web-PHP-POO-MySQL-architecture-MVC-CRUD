<?php ob_start(); ?>

<p>ici le contenu de ma page d'accueil</p>

<?php
    $titre = "Bibliothèque MGA";
    $content = ob_get_clean();
    require "template.php";
?>