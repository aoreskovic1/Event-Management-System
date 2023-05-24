<?php

require_once __DIR__ . '/../model/ModelVenue.php';

class VenueController {
    # Return all events

    public static function index() {
        #array of ModelEvent objects
        $venues = ModelVenue::getAll();

        require __DIR__ . '/../view/Venues/index.php';
    }

    public static function single() {
        $id = $_GET['id'] ?? '1';

        $venue = ModelVenue::getSingle($id);
        $events = ModelEvent::getAllForVenue($id);

        require __DIR__ . '/../view/Venues/single.php';
    }

    public static function delete() {
        ModelVenue::delete($_GET['id']);

        self::index();
    }
    
      public static function update() 
    {
        $id = $_POST['id'] ?? null;
        
        $venue = ModelVenue::update($id, $_POST);
        
        self::index();
    }
    
    
    public static function updateView(){
     
        $venue = ModelVenue::getSingle($_GET['id']);
        
        require __DIR__.'/../view/Venues/update.php';
    }
    
    public static function createView()
    {
        require __DIR__.'/../view/Venues/update.php';
    }
    

    public static function create() 
    {
        ModelVenue::create($_POST);
        
        self::index();
    }

}
