<?php

require_once __DIR__.'/BaseModel.php';

class ModelSession extends BaseModel {
      
    public static function getAll($event_id) {
        self::connect();
        
        $query = 'SELECT * FROM `session` WHERE event = :event;';
        $sessions = DB::queryAll($query, ModelSession::class, ['event' => $event_id]);
                
        return $sessions;
    }
    
    public static function getSingle($id) {
        self::connect();
        //serenity.ist.edu?route=event&id=1;drop events where 1;
        $query = "SELECT * FROM `session` WHERE `idsession` = :id;";
        
        $session = DB::queryOne($query, ModelSession::class, ['id' => $id]);
        
        return $session;
    }
    
    
    public function getStart(){ 
        return substr($this->startdate, 0, 10);
    }
    
    public function getEnd(){ 
        return substr($this->enddate, 0, 10);
    }
    
    public static function update($id, $params){
        self::connect();
        
        $errors = self::validateModel();
        
        if(!empty($errors)) {
            $events = ModelEvent::getAll();
            require __DIR__.'/../view/Sessions/update.php';
            die();
        }
        
        $data = [
            'name' => $params['name'],
            'datestart' => $params['datestart'],
            'dateend' => $params['dateend'],
            'numberallowed' => $params['numberallowed'],
            'event' => $params['event'],
            'id' => $id
        ];
        
        $query = "UPDATE `session` SET `name`=:name,"
                . "`startdate`=:datestart,"
                . "`enddate`=:dateend,"
                . "`numberallowed`=:numberallowed,"
                . "`event`=:event WHERE idsession = :id";
        
        DB::query($query, $data);
        
       return self::getSingle($id);
    }
    
    public static function create($params){
        self::connect();
        
        $errors = self::validateModel();
        
        if(!empty($errors)) {
            $events = ModelEvent::getAll();
            require __DIR__.'/../view/Sessions/update.php';
            die();
        }
        
        $data = [
            'name' => $params['name'],
            'startdate' => $params['dateend'],
            'enddate' => $params['datestart'],
            'numberallowed' => $params['numberallowed'],
            'event' => $params['event']
        ];
        
        $query = "INSERT INTO `session` (name, startdate, enddate, numberallowed, event)"
                . " VALUES(:name, :startdate, :enddate, :numberallowed, :event)";
        
        return DB::query($query, $data);
    }
    
    public static function delete($id){
        self::connect();
        
        $query = "DELETE FROM session WHERE idsession = :id;";
        
        DB::query($query, ['id' => $id]);
        
        $query = "DELETE FROM attendee_session WHERE session = :id;";
        
        return DB::query($query, ['id' => $id]);
    }
    
    public static function validateModel() {
        $errors = [];
        
        #Validate string length
        $len = intval(strlen(strval($_POST['name'])));
        if($len < 3 || $len > 50) {
            $errors['name'] = 'Name must be between 3 and 50 characters. Submited lenght: '.$len;
        }
        
        #Validate string length
        if(intval($_POST['numberallowed']) < 10 || intval($_POST['numberallowed'] > 10000)) {
            $errors['numberallowed'] = 'Number must be between 10 and 10 000 people.';
        }
        
        #Validate date
        if(!BaseModel::validateDate($_POST['datestart'])) {
            $errors['datestart'] = 'Please use YYYY-MM-DD format for start date.';
        }
        
        #Validate date
        if(!BaseModel::validateDate($_POST['dateend'])) {
            $errors['dateend'] = 'Please use YYYY-MM-DD format for end date.';
        }
        
        return $errors;
    }
}
