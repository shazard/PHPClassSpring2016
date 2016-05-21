<?php



/**
 * 
 *
 * @author Shaun
 */
class DBUsers extends DB 
{
    
    
    function __construct() 
    {        
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');        
    }
    
    public function isValidUser( $email, $pass ) 
    {
        $db = $this->getDb();
        $resultsFromDB = array();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        
        $binds = array(
            ":email" => $email,       
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $resultsFromDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (password_verify($pass, $resultsFromDB[0]['password']))
            {            
            $_SESSION['currentUserID'] = $resultsFromDB[0]['user_id'];
            $_SESSION['currentUserEmail'] = $resultsFromDB[0]['email'];
            return true;
            }
        }

        return false;    
    }
    
    public function isValidEmail($value) 
    {
        if ( empty($value) ) {
            return false;
        }
        if ( filter_var($value, FILTER_VALIDATE_EMAIL) == false ) {
                return false;
        }    
        return true;
    }
    
    public function isValidPassword($value) 
    {
        if ( empty($value) ) {
            return false;
        }
        //allows only letters or numbers, no special characters.
        if ( preg_match("/^[a-zA-Z0-9]+$/", $value) == false ) {
            return false;
        }

        return true;
    
    }
    
    public function createUser($email, $password) 
    {
        if ($this->isValidEmail($email))
        {
            if ($this->isValidPassword($password))
            {
                $db = $this->getDb();
                $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");
                $binds = array(
                    ":email" => $email,
                    ":password" => password_hash($password, PASSWORD_DEFAULT)
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    return true;
                }
            }
        }

        return false;    
    }
}
