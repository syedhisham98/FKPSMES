<?php
require_once '../../BusinessServiceLayer/libs/db.php';

class secretariatModel{
    public $secretariat_id,$name,$email,$phone,$username,$usertype,$password,$ID,$role;
   
    function addSecretariat(){
        $sql = "insert into secretariat(secretariat_name, secretariat_email, secretariat_phone, username, password, staff_id, role, usertype) values(:name, :email, :phone, :username, :password, :ID, :usertype, :role)";
        $args = [':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':username'=>$this->username, ':password'=>$this->password, ':ID'=>$this->ID,':usertype'=>$this->usertype, ':role'=>$this->role];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallSecretariat(){
        $sql = "select * from secretariat";
        return DB::run($sql);
    }
    
    function viewSecretariat(){
        $sql = "select * from secretariat where secretariat_id=:secretariat_id";
        $args = [':secretariat_id'=>$this->secretariat_id];
        return DB::run($sql,$args);
    }
    
    function modifySecretariat(){
        $sql = "update secretariat set secretariat_name=:name,secretariat_email=:email,secretariat_phone=:phone,username=:username,password=:password, staff_id=:ID, expertise=:expertise where secretariat_id=:secretariat_id";
        $args = [':secretariat_id'=>$this->secretariat_id,':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':username'=>$this->username,':password'=>$this->password];
        return DB::run($sql,$args);
    }
    
}
?>
