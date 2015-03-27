<!--  add new section ::
sections: sectionId, sectionName, sectionStaus, sectionLocation, sectionDesc, sectionDate, username
-->

<form class="mainSettingsForm add" action="" method="post">
    <h1>Edit section:</h1>

    <label>Section Name:</label>
    <input type="text" name="sectionName" placeholder="please a section title." value="<?php echo $recSecdata['sectionName']; ?>">

    <p>
        <label>Section Status:</label>
        <select name="sectionStaus">
            <?php
            if ($recSecdata['sectionStaus'] == "active") {
                echo '
                    <option value="active">Active</option>
                    <option value="disActive">Disactive</option>                    
                    ';
            } else {
                echo '
                    <option value="disActive">Disactive</option>                    
                    <option value="active">Active</option>
                    ';
            }
            ?>


        </select>
    </p>

    <p>
        <label>Section Location:</label>
        <select name="sectionLocation">
            <?php
                if($recSecdata['sectionLocation'] == "Side")
                {
                    echo '
                        <option value="Side">Side</option>
                        <option value="Body">Body</option>
                          ';
                }
                else
                {
                    echo '
                        <option value="Body">Body</option>
                        <option value="Side">Side</option>
                          ';
                }
            
            ?>
            
        </select>
    </p>

    <label>Section Description:</label>
    <textarea name="sectionDesc" placeholder="please write a section desc."><?php echo $recSecdata['sectionDesc']; ?></textarea>    
    <input class="btn-primary" type="submit" name="submit" value="Edit">    
</form>
