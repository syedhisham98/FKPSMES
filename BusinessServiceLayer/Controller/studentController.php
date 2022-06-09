<?php
require_once '../../BusinessServiceLayer/model/studentModel.php';

class studentController{
    // The controller that is responsible to handle the login, update profile and registration inputs of the student.
    
   function add(){
    // create new oject 
        $student = new studentModel();
         // set the attributes of student
        $student->name = $_POST['name'];
        $student->email = $_POST['email'];
        $student->phone = $_POST['phone'];
        $student->ID = $_POST['ID'];
        $student->username = $_POST['username'];
        $student->password = $_POST['password'];
        $student->usertype = $_POST['usertype'];
        if($student->addStudent() > 0){
            $message = "Student Successfully Registered";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageUser/login.php';</script>";
        // send to studentModel
        }
    }
    
    function viewAll(){
         // view all student
        $student = new studentModel();
        return $student->viewallStudent();
    }
    
  function viewStudent(){
        $student = new studentModel();
        $student->student_id = $_SESSION['userid'];
        return $student->viewStudent();
    }

     function editStudent(){
        $student = new studentModel();
        $student->student_id = $_POST['student_id'];
        $student->name = $_POST['name'];
        $student->email = $_POST['email'];
        $student->phone = $_POST['phone'];
        $student->ID = $_POST['ID'];
        $student->tittle = $_POST['tittle'];
        $student->password = $_POST['password'];
        if($student->modifyStudent()){
            $message = "Success Update!";
		echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageUser/profile.php?student_id=".$_POST['student_id']."';</script>";
        }
    }
    
}
?>
