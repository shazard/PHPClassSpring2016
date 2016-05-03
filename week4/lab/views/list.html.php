<?php
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 
        
        require_once './autoload.php';
        $utility = new Utility();

        $folder = './includes/uploads';
        
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        
        $directory = new DirectoryIterator($folder);
        $orderCounter = 1;
           
?>
<hr>
        <?php foreach ($directory as $fileInfo) : ?>        
            <?php if ( $fileInfo->isFile() ) : ?>
                <h2><?php echo $orderCounter; ?></h2>
                <p><?php echo $fileInfo->getFilename(); 
                $orderCounter++;
                ?></p>
                <a href="index.php?view=view&file=<?php echo $fileInfo->getFilename();?>" class="btn btn-default">View</a></h1></p>
                <br>
                
                <form enctype="multipart/form-data" action="./includes/deleteFile.php" method="POST">
                    <input type="hidden" name="fileToDelete" value="<?php echo '.'.DIRECTORY_SEPARATOR. 'uploads'
                        .DIRECTORY_SEPARATOR. $fileInfo->getFilename(); ?>"/>
                    <input type="submit" class="btn btn-danger" value="Delete File" />
                </form>
                <hr>
            <?php endif; ?>
        <?php endforeach; ?>