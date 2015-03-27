<h3>Main Settings</h3>
<?php 
if(isset($_POST['submit']) && $_POST['submit'] == "Update")
{
    //`site_name`, `site_url`, `site_dcsc`, `site_email`, `site_tags`, `site_homepanel`, `fb`, `tw`, `yt`, `rss`
    
    $mainsettings['site_name']      = $_POST['site_name'];
    $mainsettings['site_url']       = $_POST['site_url'];
    $mainsettings['site_dcsc']      = $_POST['site_dcsc'];
    $mainsettings['site_email']     = $_POST['site_email'];
    $mainsettings['site_email']     = $_POST['site_email'];
    $mainsettings['site_tags']      = $_POST['site_tags'];
    $mainsettings['site_homepanel'] = $_POST['site_homepanel'];
    $mainsettings['site_homepanel'] = $_POST['site_homepanel'];
    $mainsettings['fb']             = $_POST['fb'];
    $mainsettings['tw']             = $_POST['tw'];
    $mainsettings['yt']             = $_POST['yt'];
    $mainsettings['rss']            = $_POST['rss'];
    $mainsettings['username']       = $_POST['username'];

    try {
        include 'models/Awebarts.php';
        include 'models/Add.php';
        $addMainSettings = new Add($mainsettings, "main_settings");
        
        if($addMainSettings == TRUE)
        {
            echo 'Succesfully Added.';
        }
        
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
    
}
else
{
    try {
        include 'models/Awebarts.php';
        include 'models/Display.php';
        
       $data = new Display("main_settings");  
       
       $displayData = $data->getLastRecordDESC();
       
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
    include 'veiws/v_mainSettings.php';
}


?>