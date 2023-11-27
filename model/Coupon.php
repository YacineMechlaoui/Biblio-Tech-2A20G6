<?php
class Coupon
{
    private ?int $id=NULL;
    private ?string $code=NULL;
    private ?string $discount_percent=NULL;
    private ?string $expiration_date=NULL;
    private ?string $is_used=NULL;

    public function __construct($id=null,$c,$d,$e,$i)
    {
        $this->id=$id;
        $this->code=$c;
        $this->discount_percent=$d;
        $this->expiration_date=$e;
        $this->is_used=$i;
    }

    public function getid()
    {
        return $this->id;
    }

    public function setCode($c){
        $this->code=$c;

    }
    public function getCode(){
        return $this->code;

    }

    public function setDiscount_percent($d){
        $this->discount_percent=$d;

    }
    public function getDiscount_percent(){
       return  $this->discount_percent;

    }

    public function setExpiration_date($e){
        $this->expiration_date=$e;

    }
    public function getExpiration_date(){
       return $this->expiration_date;

    }

    public function setIs_used($i){
        $this->is_used=$i;

    }
    public function getIs_used(){
       return $this->is_used;

    }
}

?>
