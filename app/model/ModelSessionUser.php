<?php

require_once __DIR__.'/BaseModel.php';

class ModelSessionUser extends BaseModel {
      
    public static function getMyRegisteredSessionsIds($id) {
        self::connect();
        
        $query = 'SELECT * FROM `attendee_session` WHERE attendee = :id';
        $sessions = DB::queryAll($query, ModelSessionUser::class, ['id' => $id]);
        $registered = [];
        foreach($sessions as $session) {
            $registered[] = $session->session;
        }
        
        return $registered;
    }
}