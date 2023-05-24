<?php

require_once __DIR__.'/../model/ModelUser.php';
require_once __DIR__.'/../model/ModelRole.php';

class UserController{
    
    # Return all events
    public static function index() 
    {       
        $users = ModelUser::getAll();
        $roles = ModelRole::getAll();
        
        $roleArray = [];
        
        foreach($roles as $role){
            $roleArray[$role->idrole] = $role->name;
        }
        
        require __DIR__.'/../view/User/index.php';
    }
    
    public static function single() 
    {
        $id = $_GET['id'] ?? '1';
        
        $user = ModelUser::getSingle($id);
        
        require __DIR__.'/../view/User/single.php';
    }
    
    public static function update() 
    {
        $id = $_POST['id'] ?? null;
        
        $user = ModelUser::update($id, $_POST);
        
        self::index();
    }
    
    
    public static function updateView()
    {
        $user = null;
        
        if(isset($_GET['id'])) {
           $user = ModelUser::getSingle($_GET['id']);
        }
        
        $roles = ModelRole::getAll();
        
        require __DIR__.'/../view/User/update.php';
    }
    
    public static function createView()
    {
        $roles = ModelRole::getAll();
        
        require __DIR__.'/../view/User/update.php';
    }
    
    public static function create() 
    {
        ModelUser::create($_POST);
        
        self::index();
    }
    
    public static function delete() {
        ModelUser::delete($_GET['id']);
        
        self::index();
    }
}