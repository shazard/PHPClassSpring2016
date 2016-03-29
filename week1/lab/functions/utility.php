<?php

/**

 * 
 * Database Columns
 *     `address_id` INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
       `fullname` VARCHAR(250) NOT NULL,
       `email` VARCHAR(250) NOT NULL, 
       `addressline1` VARCHAR(250) NOT NULL,
       `city` VARCHAR(250) NOT NULL, 
       `state` VARCHAR(2) NOT NULL, 
       `zip` VARCHAR(5) NOT NULL,
       `birthday` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'
 * 
 * 
 *  * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function addAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, email = :email, addressline1 = :addressline1, city = :city, state = :state, zip = :zip, birthday = :birthday");
    $binds = array(
        ":fullname" => $fullname,
        ":email" => $email,
        ":addressline1" => $addressline1,
        ":city" => $city,
        ":state" => $state,
        ":zip" => $zip,
        ":birthday" => $birthday
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    
    return false;
}

function getAllAddresses() {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address");
    
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $results;
}

