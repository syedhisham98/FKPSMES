<?php
require_once '../../BusinessServiceLayer/model/secretariatModel.php';

class secretariatController{
    
    function add(){
        $secretariat = new secretariatModel();
        $secretariat->name = $_POST['name'];
        $secretariat->email = $_POST['email'];
        $secretariat->phone = $_POST['phone'];
        $secretariat->ID = $_POST['ID'];
        $secretariat->username = $_POST['username'];
        $secretariat->password = $_POST['password'];
        $secretariat->usertype = $_POST['usertype'];
        if($secretariat->addsecretariat() > 0){
             $message = "secretariat Successfully Registered!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageUser/login.php';</script>";
        }
    }
    
    function viewAll(){
        $secretariat = new secretariatModel();
        return $secretariat->viewallsecretariat();
    }
    
     function viewsecretariat($sp_id){
        $secretariat = new secretariatModel();
        $secretariat->sp_id = $sp_id;
        return $secretariat->viewsecretariat();
    }
        
    function editsecretariat(){
        $secretariat = new secretariatModel();
        $secretariat->sp_id = $_POST['sp_id'];
        $secretariat->name = $_POST['name'];
        $secretariat->email = $_POST['email'];
        $secretariat->phone = $_POST['phone'];
        $secretariat->username = $_POST['username'];
        $secretariat->password = $_POST['password'];
        if($secretariat->modifysecretariat()){
            $message = "Success Update!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageLogin/profile.php?sp_id=".$_POST['sp_id']."';</script>";
        }
    }
    
    
}
?>
