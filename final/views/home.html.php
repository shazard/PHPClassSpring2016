<?php
    //session_start();
    require_once 'includes/accessrequired.html.php';
    //echo $_SESSION['currentUserID'];
    $currentUserID = $_SESSION['currentUserID'];
 
    $files = array();
    $directory = '.' . DIRECTORY_SEPARATOR . 'uploads';
    $dir = new DirectoryIterator($directory);
    foreach ($dir as $fileInfo) 
    {
        if ($fileInfo->isFile()) 
        {
            $files[$fileInfo->getMTime()] = $fileInfo->getPathname();
        }
    }
    krsort($files);    
?>

<h1>Welcome To The View Your Memes Page, <?php echo $_SESSION['currentUserEmail']; ?></h1>

<br><br>

<p><a href="?view=upload">Upload a new image</a></p>
<p><a href="?view=view">View all user created Memes</a></p>
<a href="./logout.html.php">Log Out</a>

<hr>
<?php foreach ($files as $key => $path):?> 
            <div class="meme"> 
                <img src="<?php echo $path; ?>" /> <br />
                <?php echo date("l F j, Y, g:i a", $key); ?>
                <!-- Place this tag where you want the share button to render. -->
                <div class="g-plus" data-action="share" data-href="<?php echo $path; ?>"></div> 
            </div>
<?php endforeach; ?>

        <p><a href="?view=home">Return Home</a></p>
        <!-- Place this tag in your head or just before your close body tag. -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>