<?php
require_once '../../BusinessServiceLayer/model/ProgressReportModel.php';

class progressController{
    
    function stdAddProgress(){
        $stdProgress = new progressModel();
        $stdProgress->name = $_POST['name'];
        $stdProgress->stdID = $_POST['stdID'];
        $stdProgress->title = $_POST['title'];
        $stdProgress->detail = $_POST['detail'];
        if($stdProgress->stdAddProgress() > 0){
            $message = "Your Progress Successfully Submit!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageProgressReport/AddNewProgress.php';</script>";
        }
    }
    
    function stdViewProgress(){
        $stdProgress = new progressModel();
        return $stdProgress->stdViewProgress();

    }
    
    
}
?>