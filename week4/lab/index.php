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
            
        ?>
        
        <p><a href="?view=default">Return Home</a></p>
        <p><a href="?view=new">Add a New File</a></p>
        <p><a href="?view=list">View All Files</a></p>
        
        <?php
                $view = filter_input(INPUT_GET, 'view');
                //change display page based on $view from INPUT_GET
                if (  $view === 'new' ) 
                {
                    //new file upload page
                    include './views/upload.html.php';
                }
                
                else if (  $view === 'view' ) 
                {
                    //view individual file info
                    include './views/view.html.php';
                }
                else if (  $view === 'list' ) 
                {
                    //show list of all files
                    include './views/list.html.php';
                }

                else
                {
                    /* main landing page*/
                    include './views/default.html.php';
                }
        ?>
        
        <?php 
                //output of success or error messages
                include 'includes/results.html.php';
                unset($_SESSION['results']);
        ?>
        
        
        
        
    </body>
</html>
