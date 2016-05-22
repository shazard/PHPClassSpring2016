<?php

    $photoDB = new DBPhotos();
    $photo1 = $photoDB->getPhotoById(filter_input(INPUT_GET, "id"));
    $photoInfo = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $photo1[0]["filename"];
    $photoSize = filesize($photoInfo) / 1000;
    
    $photoDB->incrementViews(filter_input(INPUT_GET, "id"));
    
    //var_dump of example $photo1 contents
//    array(1) { [0]=> array(6) { 
//        ["photo_id"]=> int(7) 
//        ["user_id"]=> int(1) 
//        ["filename"]=> string(48) "img_fec0a6a67f9db4d27c468a00afdc469040bef440.jpg" 
//        ["title"]=> string(6) "Test 4" 
//        ["views"]=> int(2) 
//        ["created"]=> string(19) "2016-05-21 16:10:57" } }

?>
<p><a href="?view=home">Return Home</a></p>
<p><a href="?view=manage">Manage Your Memes</a></p>
<p><a href="?view=view">View all user created Memes</a></p>
<p><a href="?view=upload">Upload a new image</a></p>
<a href="./logout.html.php">Log Out</a>


    <div class="meme">
        <h2> <?php echo $photo1[0]["title"]; ?></h2>        
        <img src="<?php echo $photoInfo; ?>" />
        <br><br>
        <p>Views: <?php echo $photo1[0]["views"]; ?></p>
        <br>
        <p>Created: <?php echo date("l F j, Y, g:i a", filemtime($photoInfo)); ?></p>
        <br>
        <p>File Size: <?php echo $photoSize; ?> MB</p>
        <br>
        <!-- Place this tag where you want the share button to render. -->
        <br>
        <div class="fb-share-button" data-href="<?php echo $photoInfo; ?>" data-layout="button" data-mobile-iframe="true"></div><br>
        <a href="mailto:?subject=My Meme!&amp;body=Check out my meme <?php echo $photoInfo; ?>"
        title="Share by Email">
            <img src="http://png-2.findicons.com/files/icons/573/must_have/48/mail.png">
        </a><br>
        <div class="g-plus" data-action="share" data-href="<?php echo $photoInfo; ?>"></div>
        


    </div>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    