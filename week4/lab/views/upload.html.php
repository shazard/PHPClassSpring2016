


<?php

    if ($utility->isPostRequest())
    {
        $filehandler = new FileHandler();

        try {
            $fileName = $filehandler->upLoad('upfile');
        } catch (RuntimeException $e) {
            $error = $e->getMessage();
        }
        if (isset($fileName))
        {
            $results = $fileName . " is uploaded successfully";
        }
        else
        {
            $results = $error;
        }
    }
?>



<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="upload.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="upfile" type="file" />
    <input type="submit" value="Send File" />
</form>

 

