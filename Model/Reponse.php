<?php 
class Reponse {

private $id;
private $contenu;
private $id_rec;
private $id_admin;


public function __construct(int $id, string $contenu,int $id_reclamation,int $id_user )
    {
        $this->id = $id;
        $this->contenu = $contenu;
        $this->id_rec=$id_reclamation;
        $this->id_admin =$id_user;
      
        
    }

    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id=$id;
    }

    public function getContenu() : string 
    {
        return $this->contenu;
    }
    public function setContenu(string $contenu )
    {
        $this->contenu=$contenu;
    }
    public function getId_rec() : int 
    {
        return $this->id_rec;
    }
    public function setId_rec(int $id )
    {
        $this->id_rec=$id;
    }
    public function getId_admin(): int
    {
        return $this->id_admin;
    }

    public function setId_admin(int $id)
    {
        $this->id_admin=$id;
    }
    
   


}