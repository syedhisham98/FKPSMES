<?php
require_once '../../BusinessServiceLayer/model/ProgressReportModel.php';

class ProgressReportController{
    
    function addProgress(){
        $addProgress = new ProgressReportModel();
        $addProgress->student_name = $_POST['student_name'];
        $addProgress->student_id = $_POST['student_id'];
        $addProgress->project_title = $_POST['project_title'];
        $addProgress->progressDetails = $_POST['progressDetails'];
        if($addProgress->addProgress() > 0){
            $message = "New Progress Successfully Add!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageProgressReport/AddNewProgress.php';</script>";
        }
    }
    
    
}
?>