<p>VIEW!!!</p>

<?php
        /* ****************UPDATE FILE**************** */        
        $file = '.'.DIRECTORY_SEPARATOR. 'includes' .DIRECTORY_SEPARATOR.'uploads'
                .DIRECTORY_SEPARATOR. filter_input(INPUT_GET, 'file');
        
        //http://php.net/manual/en/fileinfo.constants.php
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file);
        
        var_dump($type);
        
        //http://php.net/manual/en/function.filesize.php
        var_dump(filesize($file));
        
        /*
         * To delete a file use unlink
         */
        
?>