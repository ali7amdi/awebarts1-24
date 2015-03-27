<h3>
    Sections    
</h3>

<h2><a href="?page=Sections&action=add">Add New Section</a></h2>


<?php
if ($_POST OR @$_GET['action']) {
    if (isset($_GET['action']) AND $_GET['action'] == "add") {
        include 'veiws/addSection.php';
    }
    if (isset($_POST['submit']) && $_POST['submit'] == "Add") {
        //sections: id, sectionName, sectionStaus, sectionLocation, sectionDesc, sectionDate, username

        $newSEcData['sectionName'] = $_POST['sectionName'];
        $newSEcData['sectionStaus'] = $_POST['sectionStaus'];
        $newSEcData['sectionLocation'] = $_POST['sectionLocation'];
        $newSEcData['sectionDesc'] = $_POST['sectionDesc'];
        $newSEcData['username'] = $_SESSION['username'];

        $tablename = "sections";

        try {
            include 'models/Awebarts.php';
            include 'models/Add.php';

            $addNewSec = new Add($newSEcData, $tablename);

            if ($addNewSec) {
                echo '<script type="text/javascript"> alert("The New Section was added !"); history.back();</script>';
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    // Delete:
    if (isset($_GET['action']) AND $_GET['action'] == "delete") {

        try {
            include 'models/Awebarts.php';
            include 'models/Delete.php';
            $tablename = "sections";
            $id = $_GET['id'];

            $deSec = new Delete($tablename);
            $deSec->deletRecordByID($id);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    
    // Edit:
     if (isset($_GET['action']) AND $_GET['action'] == "edit")
     {
         $id = $_GET['id'];
         $tablename = "sections";
         
         include 'models/Awebarts.php';
         include 'models/Display.php';
         
         $editSecDis = new Display($tablename);
         $recSecdata = $editSecDis->getRecordByID($id);
         
         include 'veiws/editSection.php';
     }
     if (isset($_POST['submit']) && $_POST['submit'] == "Edit")
     {
         //sections: id, sectionName, sectionStaus, sectionLocation, sectionDesc, sectionDate, username
         $SecDataedit['sectionName']     = $_POST['sectionName'];
         $SecDataedit['sectionStaus']    = $_POST['sectionStaus'];
         $SecDataedit['sectionLocation'] = $_POST['sectionLocation'];
         $SecDataedit['sectionDesc']     = $_POST['sectionDesc'];
         
         try {             
            include 'models/Update.php';
            $tablename = "sections";
            
            $SecUpdate = new Update($SecDataedit, $tablename);
            $updtSec = $SecUpdate->editData($id);
            
            if($updtSec)
            {
                echo '<script type="text/javascript"> alert("The Section was updated !"); history.back();</script>';
            }            
         } catch (Exception $exc) {
             echo $exc->getMessage();
         }
              
     }
    
} else {
    include 'models/Awebarts.php';
    include 'models/Display.php';
    $tablename = "sections";

    $displaySec = new Display($tablename);
    $SecDataDisplay = $displaySec->getAllData();

    include 'veiws/sections.php';
}
?>