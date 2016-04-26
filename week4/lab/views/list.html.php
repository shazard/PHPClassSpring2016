<?php
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 

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
                <a href="index.php" class="btn btn-danger">Delete</a></h1></p>
                <hr>
            <?php endif; ?>
        <?php endforeach; ?>