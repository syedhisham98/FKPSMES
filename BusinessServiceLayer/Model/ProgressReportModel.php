<?php
require_once '../../BusinessServiceLayer/libs/db.php';

class progressModel{
    //To store and retrieve schedule.
    
    function stdAddProgress(){
        //To get all new progress from ProgressReportController class and save in progress table
        $sql = "insert into progress(student_name, student_id,project_title, progressDetails) values(:name, :stdID, :title, :detail)";
        $args = [':name'=>$this->name, ':stdID'=>$this->stdID, ':title'=>$this->title, ':detail'=>$this->detail];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function stdViewProgress(){
        //To retrieve all students progress from progress table and send to ProgressReportController class.
        $sql = "select * from progress";
        return DB::run($sql);
    }
    
    
}
?>