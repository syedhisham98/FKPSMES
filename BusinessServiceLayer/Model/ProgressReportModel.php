<?php
require_once '../../BusinessServiceLayer/libs/db.php';

class ProgressReportModel{
    //To store and retrieve progress.
    
    function addProgress(){
        //To get all new progress
        $sql = "insert into progress(student_name, student_id, project_title, progressDetails) values(:username, :dateProgress, :student_name, :student_id, :project_title, :progressDetails)";
        $args = [':student_name'=>$this->student_name, '
        :student_id'=>$this->student_id, '
        :project_title'=>$this->project_title, '
        :progressDetails'=>$this->progressDetails];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
}
?>


}