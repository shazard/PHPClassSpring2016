<?php
    //session_start();
    require_once 'includes/accessrequired.html.php';
    //echo $_SESSION['currentUserID'];
    $currentUserID = $_SESSION['currentUserID'];
 
    $photoDB = new DBPhotos();
    
    $files = array();
    $filesByUser = $photoDB->getPhotosByUser($currentUserID);
    $directory = '.' . DIRECTORY_SEPARATOR . 'uploads';
    $dir = new DirectoryIterator($directory);
    foreach ($dir as $fileInfo) 
    {
        if ($fileInfo->isFile()) 
        {
            for ($i = 0; $i < count($filesByUser); $i++)
            {
                if ($fileInfo->getFilename() == $filesByUser[$i]["filename"])
                {
                    $files[$fileInfo->getMTime()]["uploadDate"] = $fileInfo->getMTime();
                    $files[$fileInfo->getMTime()]["pathName"] = $fileInfo->getPathname();
                    $files[$fileInfo->getMTime()]["fileName"] = $fileInfo->getFilename();
                }
            }

        }
    }

    krsort($files);   
    
    //var_dump ($filesByUser);
?>


<h1>Welcome To The View Your Memes Page, <?php echo $_SESSION['currentUserEmail']; ?></h1>

<br><br>

<p><a href="?view=upload">Upload a new image</a></p>
<p><a href="?view=view">View all user created Memes</a></p>
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