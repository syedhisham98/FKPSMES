<?php
require_once '../../BusinessServiceLayer/libs/db.php';

class progressModel{
    //To store and retrieve schedule.
    //public $scheduleID,$scheduleTitle,$scheduleContent,$scheduleTime,$scheduleDate;
    
    function stdAddProgress(){
        //To get all new schedule from lecturerController class and save in lecturer table
        $sql = "insert into progress(student_name, student_id,project_title, progressDetails) values(:name, :stdID, :title, :detail)";
        $args = [':name'=>$this->name, ':stdID'=>$this->stdID, ':title'=>$this->title, ':detail'=>$this->detail];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function stdViewSchedule(){
        //To retrieve all profile information from lecturer table and send them to lecturerController class.
        $sql = "select * from stdSchedule";
        return DB::run($sql);
    }
    
    function stdEditSchedule(){
        //To get all  lecturer information from lecturerController class and update lecturer table.
        $sql = "update stdSchedule set schedule_title=:title,schedule_content=:content,schedule_time=:time,schedule_date=:date";
        $args = [':title'=>$this->scheduleTitle, ':content'=>$this->scheduleContent, ':time'=>$this->scheduleTime, ':date'=>$this->scheduleDate];
        return DB::run($sql,$args);
    }
    
    // function deleteStud(){
    //     $sql = "delete from student where stud_ic=:stud_ic";
    //     $args = [':stud_ic'=>$this->stud_ic];
    //     return DB::run($sql,$args);
    // }

    function lctAddSchedule(){
        //To get all new schedule from lecturerController class and save in lecturer table
        $sql = "insert into lctSchedule(schedule_title, schedule_content,schedule_time, schedule_date) values(:title, :content, :time, :date)";
        $args = [':title'=>$this->title, ':content'=>$this->content, ':time'=>$this->time, ':date'=>$this->date];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
}
?>