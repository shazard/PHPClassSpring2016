<?php
if ( $utility->isPostRequest() ) {
    
        $signupemail = filter_input(INPUT_POST, 'signup_email');
        $signuppassword = filter_input(INPUT_POST, 'signup_pass');
        
        if (!$userDB->isItemInDB($signupemail, "email", "users"))
        {
            if ( $userDB->createUser($signupemail, $signuppassword) ) 
            {
                $_SESSION['results'] = '<h3>New user created, welcome to our site! Use the link above to log in.</h3>';
                header('Location: ./index.php?view=home');
            } 
            else 
            {
                $_SESSION['results'] = '<h3>Error creating user. Sorry, please try again.<br><br>Ensure email is valid and password includes only letters and numbers.</h3>';
                header('Location: ./index.php?view=signup');                
            }
        }
        else
        {
            $_SESSION['results'] = 'User already exists. Sorry, please try again.';
            header('Location: ./index.php?view=signup');
        }
        
    }
?>


<p><a class="btn btn-primary" href="?view=default">Return to Log In</a></p>
<hr>
<h1> Sign Up </h1>

<?php

include './includes/signupform.html.php';
?>