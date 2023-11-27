<?php
require '../../config.php';
class CouponC
{
    public function listCoupon()
    {
        $sql='SELECT * FROM coupons';
        $db=config::getConnexion();
        try{
            $list=$db->query($sql);
            return $list;
        }
        catch(Exception $e)
        {
            die("Erreur".$e->getMessage());
        }
    }
    public function deleteCoupon($ide)
    {
        $sql = "DELETE FROM coupons WHERE id= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(":id",$ide);//pour faire la correction

        try{
            $req->execute();
        } catch (Exception $e){
            die('error:'.$e->getMessage());
        }
    }
    function addCoupon($Coupon)
    {
        $sql='INSERT INTO coupons VALUE(NULL, :code, :discount_percent, :expiration_date, :is_used)';
        $db=config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute(
            ['code'=>$Coupon->getCode(),
            'discount_percent'=>$Coupon->getDiscount_percent(),
            'expiration_date'=>$Coupon->getExpiration_date(),
            'is_used'=>$Coupon->getis_used(),
        ]);
        }
        catch(Exception $e)
        {
            die("Erreur".$e->getMessage());
        }
    }
    function showCoupon($id)
    {
        $sql = "SELECT * from coupons where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $coupons = $query->fetch();
            return $coupons;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateCoupon($coupons, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE coupons SET 
                    code = :code, 
                    discount_percent = :discount_percent, 
                    expiration_date = :expiration_date, 
                    is_used = :is_used
                WHERE id= :id'
            );
            
            
            $query->execute([
                'id' => $id,
                'code' => $coupons->getCode(),
                'discount_percent' => $coupons->getDiscount_percent(),
                'expiration_date' => $coupons->getExpiration_date(),
                'is_used' => $coupons->getIs_used(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>