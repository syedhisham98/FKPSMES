<?php
require_once '../../BusinessServiceLayer/model/lecturerModel.php';

class lecturerController{
    
    function add(){
        $lecturer = new lecturerModel();
        $lecturer->name = $_POST['name'];
        $lecturer->email = $_POST['email'];
        $lecturer->phone = $_POST['phone'];
        $lecturer->ID = $_POST['ID'];
        $lecturer->username = $_POST['username'];
        $lecturer->password = $_POST['password'];
        $lecturer->usertype = $_POST['usertype'];
        if($lecturer->addlecturer() > 0){
            $message = "Lecturer Successfully Registered!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageUser/login.php';</script>";
        }
    }
    
    function viewAll(){
        $lecturer = new lecturerModel();
        return $lecturer->viewalllecturer();

    }
    
    function viewlecturer($lecturer_id){
        $lecturer = new lecturerModel();
        $lecturer->lecturer_id = $lecturer_id;
        return $lecturer->viewlecturer();
    }
        
    function editlecturer(){
        $lecturer = new lecturerModel();
        $lecturer->lecturer_id = $_POST['lecturer_id'];
        $lecturer->name = $_POST['name'];
        $lecturer->email = $_POST['email'];
        $lecturer->phone = $_POST['phone'];
        $lecturer->username = $_POST['username'];
        $lecturer->password = $_POST['password'];
        if($lecturer->modifylecturer()){
            $message = "Success Update!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageLogin/profile.php?lecturer_id=".$_POST['lecturer_id']."';</script>";
        }
    }
    
    
}
?>
