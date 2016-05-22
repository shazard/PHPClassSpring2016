<?php
    
    //if ( !isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] !== true )
    //<p><h1><a href="index.php" class="btn btn-lg btn-default">Login</a></h1></p>
    //<?php die('<h1>Access Denied</h1> '); endif;  
    
    //$currentUserID = $_SESSION['currentUserID'];
 
    $photoDB = new DBPhotos();
    $files = array();
    $photoDBInfo = $photoDB->getAllPhotos();
    $directory = '.' . DIRECTORY_SEPARATOR . 'uploads';
    $dir = new DirectoryIterator($directory);
    foreach ($dir as $fileInfo) 
    {
        if ($fileInfo->isFile()) 
        {
            for ($i = 0; $i < count($photoDBInfo); $i++)
            {
                if ($fileInfo->getFilename() == $photoDBInfo[$i]["filename"])
                {
                    $files[$fileInfo->getMTime()]["uploadDate"] = $fileInfo->getMTime();
                    $files[$fileInfo->getMTime()]["pathName"] = $fileInfo->getPathname();
                    $files[$fileInfo->getMTime()]["fileName"] = $fileInfo->getFilename();
                    $files[$fileInfo->getMTime()]["photo_id"] = $photoDBInfo[$i]["photo_id"];
                }
            }
        }
    }    
    krsort($files);    
?>

<h2>Welcome To The View Memes Page</h2>

<br><br>
<p><a href="?view=home">Return Home</a></p>
<p><a href="?view=manage">Manage Your Memes</a></p>
<p><a href="?view=upload">Upload a new image</a></p>
<a href="./logout.html.php">Log Out</a>

<hr>

<?php foreach ($files as $file):?> 
            <div class="meme">
                <h2> <?php echo $photoDB->getPhotoTitleByFileName( $file["fileName"] ); ?></h2>
                <br>
                <a href="?view=info&id=<?php echo $file["photo_id"]; ?>">
                <img src="<?php echo $file["pathName"]; ?>" />
                </a>
                <br>

            </div>
<?php endforeach; ?>

<hr>
<p><a href="?view=home">Return Home</a></p>
