<?php ob_start(); ?>

<?= $message ?>

<?php
    $titre = "Erreur !";
    $content = ob_get_clean();
    require "template.php";
?>
