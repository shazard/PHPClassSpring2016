<p>VIEW!!!</p>
<hr>

<?php
        /* ****************UPDATE FILE**************** */        
        $file = '.'.DIRECTORY_SEPARATOR. 'includes' .DIRECTORY_SEPARATOR.'uploads'
                .DIRECTORY_SEPARATOR. filter_input(INPUT_GET, 'file');
        
        require_once './autoload.php';
        $utility = new Utility();

        $isDelete = filter_input(INPUT_POST, 'isDelete');

        if ($utility->isPostRequest())
        {
            if ($isDelete)
            {
                $fileHandler1 = new FileHandler();
                
                if($fileHandler1->delete(filter_input(INPUT_POST, 'fileToDelete')))
                {
                    $_SESSION['results'] = filter_input(INPUT_POST, 'fileToDelete') . "DELETED!";
                    
                }
                else
                {
                    $_SESSION['results'] = "Not Deleted!";
                    
                }
                header('Location: ./index.php?view=default');
            }
        }
        
        var_dump($file);
?>

        
        <?php echo 'File Size: ' . filesize($file) . " bytes"; ?>

        <hr>
        
        <iframe width='100%' height='500px' src='<?php echo $file ?>'>

        </iframe>

        <form method="post" action='#'>
            <input type=hidden value="<?php echo $file; ?>" name="fileToDelete"/>
            <button class="btn btn-danger" value='true' name='isDelete'>Delete</button>
        </form>