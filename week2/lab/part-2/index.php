<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Week 1 Lab</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <a href="add.php">Add New Address</a>
        <br><br>
        <?php
        
            require_once './autoload.php';
            
            $utility = new Utility();
            $addressDB = new DBAddress();
            
            $addresses = $addressDB->getAllAddresses();

            include './views/view-address.html.php';
        ?>
        
        
    </body>
</html>
