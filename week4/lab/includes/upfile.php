<?php
session_start();
require_once '../autoload.php';
$utility = new Utility();
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
            $_SESSION['results'] = $fileName . " is uploaded successfully";
        }
        else
        {
            $_SESSION['results'] = $error;
        }
        header('Location: ../index.php?view=default');
}
