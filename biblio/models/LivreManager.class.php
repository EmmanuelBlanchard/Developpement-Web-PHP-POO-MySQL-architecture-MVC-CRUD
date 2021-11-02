<?php
require_once "Model.class.php";
require_once "Livre.class.php";

class LivreManager extends Model {
    private $livres;

    public function ajoutLivre($livre) {
        $this->livres[] = $livre;
    }

    public function getLivres() {
        return $this->livres;
    }

    public function chargementLivres() {
        $req = $this->getBdd()->prepare("SELECT * FROM livres");
        $req->execute();
        $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesLivres as $livre) {
            $l = new Livre($livre['id'],$livre['titre'],$livre['nombrePages'],$livre['image']);
            $this->ajoutLivre($l);
        }
    }

    public function getLivreById($id) {
        for($i = 0; $i < count($this->livres); $i++) {
            if($this->livres[$i]->getId() === $id) {
                return $this->livres[$i];
            }
            
        }
    }

    public function ajoutLivreBd($titre,$nombrePages,$image) {
        $req = "
        INSERT INTO livres (titre, nombrePages, image)
        values (:titre, :nombrePages, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":nombrePages",$nombrePages,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0) {
            $livre = new Livre($this->getBdd()->lastInsertId(),$titre,$nombrePages,$image); // création d'un livre
            $this->ajoutLivre($livre); // ajout du livre dans le tableau de livres
        }  
    }

}
