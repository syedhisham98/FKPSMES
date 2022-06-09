<?php
require_once '../../BusinessServiceLayer/libs/db.php';

class secretariatModel{
    //To store and retrieve secretariat information.
    public $secretariat_id,$name,$email,$phone,$username,$password,$ID,$role;
   
    function addsecretariat(){
        //To get all new service secretariat information from secretariatController class and save in secretariat table.
        $sql = "insert into secretariat(secretariat_name, secretariat_email, secretariat_phone, username, password, usertype, staff_id,role) values(:name, :email, :phone, :username, :password, :ID, :usertype, :role)";
        $args = [':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':username'=>$this->username, ':password'=>$this->password, ':ID'=>$this->ID,':role'=>$this->role,':usertype'=>$this->usertype];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallsecretariat(){
        //To retrieve all profile information from secretariat table and send them to secretariatController class.
        $sql = "select * from secretariat";
        return DB::run($sql);
    }
    
    function viewsecretariat(){
        //To retrieve all profile information from secretariat table where secretariat_id=secretariat_id and send them to secretariatController class.
        $sql = "select * from secretariat where secretariat_id=:secretariat_id";
        $args = [':secretariat_id'=>$this->secretariat_id];
        return DB::run($sql,$args);
    }
    
    function modifysecretariat(){
        //To get all  service secretariat information from secretariatController class and update secretariat table.
        $sql = "update secretariat set secretariat_name=:name,secretariat_email=:email,secretariat_phone=:phone,username=:username,password=:password where secretariat_id=:secretariat_id";
        $args = [':secretariat_id'=>$this->secretariat_id,':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':username'=>$this->username,':password'=>$this->password];
        return DB::run($sql,$args);
    }
    
}
?>
