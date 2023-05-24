<?php

require_once __DIR__.'/BaseModel.php';

class ModelRole extends BaseModel {
      
    public static function getAll() {
        self::connect();
        
        $query = 'SELECT * FROM `role` WHERE 1';
        $roles = DB::queryAll($query, ModelRole::class);
                
        return $roles;
    }
}
