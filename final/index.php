<!DOCTYPE html>
<!--

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
        
        <style type="text/css"> 
            #files-img {
                border: 5px dashed #D9D9D9;
                border-radius: 10px;
                padding: 1em 2em;
                text-align: center;

            }
            .over {
                background: #F7F7F7;
            }

            input {
                margin: 0.5em;
                padding: 0.5em;
            }

            #img-file-content img {
                max-width: 100%;
            }
            .meme {
                width: 300px; 
                border: 1px solid silver;
                padding: 0.5em;
                text-align: center;
                margin: 0.5em;
                vertical-align: middle;
            }
        </style>
        
        
        
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
                //change display page based on $view from INPUT_GET
                if (  $view === 'home' ) 
                {
                    //main user view page
                    include './views/home.html.php';
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

                else
                {
                    /* Default include for log in or signup if not logged in*/
                    include './views/default.html.php';
                }
        ?>
        
        <?php 
                //output of success or error messages
                include 'includes/results.html.php'; 
        ?>
        
        
        
        
    </body>
</html>
