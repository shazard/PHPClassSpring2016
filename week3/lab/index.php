<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Week 3 Lab</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
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
                        header('Location: index.php?view=admin');
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
                if (  $view === 'admin' ) 
                {
                    //main user view page
                    include './views/admin.html.php';
                }
                
                else if (  $view === 'signup' ) 
                {
                    //new user sign up page
                    include './views/signup.html.php';
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
