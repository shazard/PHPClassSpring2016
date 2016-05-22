<!DOCTYPE html>
<!--

I should have a signup/login section that will allow me to access the site with privileges. 
The privilege is to add and maintain their meme images. (10 points)

I can upload an image to the site only when I am logged in. 
When uploaded save the image and link it to the user who uploaded it (10 points)

Users who log in can remove the photos they uploaded. (10 points) 

All users can view the main site (meme generated photos) without logging in. 
Display the title of the meme along with the image. (10 points)

I should have a meme photo of the moment on the main site that is selected randomly. (10 points)

Each image clicked on should take you to a view page with more information 
about the image (size, date created, title, views). The meme image view should increment the view count in the database. (10 points)

I should be able to share a meme image by email and social media. (10 points)

Add bootstrap and add CSS styles to your application. (5 points)



left to do:
    X update "home" page to be "manage" page
    create new home page with meme of the day, link to view all memes, and login link
    create new "include" file with user only links and separate links for anyone from user links
    update new home page to only include user links if logged in


-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Final</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- My styles for images and uploads-->
        <link rel="stylesheet" href="./stylesheets/styles.css">
    </head>
    <body>
        
        <?php
        
            session_start();

            require_once './autoload.php';
            
            $utility = new Utility();
            $userDB = new DBUsers();
            
             $view = filter_input(INPUT_GET, 'view');
                if ( $utility->isPostRequest() ) 
                {
                    $email = filter_input(INPUT_POST, 'email');
                    $password = filter_input(INPUT_POST, 'pass');
                    if ( $userDB->isValidUser($email, $password) ) {
                        $_SESSION['isValidUser'] = true;
                        $_SESSION['userId'] = $_SESSION['currentUserID'];
                        header('Location: index.php?view=home');
                    } 

                    else 
                    {
                        if ( !isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] !== true )
                        {
                        $results = 'Invalid Login. Sorry, please try again';
                        }
                    }
                }
        ?>
        
        <?php 
            //output of success or error messages
            include 'includes/results.html.php';
            unset($_SESSION['results']);
        ?>
        
        <?php
                //change display page based on $view from INPUT_GET
                if (  $view === 'manage' ) 
                {
                    //main user view page
                    include './views/manage.html.php';
                }
                
                else if (  $view === 'signup' ) 
                {
                    //new user sign up page
                    include './views/signup.html.php';
                }
                else if (  $view === 'upload' ) 
                {
                    //new user sign up page
                    include './views/upload.html.php';
                }
                else if (  $view === 'view' ) 
                {
                    //new user sign up page
                    include './views/view.html.php';
                }
                else if (  $view === 'info' ) 
                {
                    //new user sign up page
                    include './views/info.html.php';
                }
                else if (  $view === 'default' ) 
                {
                    //new user sign up page
                    include './views/default.html.php';
                }

                else
                {
                    /* Default include for log in or signup if not logged in*/
                    include './views/home.html.php';
                }
        ?>
        
    </body>
</html>
