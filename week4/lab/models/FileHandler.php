<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileHandler
 *
 * @author Shaun
 */
class FileHandler 
{
    function upLoad($keyName) 
    {
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (!isset($_FILES[$keyName]['error']) || is_array($_FILES[$keyName]['error'])) 
        {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES[$keyName]['error']) 
        {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here. 
        if ($_FILES[$keyName]['size'] > 10000000) 
        {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $validExts = array(
            'txt' => 'text/plain',
            'html' => 'text/html',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        );
        $ext = array_search($finfo->file($_FILES[$keyName]['tmp_name']), $validExts, true);

        if (false === $ext) 
        {
            throw new RuntimeException('Invalid file format.');
        }

        // You should name it uniquely.
        // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.

        $salt = uniqid(mt_rand(), true);
        $fileName = "file_" . $ext . "_" . sha1($salt . sha1_file($_FILES[$keyName]['tmp_name']));
        $location = sprintf('./uploads/%s.%s', $fileName, $ext);

        if (!is_dir('./uploads')) 
        {
            mkdir('./uploads');
        }

        if (!move_uploaded_file($_FILES[$keyName]['tmp_name'], $location)) 
        {
            throw new RuntimeException('Failed to move uploaded file.');
        }

        return $fileName . '.' . $ext;
    }
    
    //Alternative upload if server doesn't support finfo
    function upLoadNoFileInfo ($keyName)
    {
        try 
        {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (!isset($_FILES[keyName]['error']) || is_array($_FILES['upfile']['error'])) {
                throw new RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($_FILES[$keyName]['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }

            // You should also check filesize here. 
            if ($_FILES[$keyName]['size'] > 10000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }

            /* Alternative to finfo */
            $name = $_FILES[$keyName]["name"];
            $ext = strtolower(end((explode(".", $name))));

            if (preg_match("/^(jpeg|jpg|png|gif|txt|html|pdf|doc|docx|xls|xlsx)$/", $ext) == false) {
                throw new RuntimeException('Invalid file format.');
            }
            /* Alternative END */

            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.

            $salt = uniqid(mt_rand(), true);
            $fileName = "file_" . $ext . "_" . sha1($salt . sha1_file($_FILES[$keyName]['tmp_name']));
            $location = sprintf('./uploads/%s.%s', $fileName, $ext);

            if (!is_dir('./uploads')) {
                mkdir('./uploads');
            }

            if (!move_uploaded_file($_FILES[$keyName]['tmp_name'], $location)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }

            return $fileName . '.' . $ext;
        } 
        catch (RuntimeException $e) 
        {

            echo $e->getMessage();
        }
    }
    function delete($filePath)
    {    
        if (!unlink($filePath))
        {        
            return false;
        }
        return true;
    }
    
    
}
