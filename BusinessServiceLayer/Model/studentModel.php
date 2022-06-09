<?php
require_once '../../BusinessServiceLayer/libs/db.php';

class studentModel{
    public $student_id,$name,$email,$phone,$username,$password,$usertype,$ID,$tittle;
    
    function addStudent(){
        $sql = "insert into student(student_name, student_email, student_phone,username, password, usertype, matric_id, project_tittle) values(:name, :email, :phone, :username, :password, :usertype, :ID, :tittle)";
        $args = [':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone,':username'=>$this->username, ':password'=>$this->password, ':usertype'=>$this->usertype, ':ID'=>$this->ID, ':tittle'=>$this->tittle];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallStudent(){
        $sql = "select * from student";
        return DB::run($sql);
    }
    
    function viewStudent(){
        $sql = "select * from student where student_id=:student_id";
        $args = [':student_id'=>$this->student_id];
        return DB::run($sql,$args);
    }
   
    
    function modifyStudent(){
        $sql = "update student set student_name=:name,student_email=:email,student_phone=:phone,username=:username,password=:password, project_tittle=:tittle ,matric_id=:ID where student_id=:student_id";
        $args = [':student_id'=>$this->student_id,':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone,  ':username'=>$this->username,':password'=>$this->password,':ID'=>$this->ID,':tittle'=>$this->tittle];
        return DB::run($sql,$args);
    }
    
    
}
?>
