<?php
require_once '../../BusinessServiceLayer/libs/db.php';

class scheduleModel{
    //To store and retrieve schedule.
    //public $scheduleID,$scheduleTitle,$scheduleContent,$scheduleTime,$scheduleDate;
    
    function stdAddSchedule(){
        //To get all new schedule from lecturerController class and save in lecturer table
        $sql = "insert into stdSchedule(schedule_title, schedule_content,schedule_time, schedule_date) values(:title, :content, :time, :date)";
        $args = [':title'=>$this->title, ':content'=>$this->content, ':time'=>$this->time, ':date'=>$this->date];
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
    
    // function deleteStd(){
    //     $sql = "delete from stdSchedule where title=:title";
    //     $args = [':title'=>$this->title];
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

    function lctViewSchedule(){
        //To retrieve all profile information from lecturer table and send them to lecturerController class.
        $sql = "select * from lctSchedule";
        return DB::run($sql);
    }
}
?>