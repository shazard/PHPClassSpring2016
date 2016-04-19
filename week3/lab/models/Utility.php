<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utility
 *
 * @author Shaun
 */
class Utility {
    
    
/**
    * A method to check if a Post request has been made.
    *    
    * @return boolean
    */
   public function isPostRequest() {
       return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
   }
   
   /**
    * Generate link.
    * @param string $page target page
    * @param array $params page parameters
    * 
    * @return string
    */
    public function createLink($page, array $params = array()) {        
        return $page . '?' .http_build_query($params);
    }
    
    /**
    * Redirect to the given page.
    * @param type $page target page
    * @param array $params page parameters
    * 
    * @return void
    */
    public function redirect($page, array $params = array()) {
        header('Location: ' . $this->createLink($page, $params));
        die();
    }
    
    /**
    * Get all values from a post form.
    * 
    * @return array
    */
    public function getPostValues() {
        return filter_input_array(INPUT_POST);
    }

    
    /**
     * Get value of the URL param.
     * 
     * @return string
     */
    public function getUrlParam($name) {
        return filter_input(INPUT_GET, $name);
    }
    
    public function logoutSession ()
    {
        //found this code on stack overflow to make sure session data is removed thoroughly
        session_start();
        setcookie(session_name(), '', 100);
        session_unset();
        session_destroy();
        $_SESSION = array();
    }
    
    
}
