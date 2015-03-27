<?php

/*
 * add class 
 *  insert the data into mysql database
 * 
 * @author Ali7amdi
 */
class Add extends Awebarts {
    
    private $data;
    private $tablename;
    private $cxn; 

    public function __construct($data, $tablename)
    {
        if(is_array($data))
        {
            $this->data      = $data;
            $this->tablename = $tablename;
        }
        else
        {
            throw new Exception("Error: the data must be in an array.");
        }
        
        $this->connectToDb();
        
        // isert the data into the table
        $this->AddData();
        
        $this->close();        
    }
    
    // isert the data into the table
    function AddData()
    {
        foreach ($this->data as $key => $value)
        {
            $keys[]  = $key;
            $values[] = $value;
        }
        
        $tblKeys    = implode($keys, ","); 
        $dataValues = '"'.  implode($values, '","').'"';
        
       $query = "INSERT INTO $this->tablename ($tblKeys) VALUES ($dataValues)";
        
        if($sql = mysql_query($query))
        {
            return TRUE;
        }
        else
        {
            throw new Exception("Error: Can not excute the query.");
            return FALSE;
        }          
    }
        
    
}

?>
