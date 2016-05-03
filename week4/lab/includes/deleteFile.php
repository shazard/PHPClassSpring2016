<?php

session_start();
require_once '../autoload.php';
$utility = new Utility();
if ($utility->isPostRequest())
    {
        $fileHandler1 = new FileHandler();
 
        if($fileHandler1->delete(filter_input(INPUT_POST, 'fileToDelete')))
        {
            $_SESSION['results'] = filter_input(INPUT_POST, 'fileToDelete') . " DELETED!";

        }
        else
        {
            $_SESSION['results'] = "Not Deleted!";

        }
        header('Location: ../index.php?view=default');
}


