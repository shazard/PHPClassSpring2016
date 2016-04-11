<?php if ( count($addresses) > 0 ) : ?>
<h1>Addresses</h1>
<hr>
<!--   
        `address_id` INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
       `fullname` VARCHAR(250) NOT NULL,
       `email` VARCHAR(250) NOT NULL, 
       `addressline1` VARCHAR(250) NOT NULL,
       `city` VARCHAR(250) NOT NULL, 
       `state` VARCHAR(2) NOT NULL, 
       `zip` VARCHAR(5) NOT NULL,
       `birthday` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'
-->

<?php foreach( $addresses as $key => $values ) : ?>
    <ul>
        <li><?php echo $values['fullname']; ?> </li>
        <li><?php echo $values['email']; ?> </li>
        <li><?php echo $values['addressline1']; ?> </li>
        <li><?php echo $values['city']; ?> </li>
        <li><?php echo $values['state']; ?> </li>
        <li><?php echo $values['zip']; ?> </li>
        <li><?php echo $values['birthday']; ?> </li>
    </ul>
    <hr>
<?php endforeach; ?>

<?php endif; ?>
