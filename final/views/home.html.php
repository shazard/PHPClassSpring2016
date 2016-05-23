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
    $randomMeme = rand(0,count($files)-1);
    krsort($files); 
    //use $i index above and random number to generate picture below


//    var_dump($files);
//    var_dump(count($files));
//    var_dump($randomMeme);
?>
<h2>Random Meme of the moment!</h2>
            <div class="meme">
                <h2> <?php echo $files[$randomMeme]["title"]; ?></h2>
                <br>
                <a href="?view=info&id=<?php echo $files[$randomMeme]["photo_id"]; ?>">
                <img src="<?php echo $files[$randomMeme]["pathName"]; ?>" />
                </a>
                <br>

            </div>


