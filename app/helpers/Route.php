<?php


class Route{
    
    static function get($route, $function, $controller, $allowedRoles = null) {
        
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') return;
        
        $url = $_GET['route'] ?? 'index';
        $func = $_GET['function'] ?? 'index';
        
        if($url == $route && $function == $func){
            self::checkUserRole($allowedRoles);
            $controller->$function();
        }
        
    }
    
    static function post($route, $function, $controller, $allowedRoles = null) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;
                
        $url = $_GET['route'] ?? 'index';
        $func = $_GET['function'] ?? 'index';
        
        if($url == $route && $function == $func){
            self::checkUserRole($allowedRoles);
            $controller->$function();
        }
        
    }
    
    static function checkUserRole($allowedRoles) {
        $user = $_SESSION['user'] ?? null;
                
        if($allowedRoles) {
            if(!isset($_SESSION['user'])) self::unauthorizedResponse();
            $canAccess = in_array($user->role, $allowedRoles);
            
            if(!$canAccess) self::unauthorizedResponse();
        }
    }
    
    static function unauthorizedResponse(){ 
       
        require __DIR__.'/../view/auth/unauthorized.php';
        die();
    }
}