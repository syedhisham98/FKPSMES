<?php
require_once '../../BusinessServiceLayer/model/scheduleModel.php';

class scheduleController{
    
    function stdAddSchdl(){
        $stdSchedule = new scheduleModel();
        $stdSchedule->title = $_POST['title'];
        $stdSchedule->content = $_POST['content'];
        $stdSchedule->time = $_POST['time'];
        $stdSchedule->date = $_POST['date'];
        if($stdSchedule->stdAddSchedule() > 0){
            $message = "Schedule Successfully Add!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageSchedule/stdAddSchedule.php';</script>";
        }
    }
    
    function stdViewAll(){
        $stdSchedule = new scheduleModel();
        return $stdSchedule->stdViewSchedule();

    }
        
    function stdEditSchdl(){
        $stdSchedule = new scheduleModel();
        $stdSchedule->scheduleID = $_POST['schedule_id'];
        $stdSchedule->title = $_POST['title'];
        $stdSchedule->content = $_POST['content'];
        $stdSchedule->time = $_POST['time'];
        $stdSchedule->date = $_POST['date'];
        if($stdSchedule->stdEditSchedule()){
            $message = "Schedule Successfully Update!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageSchedule/stdAddSchedule.php?schedule_id=".$_POST['schedule_id']."';</script>";
        }
    }
    
    
}
?>
