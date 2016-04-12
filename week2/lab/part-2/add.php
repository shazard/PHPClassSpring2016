<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Address</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <a href="index.php">Return To Home</a>
        <br><br>
        <?php
        
            require_once './autoload.php';
            
            $utility = new Utility();
            $addressDB = new DBAddress();
            $validation = new Validation();
            
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $addressline1 = filter_input(INPUT_POST, 'addressline1');
            $city = filter_input(INPUT_POST, 'city');
            $state = filter_input(INPUT_POST, 'state');
            $zip = filter_input(INPUT_POST, 'zip');
            $birthday = filter_input(INPUT_POST, 'birthday');
            
            $message = array();
            $correct = 1;

            if ( $utility->isPostRequest() ) 
            {  
                
                if ( !$validation->textBoxIsFilled($fullname) ) 
                {
                    $message[] = 'Sorry Name is Empty<br>';
                    $correct = 2;
                }
                if ( !$validation->textBoxIsFilled($email) ) 
                {
                    $message[] = 'Sorry Email is Empty<br>';
                    $correct = 2;
                }
                if ( !$validation->textBoxIsFilled($addressline1) ) 
                {
                    $message[] = 'Sorry Address is Empty<br>';
                    $correct = 2;
                } 
                if ( !$validation->textBoxIsFilled($city) ) 
                {
                    $message[] = 'Sorry City is Empty<br>';
                    $correct = 2;
                }
                if ($state === 'XXX')
                {
                    $message[] = 'State Must Be Selected<br>';
                    $correct = 2;
                }                
                if ( !$validation->textBoxIsFilled($zip) ) 
                {
                    $message[] = 'Sorry Zip is Empty<br>';
                    $correct = 2;
                }            
                if ( !$validation->textBoxIsFilled($birthday) ) 
                {
                    $message[] = 'Sorry Birthday is Empty<br>';
                    $correct = 2;
                }            

                if ( !$validation->textBoxIsValid($fullname) ) 
                {
                    $message[] = 'Name Is Not valid<br>';
                    $correct = 2;
                }
                
                if ( !$validation->emailIsValid($email) ) 
                {
                    $message[] = 'Email Is Not valid<br>';
                    $correct = 2;
                }
                
                if ( !$validation->textBoxIsValid($addressline1) ) 
                {
                    $message[] = 'Address Is Not valid<br>';
                    $correct = 2;
                } 
                if ( !$validation->textBoxIsValid($city) ) 
                {
                    $message[] = 'City Is Not valid<br>';
                    $correct = 2;
                }
                                 
                if ( !$validation->zipCodeIsValid($zip) ) 
                {
                    $message[] = 'Zip Code Is Not valid<br>';
                    $correct = 2;
                } 

                if ($correct === 1)
                {
                    if ( $addressDB->addAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday ) ) 
                    {
                        $message[] = 'Address Added';

                        $fullname = '';
                        $email = '';
                        $addressline1 = '';
                        $city = '';
                        $state = '';
                        $zip = '';
                        $birthday = '';
                    }
                }
            }

            include './views/messages.html.php';
            include './views/add-address.html.php';

        ?>
    </body>
</html>
