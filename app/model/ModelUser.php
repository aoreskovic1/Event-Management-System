<?php

require_once __DIR__.'/BaseModel.php';

class ModelUser extends BaseModel {
      
    public static function getAll() {
        self::connect();
        
        $query = 'SELECT * FROM `attendee` WHERE 1;';
        $users = DB::queryAll($query, ModelUser::class);
                
        return $users;
    }
    
    public static function getSingle($id) {
        self::connect();
        
        $query = "SELECT * FROM `attendee` WHERE `idattendee` = $id;";
        
        $user = DB::queryOne($query, ModelUser::class);
        
        return $user;
    }
    
    public static function update($id, $params){
        self::connect();
        
        $errors = self::validateModel();
        
        if(!empty($errors)) {
            $roles = ModelRole::getAll();
            require __DIR__.'/../view/User/update.php';
            die();
        }
        
        $name = $params['name'];
        $role = $params['role'];
        
        if(isset($params['password'])) {
            $password = hash('sha256', $params['password'], false);
            $query = "UPDATE `attendee` SET "
                    . "name = :name,"
                    . "role = :role,"
                    . "password = :password WHERE idattendee = :id";
            DB::query($query, ['name' => $name, 'role' => $role, 'password' => $password, 'id'=>$id]);
        }
        else {
            $query = "UPDATE `attendee` SET "
                    . "name = :name,"
                    . "role = :role WHERE idattendee = :id";
            DB::query($query, ['name' => $name, 'role' => $role, 'id' => $id]);
        }
        
       return self::getSingle($id);
    }
    
    public static function create($params){
        self::connect();
        
        $errors = self::validateModel();
        
        if(!empty($errors)) {
            $roles = ModelRole::getAll();
            if(isset($_POST['role'])) {
                require __DIR__.'/../view/User/update.php';
                die();
            }
            require __DIR__.'/../view/auth/register.php';
            die();
        }
        
        $data = [
            'name' => $params['name'],
            'role' => $params['role'],
            'password' => hash('sha256', $params['password'], false)
        ];
        
        $query = "INSERT INTO `attendee` (name, role, password)"
                . " VALUES(:name, :role, :password)";
        
        return DB::query($query, $data);
    }
    
    public static function delete($id){
        self::connect();
        
        $query = "DELETE FROM attendee WHERE idattendee = :id;";
        
        DB::query($query, ['id' => $id]);
        
        $query = "DELETE FROM attendee_session WHERE attendee = :id;";
        
        return DB::query($query, ['id' => $id]);
    }
    
    
    public static function validateModel() {
        $errors = [];
        
        #Validate string length
        $len = intval(strlen(strval($_POST['name'])));
        if($len < 3 || $len > 100) {
            $errors['name'] = 'Name must be between 3 and 100 characters. Submited lenght: '.$len;
        }
        
        #Validate string length
        $len = intval(strlen(strval($_POST['password'])));
        if(isset($_POST['password']) && $len>0){
            if(isset($_POST['password']) && ($len < 5 || intval($len > 100))) {
                $errors['password'] = 'Password must be between 5 and 100 characters.';
            }
        }
        return $errors;
    }
}
