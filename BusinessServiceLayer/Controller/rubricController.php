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
    $rubric->rubric_id = $_POST['rubric_id'];
    if($rubric->deleteRubric()){
         $message = "Successfully Deleted!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageRubric/rubricCoordinator.php?rubric_id=".$_POST['rubric_id']."';</script>";
    }
}
}

