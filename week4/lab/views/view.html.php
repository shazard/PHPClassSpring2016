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
        <?php echo 'File Size: ' . filesize($file) . " bytes"; ?>
        <form enctype="multipart/form-data" action="./includes/deleteFile.php" method="POST">
            <input type="hidden" name="fileToDelete" value="<?php echo '.'.DIRECTORY_SEPARATOR. 'uploads'
                .DIRECTORY_SEPARATOR. filter_input(INPUT_GET, 'file'); ?>"/>
            <input type="submit" class="btn btn-danger" value="Delete File" />
        </form>
        
        <hr>
        
    <?php
    
     switch ($type)
     {
            case 'text/plain':
            case'text/html':
//                echo '<textarea rows="50" cols="75">' . $file . '</textarea>';
//                break;
            case'application/pdf':
                echo '<iframe width="100%" height="500px" src="' . $file . '"></iframe>';
                break;
            case'application/msword':
            case'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            case 'application/vnd.ms-excel':
            case'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                //http://localhost/PHPClassSpring2015/week4/lab/includes/uploads/file_docxb0589cdb04b1050b22bea6b3a8a4a92af3001a28.docx
                echo '<a href="' . $file . '"></a>';
                break;
            case'image/jpeg':
            case'image/png':
            case'image/gif':
                echo '<img src="' . $file . '"></img>';
                break;
            default:
                break;
     }
?>
        

            
            

<!--<textarea rows="4" cols="50"></textarea>-->
          
