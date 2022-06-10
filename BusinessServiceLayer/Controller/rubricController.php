<?php
require_once '../../BusinessServiceLayer/model/rubricModel.php';

class rubricController{

    function addRubric(){
        $rubric = new rubricModel();
        $rubric->rubricDesc = $_POST['rubricDesc'];
        $rubric->mark = $_POST['mark'];
        $rubric->weight = $_POST['weight'];
        if($rubric->addRubric() > 0){
            $message = "Rubric Added!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageRubric/rubricCoordinator.php';</script>";
        }
    }

    function viewRubric(){
       $rubric = new rubricModel();
       return $rubric->viewRubric();
   }

    function deleteRubric(){
    $rubric = new rubricModel();
    $rubric->rubricID = $_POST['rubricID'];
    $rubrick->deleteRubric();
    $message = "Product Deleted!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageRubric/rubricCoordinator.php';</script>";
    }

    function editRubric(){
        $rubric = new rubricModel();
        $rubric->rubricDesc = $_POST['rubricDesc'];
        $rubric->mark = $_POST['mark'];
        $rubric->weight = $_POST['weight'];
        if($rubric -> editRubric()){
            $message = "Rubric Edited!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/ManageRubric/rubricCoordinator.php';</script>";
            }  
    }
}

