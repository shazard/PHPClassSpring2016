<p>VIEW!!!</p>
<hr>

<?php
        /* ****************UPDATE FILE**************** */        
        $file = '.' . DIRECTORY_SEPARATOR. 'includes' . DIRECTORY_SEPARATOR .'uploads'
                . DIRECTORY_SEPARATOR . filter_input(INPUT_GET, 'file');
        
        require_once './autoload.php';
        $utility = new Utility();
        
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file);
        

?>

        <b>File Type:</b> <?php echo  $type; ?>
        <br>
        <b>File Size:</b> <?php echo filesize($file) ?> bytes
        <br>
        <b>Date Created:</b> <?php echo date("F d Y H:i:s.",filemtime($file)); ?>
        
        <br><br>

        <form enctype="multipart/form-data" action="./includes/deleteFile.php" method="POST">
            <input type="hidden" name="fileToDelete" value="<?php echo '.'.DIRECTORY_SEPARATOR. 'uploads'
                .DIRECTORY_SEPARATOR. filter_input(INPUT_GET, 'file'); ?>"/>
            <input type="submit" class="btn btn-danger" value="Delete File" />
        </form>
        
        <hr>
    
     <?php switch ($type): case 'text/plain': ?>
     <?php case'text/html': case'application/pdf': ?>
            <iframe width="100%" height="500px" src="<?php echo $file ?>"></iframe>
            <?php break; ?>
     <?php case'application/msword': 
        case'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
        case 'application/vnd.ms-excel':
        case'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': ?>
            <a class="btn btn-info" href="<?php echo $file ?>">Download</a>
            <?php break; ?>
    <?php case'image/jpeg':
        case'image/png':
        case'image/gif': ?>
            <img src="<?php echo $file ?>"></img>';
            <?php break; ?>
    <?php default: ?>
            <?php break; ?>
    <?php endswitch; ?>

            
            


          
