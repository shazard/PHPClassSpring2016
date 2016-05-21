<?php
class DBPhotos extends DB 
{
    function __construct() 
    {        
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');        
    }
    
    public function addPhoto($fileName, $user, $title) 
    {            
        $db = $this->getDb();
        $stmt = $db->prepare("INSERT INTO photos SET user_id = :user_id, filename = :filename, title = :title, views = 0, created = now()");
        $binds = array(
            ":user_id" => $user,
            ":filename" => $fileName,
            ":title" => $title
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }        
        return false;    
    }
    
    public function incrementViews ($photoID)
    {
        $db = $this->getDb();
        $stmt = $db->prepare("UPDATE photos SET views = views + 1 WHERE photo_id = :photo_id)");
        $binds = array(
            ":photo_id" => $photoID
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }        
        return false;
    }
    
    //deletes photo info from database
    public function deletePhotoDBInfo ($photoID)
    {
        $db = $this->getDb();
        $stmt = $db->prepare("DELETE FROM photos WHERE photo_id = :photo_id");
        $binds = array(
            ":photo_id" => $photoID
        );                
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }        
        return false; 
    }
    
    //deletes file from server
     public function deleteFile($filePath)
    {    
        return unlink($filePath);
 
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
