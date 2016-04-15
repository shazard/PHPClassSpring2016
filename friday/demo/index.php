<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        require_once './autoload.php';
        
        $util = new Util();
        $validator = new Validator();
        
        
        $values = filter_input_array(INPUT_POST);
        
        $phoneDAO = new PhoneDAO();
        
        $phone = $values['phone'];
        $phoneType = $values['phonetype'];
     
        if ( $util->isPostRequest() ) {            

            if ( empty($phone) ) 
            {
                $message = 'Sorry Phone is Empty';
            } 
            else if ( empty($phoneType) ) 
            {
                $message = 'Sorry Phone Type is Empty';
            } 
            else if ( !$validator->phoneIsValid($phone) ) 
            {
                $message = 'Phone Number Is Not valid';
            } 
            else if ( $phoneDAO->create($values) ) 
            {
                $message = 'Phone Added';
                $phone = '';
                $phoneType = '';
            } 
                       
        }
        
        $phones = $phoneDAO->readAll();
                
        include './views/message.html.php';
        include './views/phone-form.html.php';        
        include './views/view-phones.html.php';
        
        
        ?>
    </body>
</html>
