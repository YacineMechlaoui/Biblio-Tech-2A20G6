<?php 
class Reclamation {

private $id;
private $titre;
private $type;
private $description;
private $etat;
private $id_user;


public function __construct(int $id, string $titre,string $type,string $description,int $etat,int $id_user )
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->type = $type;
        $this->description =  $description;
        $this->etat=$etat;
        $this->id_user = $id_user;
        
    }

    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id=$id;
    }

    public function getTitre() : string 
    {
        return $this->titre;
    }
    public function setTitre(string $titre )
    {
        $this->titre=$titre;
    }
    public function getType() : string 
    {
        return $this->type;
    }
    public function setType(string $type )
    {
        $this->type=$type;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $desc)
    {
        $this->description=$desc;
    }
    public function getId_user() : int 
    {
        return $this->id_user;
    }
    public function setId_user(string $id)
    {
        $this->id_user=$id;
    }
    public function getEtat() : int 
    {
        return $this->etat;
    }
    public function setEtat(string $etat)
    {
        $this->etat=$etat;
    }
   


}