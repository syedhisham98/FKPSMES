<?php
require_once '../../BusinessServiceLayer/libs/db.php';

class rubricModel{
    public 

    function addRubric(){
        $sql = "insert into rubric(rubricWeight, rubricMark, rubricDesc ) values(:weight, :mark, :rubricDesc)";
        $args = [':weight'=>$this->weight, ':mark'=>$this->mark, ':rubricDesc'=>$this->rubricDesc];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function viewRubric(){
        $sql = "select * from rubric";
        return DB::run($sql);
    }

    function deleteRubric(){
            $sql = "delete from rubric where rubricID=:rubricID";
            $args = [':rubricID'=>$this->rubricID];
            return DB::run($sql,$args);
    }

    function editRubric(){
    	$sql = "update rubric set rubricWeight=:rubricWeight, rubricMark=:rubricMark, rubricDesc=:rubricDesc where rubricID=:rubricID";
    	$args = [':weight'=>$this->weight, ':mark'=>$this->mark, ':rubricDesc'=>$this->rubricDesc, ':rubricID'=>$this->rubricID];
    	return DB::run($sql,$args);
    }
}
?>