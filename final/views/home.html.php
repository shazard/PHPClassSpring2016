<?php
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
                    $files[$i]["title"] = $photoDBInfo[$i]["title"];
                    $files[$i]["pathName"] = $fileInfo->getPathname();
                    $files[$i]["fileName"] = $fileInfo->getFilename();
                    $files[$i]["photo_id"] = $photoDBInfo[$i]["photo_id"];
                }
            }
        }
    }
    $randomMeme = rand(0,count($files));
    krsort($files); 


//    var_dump($files);
//    var_dump(count($files));
//    var_dump($randomMeme);
?>
<h2>Meme of the day!</h2>
<div class="meme">
                <h2> <?php echo $photoDB->getPhotoTitleByFileName( $files["fileName"] ); ?></h2>
                <br>
                <a href="?view=info&id=<?php echo $file["photo_id"]; ?>">
                <img src="<?php echo $file["pathName"]; ?>" />
                </a>
                <br>

            </div>


<br><br>
<p><a href="?view=view">View</a> all user created Memes</p>
<p><a href="?view=default">Sign up or Log in </a>to create & manage Memes</p>
