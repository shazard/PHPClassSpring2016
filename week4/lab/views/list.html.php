<?php
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 
        
        $isDelete = filter_input(INPUT_POST, 'isDelete');
        $folder = './includes/uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
        $orderCounter = 1;
        if (isPostRequest())
        {
            if ($isDelete)
            {
                $fileHandler1 = new FileHandler();
            
            $fileHandler1->delete($file);
            //got this from chris u - refresh helps ensure server redirects by force refreshing the page
            header('Refresh:0; '.'index.php');           
            }
        }
           
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
                
                <form method="post" action='#'>
                    <hidden value="<?php? echo '.'.DIRECTORY_SEPARATOR. 'includes' .DIRECTORY_SEPARATOR.'uploads'
                    .DIRECTORY_SEPARATOR. $fileInfo->getFilename(); ?>" name="fileToDelete"/>
                    <button class="btn btn-danger" value='true' name='isDelete'>Delete</button>
                    
                </form>






                <hr>
            <?php endif; ?>
        <?php endforeach; ?>