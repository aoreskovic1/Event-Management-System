<?php

require_once __DIR__.'/../model/ModelSession.php';
require_once __DIR__.'/../model/ModelSessionUser.php';

class SessionController{
    
    # Return all events
    public static function index($event = null) 
    {       
        $event_id = $_GET['id'] ?? $event ?? '1';
        #array of ModelEvent objects
        $event = ModelEvent::getSingle($event_id);
        $sessions = ModelSession::getAll($event_id);
        $user = $_SESSION['user']->idattendee;
        $userSessions = ModelSessionUser::getMyRegisteredSessionsIds($user);
        
        require __DIR__.'/../view/Sessions/index.php';
    }
    
    public static function single() 
    {
        $id = $_GET['id'] ?? '1';
        
        $session = ModelSession::getSingle($id);
        
        require __DIR__.'/../view/Sessions/single.php';
    }
    
    public static function update() 
    {
        $id = $_POST['id'] ?? null;
        
        $session = ModelSession::update($id, $_POST);
        
        $events = ModelEvent::getAll();
        
        require __DIR__.'/../view/Sessions/update.php';
    }
    
    
    public static function updateView()
    {
        $session = null;
        
        if(isset($_GET['id'])) {
           $session = ModelSession::getSingle($_GET['id']);
        }
        
        $events = ModelEvent::getAll();
        
        require __DIR__.'/../view/Sessions/update.php';
    }
    
    public static function createSessionView()
    {
        $session = null;
        
        if(isset($_GET['id'])) {
           $session = ModelSession::getSingle($_GET['id']);
        }
        
        $events = ModelEvent::getAll();
        
        require __DIR__.'/../view/Sessions/update.php';
    }
    
    public static function create() 
    {
        ModelSession::create($_POST);
        
        EventController::index();
    }
    
    public static function delete() {
        ModelSession::delete($_GET['id']);
        
        EventController::index();
    }
}