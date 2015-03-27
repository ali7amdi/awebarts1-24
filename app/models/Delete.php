<?php

/*
 * Description of Delete
 *  to delete the request id
 * @author Ali7amdi
 */
class Delete extends Awebarts {
    
    private $tablename;
    
    public function __construct($tablename) {
        $this->tablename = $tablename;
        $this->connectToDb();
    }
    
    function deletRecordByID($id)
    {
        $id = intval($id);
        $query = "DELETE FROM `$this->tablename` WHERE `id` = '$id' ";
        if(!$sql= mysql_query($query))
        {
            throw new Exception("Error: not deleted.");
        }
        else
        {
            return TRUE;
        }
    }
    
}

?>
