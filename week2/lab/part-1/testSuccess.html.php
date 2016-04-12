<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
            require_once './autoload.php';
            
            $message = new SuccessMessage();
            
            $message->addMessage("test", "TEST!!!");
            $message->addMessage("test1", "TEST1");
            $message->addMessage("test2", "TEST2");
            $message->addMessage("test3", "TEST3");
            $message->addMessage("test4", "TEST4");
                    
            $message->removeMessage("test3");
                    
            $messages = $message->getAllMessages();
            
            var_dump($messages);
            var_dump($message instanceof IMessage);
            var_dump($message instanceof Message);
            var_dump($message instanceof SuccessMessage);
            
            
        ?>
    </body>
</html>
