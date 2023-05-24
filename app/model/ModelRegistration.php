<?php

require_once __DIR__.'/BaseModel.php';

class ModelRegistration extends BaseModel {
      
    public static function getAll($attendee_id) {
        self::connect();
        
        $query = 'SELECT * FROM `attendee_session` WHERE attendee = :attendee;';
        $registrations = DB::queryAll($query, ModelEvent::class, ['attendee' => $attendee_id]);
                
        return $registrations;
    }
    
    public static function delete($session, $attendee){
        self::connect();
        
        $query = "DELETE FROM `attendee_session` WHERE attendee = :attendee AND session = :session;";
        
        return DB::query($query, ['session' => $session, 'attendee' => $attendee]);
    }
        
    public static function create($session, $attendee){
        self::connect();
        
        $query = " INSERT INTO `attendee_session` (attendee, session) VALUES(:attendee, :session);";
        
        return DB::query($query, ['session' => $session, 'attendee' => $attendee->idattendee]);
    }
    
}


