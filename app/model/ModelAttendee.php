<?php

require_once __DIR__.'/BaseModel.php';

class ModelAttendee extends BaseModel {
    
    const REGISTER_ROLE = 3; //3 is lowest role possible
      
    # Returns User or null on fail
    public static function validateLogin($name, $password){
        self::connect();
        
        $query = "SELECT * FROM `attendee` WHERE `name` LIKE :name AND `password` LIKE :password;";
        $user = DB::queryOne($query, ModelAttendee::class, ['name' => $name, 'password' => $password]);
        
        return $user;
    }
    
    public static function createUser($name, $password){
        self::connect();
        
        
        $errors = self::validateModel();
        
        if(!empty($errors)) {
            require __DIR__.'/../view/auth/login.php';
            die();
        }
        
        $role = self::REGISTER_ROLE;
        $password = hash('sha256', $password, false);
        
        $query = "INSERT INTO `attendee` (`name`, `password`, `role`) VALUES (:name, :password, :role);";
        $user = DB::query($query, ['name' => $name, 'password' => $password, 'role'=> $role]);
        
        return $user;
    }
    
    public static function validateModel() {
        $errors = [];
        
        #Validate string length
        $len = intval(strlen(strval($_POST['username'])));
        if($len < 3 || $len > 100) {
            $errors['name'] = 'Name must be between 3 and 100 characters. Submited lenght: '.$len;
        }
        
        #Validate string length
        $len = intval(strlen(strval($_POST['password'])));
        if(isset($_POST['password']) && ($len < 5 || intval($len > 100))) {
            $errors['password'] = 'Password must be between 5 and 100 characters.';
        }
        
        if($errors != []) $errors['register'] = true;
        
        return $errors;
    }
    
}
