<?php

class Livre {
    private $id;
    private $titre;
    private $nombrePages;
    private $image;

    public function __construct($id,$titre,$nombrePages,$image) {
        $this->id = $id;
        $this->titre = $titre;
        $this->nombrePages = $nombrePages;
        $this->image = $image;
    }

    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}

    public function getTitre() {return $this->titre;}
    public function setTitre($titre) {$this->titre = $titre;}

    public function getNombrePages() {return $this->nombrePages;}
    public function setNombrePages($nombrePages) {$this->nombrePages = $nombrePages;}

    public function getImage() {return $this->image;}
    public function setImage($image) {$this->image = $image;}
}
