<?php
require_once '../../BusinessServiceLayer/libs/db.php';

class lecturerModel{
    //To store and retrieve lecturer information.
    public $lecturer_id,$name,$email,$phone,$username,$password,$usertype,$expertise,$ID;
    
    function addlecturer(){
        //To get all new lecturer information from lecturerController class and save in lecturer table
        $sql = "insert into lecturer(lecturer_name, lecturer_email, lecturer_phone, username, password, usertype, staff_id, expertise) values(:name, :email, :phone, :username, :password, :expertise, :ID, :usertype)";
        $args = [':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':username'=>$this->username, ':password'=>$this->password, ':ID'=>$this->ID, ':expertise'=>$this->expertise,':usertype'=>$this->usertype];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewalllecturer(){
        //To retrieve all profile information from lecturer table and send them to lecturerController class.
        $sql = "select * from lecturer";
        return DB::run($sql);
    }
    
    function viewlecturer(){
        //To retrieve all profile information from lecturer table where lecturer_id=lecturer_id and send them to lecturerController class.
        $sql = "select * from lecturer where lecturer_id=:lecturer_id";
        $args = [':lecturer_id'=>$this->lecturer_id];
        return DB::run($sql,$args);
    }
    
    function modifylecturer(){
        //To get all  lecturer information from lecturerController class and update lecturer table.
        $sql = "update lecturer set lecturer_name=:name,lecturer_email=:email,lecturer_phone=:phone,username=:username,password=:password where lecturer_id=:lecturer_id";
        $args = [':lecturer_id'=>$this->lecturer_id,':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':username'=>$this->username,':password'=>$this->password];
        return DB::run($sql,$args);
    }
    
    // function deleteStud(){
    //     $sql = "delete from student where stud_ic=:stud_ic";
    //     $args = [':stud_ic'=>$this->stud_ic];
    //     return DB::run($sql,$args);
    // }
}
?>
