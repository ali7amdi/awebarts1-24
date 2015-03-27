<?php

/*
 * Display to get the requested data from the databse
 *
 * @author Ali7amdi
 */

class Display extends Awebarts {

    private $tablename;

    public function __construct($tablename) {

        $this->tablename = $tablename;

        $this->connectToDb();
    }

    function getAllData()
    {
         $query = "SELECT * FROM `$this->tablename` ORDER BY `id` DESC";   
         if (!$sql = mysql_query($query)) {
            throw new Exception("Error: Can not excute the query.");
        } else {
            $num = mysql_num_rows($sql);
            if($num>0)
            {
                for($i=0; $i<$num; $i++)
                {
                    $data[$i] = mysql_fetch_array($sql);
                }                    
            }
        }
        return $data;
    }

    function getLastRecordDESC() {

        $query = "SELECT * FROM `$this->tablename` ORDER BY `id` DESC LIMIT 1";

        if (!$sql = mysql_query($query)) {
            throw new Exception("Error: Can not excute the query.");
        } else {
            $num = mysql_num_rows($sql); // 1            
            while ($num > 0) {
                $data = mysql_fetch_array($sql);
                $num--;
            }
        }
        return $data;
    }
    
    function getRecordByID($id)
    {
        $id = intval($id);
        
        $query = "SELECT * FROM `$this->tablename` WHERE `id`= $id";
         if (!$sql = mysql_query($query)) {
            throw new Exception("Error: Can not excute the query.");
        } else {
            $num = mysql_num_rows($sql);
            while ($num > 0) {
                $data = mysql_fetch_array($sql);
                $num--;
            }
        }
        return $data;
    }

}

?>
