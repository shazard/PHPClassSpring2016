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
        
            require_once './functions/dbconnect.php';
            require_once './functions/utility.php';
            
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $addressline1 = filter_input(INPUT_POST, 'addressline1');
            $city = filter_input(INPUT_POST, 'city');
            $state = filter_input(INPUT_POST, 'state');
            $zip = filter_input(INPUT_POST, 'zip');
            $birthday = filter_input(INPUT_POST, 'birthday');
            
            $message = array();
            
            $addresses = getAllAddresses();

            if ( isPostRequest() ) 
            {   
                $correct = 1;
                if ( empty($fullname) ) 
                {
                    $message[] = 'Sorry Name is Empty<br>';
                    $correct = 2;
                }
                if ( empty($email) ) 
                {
                    $message[] = 'Sorry Email is Empty<br>';
                    $correct = 2;
                }
                if ( empty($addressline1) ) 
                {
                    $message[] = 'Sorry Address is Empty<br>';
                    $correct = 2;
                } 
                if ( empty($city) ) 
                {
                    $message[] = 'Sorry City is Empty<br>';
                    $correct = 2;
                }             
                 if ( empty($state) ) 
                {
                    $message[] = 'Sorry State is Empty<br>';
                    $correct = 2;
                }            
                if ( empty($zip) ) 
                {
                    $message[] = 'Sorry Zip is Empty<br>';
                    $correct = 2;
                }            
                if ( empty($birthday) ) 
                {
                    $message[] = 'Sorry Birthday is Empty<br>';
                    $correct = 2;
                }            


                if ( !preg_match($phoneRegex, $phone) ) 
                {
                    $message = 'Phone Number Is Not valid';
                } 




                else if ( addPhone($phone, $phoneType ) ) 
                {
                    $message = 'Phone Added';
                    $phone = '';
                    $phoneType = '';
                } 
            }

            include './views/add-address.html.php';

        ?>
    </body>
</html>
