<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>livres/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $livre->getTitre() ?>">
    </div>
    <div class="form-group">
        <label for="nombrePages">Nombre de pages : </label>
        <input type="number" class="form-control" id="nombrePages" name="nombrePages" value="<?= $livre->getNombrePages() ?>">
    </div>
    <h3>Images : </h3>
    <img src="<?= URL ?>public/images/<?= $livre->getImage() ?>">
    <div class="form-group">
        <label for="image">Changer l'image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Modification du livre : ".$livre->getId();
require "template.php";
?>