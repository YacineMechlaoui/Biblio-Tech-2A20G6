<?php
class Pack
{
    private ?int $id_pack=NULL;
    private ?string $Nom_p=NULL;
    private ?string $Categorie=NULL;
    private ?int $prix=NULL;
    private ?string $Description=NULL;

    public function __construct($id=null,$n,$c,$p,$d)
    {
        $this->id_pack=$id;
        $this->Nom_p=$n;
        $this->Categorie=$c;
        $this->prix=$p;
        $this->Description=$d;
    }

    public function getid_pack()
    {
        return $this->id_pack;
    }

    public function setId_pack($id){
        $this->id_pack=$id;
    }
    public function getNom_p(){
        return $this->Nom_p;
    }
    public function setNom_p($Nom){
        $this->Nom_p=$Nom;
}
public function getCategorie(){
    return $this->Categorie;
}
    public function setCategorie($Categorie){
        $this->Categorie=$Categorie;
    }
    public function getPrix(){
        return $this->prix;
    }

    public function setPrix($prix){
        $this->prix=$prix;
    }
    public function getDescription(){
        return $this->Description;
    }
    public function setDescription($description){
        $this->Description=$description;
    }
}
?>
