<?php

require_once __DIR__.'/../model/ModelRegistration.php';

class RegistrationController{
    
    # Return all events
    public static function index() 
    {       
        #array of ModelEvent objects
        $user = $_SESSION['user'];
        
        $registrations = ModelRegistration::getAll($user->idattendee);
        
        $sessions = [];
        
        foreach($registrations as $reg) {
            $sessions[] = ModelSession::getSingle($reg->session);
        }
        
        require __DIR__.'/../view/Sessions/registrations.php';
    }
    
    public static function delete() 
    {
        $session = $_GET['session'];
        $attendee = $_GET['attendee'];
        
        ModelRegistration::delete($session, $attendee);
        
        self::index();
    }
    
    public static function create() 
    {
        $id = $_GET['session'] ?? '1';
        
        ModelRegistration::create($id, $_SESSION['user']);
        
        self::index();
    }
}
