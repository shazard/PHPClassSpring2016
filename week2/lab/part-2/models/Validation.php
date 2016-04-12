<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validation
 *
 * @author Shaun
 */
class Validation {
    private $wordRegex = '/^[a-zA-Z0-9\s]+$/';
    private $zipRegex = '/^\d{5}(?:[-\s]\d{4})?$/';
    
    public function textBoxIsFilled($textBox)
    {
        return (!empty($textBox));
    }
    
    public function textBoxIsValid($textBox)
    {
        return(
            preg_match($this->wordRegex, $textBox)
        );
    }
    
    public function zipCodeIsValid($zip)
    {
        return(
            preg_match($this->zipRegex, $zip)
        );
    }
    public function emailIsValid($email)
    {
        return(
            filter_var($email, FILTER_VALIDATE_EMAIL)
        );
    }
    
    
    
    
    
    
    
    
    
}
