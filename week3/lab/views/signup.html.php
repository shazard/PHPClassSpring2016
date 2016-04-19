<?php
if ( $utility->isPostRequest() ) {
        $signupemail = filter_input(INPUT_POST, 'signup_email');
        $signuppassword = filter_input(INPUT_POST, 'signup_pass');
        
        if (!isItemInDB($signupemail, "email", "users"))
        {
            if ( doCreateUser($signupemail, $signuppassword) ) 
            {
                $results = '<h3>New user created</h3>';
            } 
            else 
            {
                $results = '<h3>Error creating user. Sorry, please try again.<br><br>Ensure email is valid and password includes only letters and numbers.</h3>';
            }
        }
        else
        {
            $results = 'User already exists. Sorry, please try again.';
        }
        
    }
?>


<p><a href="?view=default">Return to Log In</a></p>
<hr>
<h1> Sign Up </h1>

<?php
include './includes/signupform.html.php';
?>