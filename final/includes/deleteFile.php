<?php

session_start();
require_once '../autoload.php';
$utility = new Utility();
$photoDB1 = new DBPhotos();
if ($utility->isPostRequest())
    {
    
    if (unlink("." . filter_input(INPUT_POST, 'fileToDelete')))
        {
            $photoDB1->deletePhotoDBInfo (filter_input(INPUT_POST, 'photoIdToDelete'));
            $_SESSION['results'] = " IMAGE DELETED!";
        }
        else
        {
            $_SESSION['results'] = "IMAGE Not Deleted!" . filter_input(INPUT_POST, 'fileToDelete');

        }
    }
        
        header('Location: ../index.php?view=home');

        
        


