<?php
    
    //if ( !isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] !== true )
    //<p><h1><a href="index.php" class="btn btn-lg btn-default">Login</a></h1></p>
    //<?php die('<h1>Access Denied</h1> '); endif;  
    
    $currentUserID = $_SESSION['currentUserID'];
 
    $photoDB = new DBPhotos();
    $files = array();
    $directory = '.' . DIRECTORY_SEPARATOR . 'uploads';
    $dir = new DirectoryIterator($directory);
    foreach ($dir as $fileInfo) 
    {
        if ($fileInfo->isFile()) 
        {
            $files[$fileInfo->getMTime()]["uploadDate"] = $fileInfo->getMTime();
            $files[$fileInfo->getMTime()]["pathName"] = $fileInfo->getPathname();
            $files[$fileInfo->getMTime()]["fileName"] = $fileInfo->getFilename();
        }
    }

    
    
    krsort($files);    
?>

<h1>Welcome To The View Memes Page, <?php echo $_SESSION['currentUserEmail']; ?></h1>

<br><br>
<p><a href="?view=home">Return Home</a></p>
<p><a href="?view=upload">Upload a new image</a></p>
<a href="./logout.html.php">Log Out</a>

<hr>

<?php foreach ($files as $file):?> 
            <div class="meme">
                <h2> <?php echo $photoDB->getPhotoTitleByFileName( $file["fileName"] ); ?></h2>
                <br>
                <img src="<?php echo $file["pathName"]; ?>" /> <br />
                <p>Created: <?php echo date("l F j, Y, g:i a", $file["uploadDate"]); ?></p>
                <br>
                <!-- Place this tag where you want the share button to render. -->
                <div class="g-plus" data-action="share" data-href="<?php echo $file["pathName"]; ?>"></div> 
            </div>
<?php endforeach; ?>

<hr>
<p><a href="?view=home">Return Home</a></p>
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer></script>