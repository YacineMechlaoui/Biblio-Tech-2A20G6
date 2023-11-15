<?php
class client 
{
    private ?string $id_client=null;
    private ?string $nom=null;
    private ?string $prenom=null;
    private ?string $email=null;
    private ?string $telephone=NULL;
    private ?string $mdp=NULL;
    private ?string $adresse=null;
    private ?string $cin=null;
    private ?string $num_carte=null;

    public function __construct($id=null,$n,$p,$e,$t,$motdp,$ad,$CIN,$num)
    {
        $this->id_client=$id;
        $this->nom=$n;
        $this->prenom=$p;
        $this->email=$e;
        $this->telephone=$t;
        $this->mdp=$motdp;
        $this->adresse=$ad;
        $this->cin=$CIN;
        $this->num_carte=$num;

    }

    public function getid()
    {
        return $this->id_client;
    }

    public function setNom($n){
        $this->nom=$n;

    }
    public function getNom(){
       return $this->nom;

    }

    public function setPrenom($p){
        $this->prenom=$p;

    }
    public function getPrenom(){
       return  $this->prenom;

    }

    public function setEmail($e){
        $this->email=$e;

    }
    public function getEmail(){
       return $this->email;

    }

    public function setTel($t){
        $this->telephone=$t;

    }
    public function getTel(){
      return  $this->telephone;

    }public function setmdp($motdp){
        $this->mdp=$motdp;

    }
    public function getmdp(){
      return  $this->mdp;

    }
    public function setadresse($ad){
        $this->adresse=$ad;

    }
    public function getadresse(){
      return  $this->adresse;

    }
    public function setcin($CIN){
        $this->cin=$CIN;

    }
    public function getcin(){
      return  $this->cin;

    }
    public function setnum_carte($num){
        $this->num_carte=$num;

    }
    public function getnum_carte(){
      return  $this->num_carte;

    }
}

?>