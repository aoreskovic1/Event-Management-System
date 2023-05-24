<?php

require_once __DIR__.'/../model/ModelEvent.php';

class EventController{
    
    # Return all events
    public static function index() 
    {       
        #array of ModelEvent objects
        $events = ModelEvent::getAll();
        
        require __DIR__.'/../view/Events/index.php';
    }
    
    public static function single() 
    {
        $id = $_GET['id'] ?? '1';
        
        $event = ModelEvent::getSingle($id);
        $venues = ModelVenue::getAll();
        
        require __DIR__.'/../view/Events/single.php';
    }
    
    public static function updateView()
    {
        $event = null;
        
        if(isset($_GET['id'])) {
           $event = ModelEvent::getSingle($_GET['id']);
        }
        
        $venues = ModelVenue::getAll();
        
        require __DIR__.'/../view/Events/update.php';
    }
    
    public static function update() 
    {
        $id = $_POST['id'] ?? null;
        
        $event = ModelEvent::update($id, $_POST);
        
        $venues = ModelVenue::getAll();
        
        require __DIR__.'/../view/Events/update.php';
    }
    
    public static function create() 
    {
        ModelEvent::create($_POST, $_SESSION['user']);
       
        EventController::index();
    }
    
    public static function delete() {
        ModelEvent::delete($_GET['id']);
        
        self::index();
    }
}