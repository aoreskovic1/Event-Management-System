<?php

require_once __DIR__.'/BaseModel.php';

class ModelEvent extends BaseModel {
      
    public static function getAll() {
        self::connect();
        
        $query = 'SELECT * FROM `event` WHERE 1;';
        $events = DB::queryAll($query, ModelEvent::class);
                
        return $events;
    }
    
    public static function getAllForVenue($venueId) {
        self::connect();
        
        $query = 'SELECT * FROM `event` WHERE venue = :venue;';
        $events = DB::queryAll($query, ModelEvent::class, ['venue' => $venueId]);
                
        return $events;
    }
    
    public static function getSingle($id) {
        self::connect();
        //serenity.ist.edu?route=event&id=1;drop events where 1;
        $query = "SELECT * FROM `event` WHERE `idevent` = :id;";
        
        $event = DB::queryOne($query, ModelEvent::class, ['id' => $id]);
        
        return $event;
    }
    
    public static function create($params, $user){
        self::connect();
        
        $errors = self::validateModel();
        
        if(!empty($errors)) {
            $venues = ModelVenue::getAll();
            require __DIR__.'/../view/Events/update.php';
            die();
        }
        
        $data = [
            'name' => $params['name'],
            'datestart' => $params['datestart'],
            'dateend' => $params['dateend'],
            'numberallowed' => $params['numberallowed'],
            'venue' => $params['venue']
        ];
        
        $query = "INSERT INTO `event` (name, datestart, dateend, numberallowed, venue)"
                . " VALUES(:name, :datestart, :dateend, :numberallowed, :venue)";
        
        DB::query($query, $data);
        
        $query = "SELECT * FROM `event` WHERE "
                . "name = :name;";
        
        $event = DB::queryOne($query, ModelEvent::class, ['name' => $params['name']]);
        
        $query = "INSERT INTO `manager_event`(manager, event) VALUES(:manager, :event);";
        
        DB::query($query, ['manager' => $user->idattendee, 'event'=> $event->idevent]);
    }
    
    public static function update($id, $params){
        self::connect();
        
        $errors = self::validateModel();
        
        if(!empty($errors)) {
            $venues = ModelVenue::getAll();
            $event = ModelEvent::getSingle($_POST['id']);
            require __DIR__.'/../view/Events/update.php';
            die();
        }
        
        $data = [
            'name' => $params['name'],
            'datestart' => $params['datestart'],
            'dateend' => $params['dateend'],
            'numberallowed' => $params['numberallowed'],
            'venue' => $params['venue'],
            'id' => $id
        ];
            
        $query = "UPDATE `event` SET `name`=:name,"
                . "`datestart`=:datestart,"
                . "`dateend`=:dateend,"
                . "`numberallowed`=:numberallowed,"
                . "`venue`=:venue WHERE idevent = :id";
        DB::query($query, $data);
        
       return self::getSingle($id);
    }
    
    public static function delete($id){
        self::connect();
        
        $query = "DELETE FROM event WHERE idevent = :id;";
        
        DB::query($query, ['id' => $id]);
        
        $query = "DELETE FROM session WHERE event = :id;";
        
        return DB::query($query, ['id' => $id]);
    }   
    
    public static function validateModel() {
        $errors = [];
        
        #Validate string length
        $len = intval(strlen(strval($_POST['name'])));
        if($len < 3 || $len > 50) {
            $errors['name'] = 'Name must be between 1 and 50 characters. Submited lenght: '.$len;
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
    
    public function getStart(){ 
        return substr($this->datestart, 0, 10);
    }
    
    public function getEnd(){ 
        return substr($this->dateend, 0, 10);
    }
}
